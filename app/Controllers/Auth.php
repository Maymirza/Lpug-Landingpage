<?php

namespace App\Controllers;

use App\Models\AuthModels;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    protected $helpers = ['pancha_helper'];
    protected $usermodel;
    public function __construct()
    {

        $this->usermodel = new AuthModels();
    }
	public function Home(){
return view('auth/landing');
}
    public function login()
    {

        $data = [
            'title' => 'Login |LPUG',
            'validation' => \Config\Services::validation()

        ];
        return view('auth/login', $data);
    }
    public function Llogin()
    {

        if (!$this->validate([
            'npm' => ['label' => 'Npm', 'rules' => 'required'],
            'password' => ['label' => 'Password', 'rules' => 'required']
        ])) {
            return redirect()->to('/auth')->withInput();
        } else {

            $npm = $this->request->getVar('npm');
            $password = $this->request->getVar('password');
            $user = $this->usermodel->getuser($npm);

            // cek user

            if ($user != null) {
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'role_id' => $user['role_id'],
                            'email' => $user['email'],
                            'npm' => $user['npm'],
                            'name' => $user['name'],
                            'image' => $user['image'],
                            'oracle' => $user['oracle'],
                            'sap' => $user['sap'],
                            'cisco_malam' => $user['cisco_malam'],
                            'cisco_sabtu' => $user['cisco_sabtu'],
                        ];
                        session()->set($data);
                        if ($user['role_id'] == 2) {
                            return redirect()->to('/user/dashboard');
                        }
                        if ($user['role_id'] == 1) {
                            return redirect()->to('/admin/dashboard');
                        }
                    } else {
                        session()->setFlashdata('messageWo', "Sorry your entry Wrong Password");
                        return redirect()->to('/auth/login');
                    }
                } else {

                    session()->setFlashdata('messageWo', "Sorry your account isn't active");
                    return redirect()->to('/auth/login');
                }
            } else {
                session()->setFlashdata('messageWo', "We can't find your npm");
                return redirect()->to('/auth/login');
            }
        }
    }
    public function registration()
    {
        $data = [
            'title' => 'Registration |Candidates',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registration', $data);
    }
    public function signup()
    {
        if (!$this->validate([
            'name' => ['label' => 'Name', 'rules' => 'required'],
            'email' => ['label' => 'Email', 'rules' => 'required'],
            'npm' => ['label' => 'Npm', 'rules' => 'required|is_unique[user.npm]'],
            'phone' => ['label' => 'Phone Number', 'rules' => 'required'],
            // 'majors' => ['label' => 'Majors', 'rules' => 'required'],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[3]|matches[confirm_password]'],
            'confirm_password' => ['label' => 'Confirm_password', 'rules' => 'required|min_length[3]|matches[password]']

        ])) {
            return redirect()->to('/auth/registration')->withInput();
        } else {

            $mjr = $this->request->getVar('majors');
            $others = $this->request->getVar('others');
            $waiting = 'Waiting';

            if ($mjr == true) {
                $majors = $mjr;
            } elseif ($others == true) {
                $majors = $others;
            } else {
                $majors = false;
            }
            if ($majors == false) {
                session()->setFlashdata('salah', 'Please Correction your field');
                return redirect()->to('/auth/registration');
            }
            $this->usermodel->save([
                'name' => htmlspecialchars($this->request->getVar('name')),
                'npm' => $this->request->getVar('npm'),
                'email' =>  htmlspecialchars($this->request->getVar('email')),
                'phone' => $this->request->getVar('phone'),
                'majors' => $majors,
                'status' => $waiting,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'image' => 'default.jpg'
            ]);

            session()->setFlashdata('Message', 'Congratulation your account has been created !');
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->request->getVar('email'),
                'token' => $token,
                'date_created' => time()
            ];
		$coderand = rand(500,50000);
            $this->usermodel->token($user_token);
            $name = $this->request->getVar('name');
            $to = $this->request->getVar('email');
            $title = '
            Verify Your LPUG Account #Number_Regist_'.$coderand;
            $message = "
            Dear  <h2>" . $name . "</h2>  <a href=" . 'https://lpug.gunadarma.ac.id' . '/auth/verify?email=' . $to . '&token=' . urlencode($token) . ">Activate </a></h2>This link will expire in 24 hours. If it has expired 
            ";
            $this->sendEmail($to, $title, $message);
            session()->setFlashdata('pesan', 'Congratulation! ,You has been create an account please check your mail for verification account');

            return redirect()->to('/auth/login');
        }
    }
    public function forgotpswd()
    {
        $data = [
            'title' => 'Forgot Password',
            'validation' => \Config\Services::validation()

        ];
        return view('auth/resetpswd', $data);
    }
    public function sendpswd()
    {
        if (!$this->validate([
            'email' => ['label' => 'Email', 'rules' => 'required'],
        ])) {
            return redirect()->to('auth/forgotpswd');
        } else {
            $email = $this->request->getVar('email');
            $user = $this->usermodel->usr($email);

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $to = $email;
                $title = 'Reset password account LPUG';
                $message = "
                Hi , Please click <a href=" . base_url('/') . '/auth/resetpassword?email=' . $to . '&token=' . urlencode($token) . ">Reset Password</a></h2>This link will expire in 24 hours. If it has expired 
                ";
                $this->usermodel->token($user_token);
                $this->sendEmail($to, $title, $message);
                return redirect()->to('/');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $this->usermodel->userget($email);
        if ($user) {
            $user_token = $this->usermodel->user_token($token);

            if ($user_token) {
                session()->set('reset_email', $email);
                session()->set('token', $token);
                return redirect()->to('/auth/rspswd');
            } else {
                session()->setFlashdata('Password Failed.Wrong Token');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('Reset password Failed.Wrong Email');
            return redirect()->to('/');
        }
    }
    public function rspswd()
    {

        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/changepassword', $data);
    }
    public function changepassword()
    {

        if (!session()->has('reset_email')) {
            return redirect()->to('/');
        }
        if (!$this->validate([
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[3]|matches[confirm_password]'],
            'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'required|min_length[3]|matches[password]']
        ])) {
            return redirect()->to('/auth/rspswd')->withInput();
        } else {

            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            $email = session()->get('reset_email');
            $token = session()->get('token');
            $this->usermodel->resetpswd($email, $password);
            $this->usermodel->deletetoken($token);

            session()->remove('reset_email');
            session()->remove('token');
            return redirect()->to('/');
        }
    }
    public function verify()
    {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');
        $user = $this->usermodel->userget($email);
        if ($user) {
            $user_token = $this->usermodel->user_token($token);

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->usermodel->active($email);
                    $this->usermodel->deletetoken($email);
                    return redirect()->to('/');
                } else {
                    $this->usermodel->deleteuser($email);
                    $this->usermodel->deletetoken($token);
                    return redirect()->to('/');
                }
            } else {

                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }
    //--------------------------------------------------------------------
    public function logout()
    {

        if (session()->has('email')) {
            $data = [
                'role_id',
                'email',
                'npm',
                'name',
                'image',
                'oracle',
                'sap',
                'cisco_malam',
                'cisco_sabtu',
            ];
            session()->stop();
            session()->remove($data);
            session()->setFlashdata('pesan', 'You has been log out !');
            return redirect()->to('/auth/login');
            session_destroy();
        } else {
            return redirect()->to('/');
        }
    }

    private function sendEmail($to, $title, $message)
    {


        $this->email->setFrom('lpugdeveloper@gmail.com', 'LPUG');
        $this->email->setTo($to);

        // $this->email->attach($attachment);

        $this->email->setSubject($title);
        $this->email->setMessage($message);

        if (!$this->email->send()) {
            $data = $this->email->printDebugger(['headers']);
            print_r($data);
        } else {
            $data = $this->email->printDebugger(['headers']);
            print_r($data);
        }
    }
}
