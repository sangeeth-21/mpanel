<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $error = '';
        $success = '';

        // Handle POST requests (Login or Signup via Database)
        if ($this->request->is('post')) {
            $action = $this->request->getPost('action');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            try {
                $db = \Config\Database::connect();
                $builder = $db->table('users');

                if ($action === 'signup') {
                    // Check if email already exists
                    $existingUser = $builder->where('email', $email)->get()->getRowArray();
                    if ($existingUser) {
                        $error = 'An account with this email already exists.';
                    } elseif (strlen($password) < 6) {
                        $error = 'Password must be at least 6 characters long.';
                    } else {
                        // Insert new user
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $data = [
                            'email'      => $email,
                            'password'   => $hashedPassword,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];
                        
                        if ($builder->insert($data)) {
                            // Automatically log in
                            $session->set('authenticated', true);
                            $session->set('user', $email);
                            return redirect()->to('/');
                        } else {
                            $error = 'Failed to create account. Please try again.';
                        }
                    }
                } elseif ($action === 'login') {
                    // Find user
                    $user = $builder->where('email', $email)->get()->getRowArray();
                    if ($user && password_verify($password, $user['password'])) {
                        $session->set('authenticated', true);
                        $session->set('user', $email);
                        return redirect()->to('/');
                    } else {
                        $error = 'Invalid email or password.';
                    }
                }
            } catch (\Exception $e) {
                $error = 'Database Connection Error: ' . $e->getMessage();
            }
        }

        // Handle logout
        if ($this->request->getGet('action') === 'logout') {
            $session->destroy();
            return redirect()->to('/');
        }

        $is_logged_in = $session->get('authenticated') === true;

        return view('login_portal', [
            'is_logged_in' => $is_logged_in,
            'user'          => $session->get('user'),
            'error'         => $error,
            'success'       => $success,
        ]);
    }
}
