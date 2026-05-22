<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $error = '';

        // Handle login POST
        if ($this->request->is('post')) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username === 'admin' && $password === 'password123') {
                $session->set('authenticated', true);
                $session->set('user', $username);
                return redirect()->to('/');
            } else {
                $error = 'Invalid username or password. Try admin / password123';
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
        ]);
    }
}
