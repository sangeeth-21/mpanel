<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $error = '';
        $success = '';

        // Handle POST requests (Login, Signup Request, Signup Verify, Forgot Request, Forgot Verify)
        if ($this->request->is('post')) {
            $action = $this->request->getPost('action');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            try {
                $db = \Config\Database::connect();
                $builder = $db->table('users');

                // Standard Login (AJAX supported)
                if ($action === 'login') {
                    $user = $builder->where('email', $email)->get()->getRowArray();
                    if ($user && password_verify($password, $user['password'])) {
                        $session->set('authenticated', true);
                        $session->set('user', $email);
                        if ($this->request->isAJAX()) {
                            return $this->response->setJSON([
                                'status' => 'success',
                                'message' => 'Logged in successfully! Redirecting...',
                                'redirect' => site_url('/')
                            ]);
                        }
                        return redirect()->to('/');
                    } else {
                        $error = 'Invalid email or password.';
                        if ($this->request->isAJAX()) {
                            return $this->response->setJSON([
                                'status' => 'error',
                                'message' => $error
                            ]);
                        }
                    }
                }

                // Sign Up Request (generates OTP, sends via SMTP)
                elseif ($action === 'signup_request') {
                    // Check if email already exists
                    $existingUser = $builder->where('email', $email)->get()->getRowArray();
                    if ($existingUser) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'An account with this email already exists.'
                        ]);
                    }
                    if (strlen($password) < 6) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Password must be at least 6 characters long.'
                        ]);
                    }

                    // Generate a 6-digit OTP code
                    $otp = (string)rand(100000, 999999);
                    $session->set('signup_email', $email);
                    $session->set('signup_password', $password);
                    $session->set('signup_otp', $otp);
                    $session->set('signup_otp_expires', time() + 300); // 5 minutes expiration

                    // Send OTP using Email Service
                    $emailService = \Config\Services::email();
                    $emailService->setTo($email);
                    $emailService->setSubject('Stiqr Security - Email Verification Code');
                    
                    $message = "
                    <div style='font-family: sans-serif; max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #e5e7eb; border-radius: 12px; background-color: #ffffff;'>
                        <h2 style='color: #2563eb; margin-bottom: 16px; font-weight: 700;'>Verify Your Email</h2>
                        <p style='color: #4b5563; font-size: 15px; line-height: 1.5;'>Please verify your email address to complete your registration on Stiqr Security.</p>
                        <div style='background-color: #f3f4f6; padding: 16px; border-radius: 8px; text-align: center; margin: 24px 0;'>
                            <span style='font-size: 28px; font-weight: bold; letter-spacing: 4px; color: #2563eb; font-family: monospace;'>{$otp}</span>
                        </div>
                        <p style='color: #9ca3af; font-size: 13px; line-height: 1.4;'>This verification code is valid for 5 minutes. If you did not request this, please ignore this email.</p>
                    </div>";
                    
                    $emailService->setMessage($message);

                    if ($emailService->send()) {
                        return $this->response->setJSON([
                            'status' => 'success',
                            'message' => 'Verification code sent to your email.'
                        ]);
                    } else {
                        $debugger = $emailService->printDebugger(['headers', 'subject', 'body']);
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Failed to send verification code. Please check SMTP configuration.',
                            'debug' => $debugger
                        ]);
                    }
                }

                // Sign Up Verify (checks OTP, inserts user)
                elseif ($action === 'signup_verify') {
                    $otpInput = $this->request->getPost('otp');
                    $savedOtp = $session->get('signup_otp');
                    $expires = $session->get('signup_otp_expires');
                    $savedEmail = $session->get('signup_email');
                    $savedPassword = $session->get('signup_password');

                    if (!$savedOtp || !$savedEmail || !$savedPassword) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'No active signup session found. Please request a new code.'
                        ]);
                    }

                    if (time() > $expires) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Verification code has expired. Please try again.'
                        ]);
                    }

                    if ($otpInput !== $savedOtp) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Invalid verification code.'
                        ]);
                    }

                    // Insert user
                    $hashedPassword = password_hash($savedPassword, PASSWORD_DEFAULT);
                    $data = [
                        'email'      => $savedEmail,
                        'password'   => $hashedPassword,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    if ($builder->insert($data)) {
                        // Automatically authenticate
                        $session->set('authenticated', true);
                        $session->set('user', $savedEmail);
                        
                        // Clear signup session variables
                        $session->remove(['signup_email', 'signup_password', 'signup_otp', 'signup_otp_expires']);

                        return $this->response->setJSON([
                            'status' => 'success',
                            'message' => 'Email verified successfully! Redirecting...',
                            'redirect' => site_url('/')
                        ]);
                    } else {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Failed to register account. Please try again.'
                        ]);
                    }
                }

                // Forgot Password Request (generates OTP, sends via SMTP)
                elseif ($action === 'forgot_request') {
                    // Check if email exists
                    $user = $builder->where('email', $email)->get()->getRowArray();
                    if (!$user) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'No account found with this email address.'
                        ]);
                    }

                    // Generate a 6-digit OTP code
                    $otp = (string)rand(100000, 999999);
                    $session->set('reset_email', $email);
                    $session->set('reset_otp', $otp);
                    $session->set('reset_otp_expires', time() + 300); // 5 minutes expiration

                    // Send OTP using Email Service
                    $emailService = \Config\Services::email();
                    $emailService->setTo($email);
                    $emailService->setSubject('Stiqr Security - Password Reset Code');
                    
                    $message = "
                    <div style='font-family: sans-serif; max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #e5e7eb; border-radius: 12px; background-color: #ffffff;'>
                        <h2 style='color: #2563eb; margin-bottom: 16px; font-weight: 700;'>Reset Your Password</h2>
                        <p style='color: #4b5563; font-size: 15px; line-height: 1.5;'>Use the verification code below to reset the password for your Stiqr Security account.</p>
                        <div style='background-color: #f3f4f6; padding: 16px; border-radius: 8px; text-align: center; margin: 24px 0;'>
                            <span style='font-size: 28px; font-weight: bold; letter-spacing: 4px; color: #2563eb; font-family: monospace;'>{$otp}</span>
                        </div>
                        <p style='color: #9ca3af; font-size: 13px; line-height: 1.4;'>This code is valid for 5 minutes. If you did not request a password reset, please ignore this email.</p>
                    </div>";
                    
                    $emailService->setMessage($message);

                    if ($emailService->send()) {
                        return $this->response->setJSON([
                            'status' => 'success',
                            'message' => 'Password reset code sent to your email.'
                        ]);
                    } else {
                        $debugger = $emailService->printDebugger(['headers', 'subject', 'body']);
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Failed to send password reset code. Please check SMTP configuration.',
                            'debug' => $debugger
                        ]);
                    }
                }

                // Forgot Password Verify (checks OTP, updates password)
                elseif ($action === 'forgot_verify') {
                    $otpInput = $this->request->getPost('otp');
                    $newPassword = $this->request->getPost('new_password');
                    $savedOtp = $session->get('reset_otp');
                    $expires = $session->get('reset_otp_expires');
                    $savedEmail = $session->get('reset_email');

                    if (!$savedOtp || !$savedEmail) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'No active password reset session found. Please request a new code.'
                        ]);
                    }

                    if (time() > $expires) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Verification code has expired. Please try again.'
                        ]);
                    }

                    if ($otpInput !== $savedOtp) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Invalid verification code.'
                        ]);
                    }

                    if (strlen($newPassword) < 6) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'New password must be at least 6 characters long.'
                        ]);
                    }

                    // Update user password
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updated = $builder->where('email', $savedEmail)->update([
                        'password'   => $hashedPassword,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                    if ($updated) {
                        // Clear reset session variables
                        $session->remove(['reset_email', 'reset_otp', 'reset_otp_expires']);

                        return $this->response->setJSON([
                            'status' => 'success',
                            'message' => 'Password updated successfully! You can now sign in.'
                        ]);
                    } else {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Failed to update password. Please try again.'
                        ]);
                    }
                }

            } catch (\Exception $e) {
                $error = 'Database Connection Error: ' . $e->getMessage();
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => $error
                    ]);
                }
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
