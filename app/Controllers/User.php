<?php

namespace App\Controllers;

use App\Models\UserModels;
use CodeIgniter\Controller;



class User extends BaseController
{
    protected $helpers = ['pancha_helper'];
    protected $usermodel;
    public function __construct()
    {
        if (session()->get('email') == null) {
            header('Location: /auth');
        }
        $this->usermodel = new UserModels();
    }
    public function dashboard()
    {
        $data = [
            'title' => 'dashboard',
            'user' => $this->usermodel->where('npm', session()->get('npm'))->first(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('user/dashboard', $data);
    }
    public function boracle()
    {
        $npm = session()->get('npm');

        $data = [
            'title' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'periperi' => $this->usermodel->getadminperiod(),
            'user' => $this->usermodel->getuser($npm)
        ];
        return view('user/blanko/oracle', $data);
    }
    public function bsap()
    {
        $npm = session()->get('npm');
        $data = [
            'title' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'periperi' => $this->usermodel->getadminperiod(),
            'user' => $this->usermodel->getuser($npm)
        ];
        return view('user/blanko/sap', $data);
    }
    public function bciscomlm()
    {
        $npm = session()->get('npm');
        $data = [
            'title' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'periperi' => $this->usermodel->getadminperiod(),
            'user' => $this->usermodel->getuser($npm)
        ];
        return view('user/blanko/ciscomlm', $data);
    }
    public function bciscosabtu()
    {
        $npm = session()->get('npm');
        $data = [
            'title' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'periperi' => $this->usermodel->getadminperiod(),
            'user' => $this->usermodel->getuser($npm)
        ];
        return view('user/blanko/ciscosabtu', $data);
    }
    public function uoracle()
    {

        if (!$this->validate([
            'image' => ['label' => 'Image', 'rules' => 'max_size[image,15000]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png']

        ])) {
            return redirect()->to('/user/boracle')->withInput();
        }

        $image = $this->request->getFile('image');
        $npm = session()->get('npm');
        $image->move('blanko', $npm);
        $this->usermodel->uoracle($npm);
        return redirect()->to('/user/boracle');
    }
    public function usap()
    {
        if (!$this->validate([
            'image' => ['label' => 'Image', 'rules' => 'max_size[image,15000]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png']

        ])) {
            return redirect()->to('/user/bsap');
        }
        $image = $this->request->getFile('image');

        $npm = session()->get('npm');
        $image->move('blanko', $npm);
        $this->usermodel->usap($npm);
        return redirect()->to('/user/bsap');
    }
    public function uciscom()
    {
        if (!$this->validate([
            'image' => ['label' => 'Image', 'rules' => 'max_size[image,15000]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png']

        ])) {
            return redirect()->to('/user/bciscomlm');
        }
        $image = $this->request->getFile('image');
        $npm = session()->get('npm');

        $image->move('blanko', $npm);
        $this->usermodel->uciscom($npm);
        return redirect()->to('/user/bciscomlm');
    }
    public function uciscos()
    {
        if (!$this->validate([
            'image' => ['label' => 'Image', 'rules' => 'max_size[image,15000]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png']

        ])) {
            return redirect()->to('/user/bciscosabtu');
        }
        $image = $this->request->getFile('image');
        $npm = session()->get('npm');
        // $va = $this->request->getVar('va');
        $image->move('blanko', $npm);
        $this->usermodel->uciscos($npm);
        return redirect()->to('/user/bciscosabtu');
    }
    public function update($npm)
    {

        if (!$this->validate([
            'image' => ['label' => 'Image', 'rules' => 'max_size[image,15000]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png']

        ])) {
            return redirect()->to('/user/updateprof')->withInput();
        }
        $image = $this->request->getFile('image');
        $imagelama = $this->request->getVar('imageLama');

        if ($image != '') {

            if ($image->getError() == 4) {
                $imagename = $this->request->getVar('image');
            } else {

                //generate nama file random
                $imagename = $image->getRandomName();
                //pindahkan gambar

                $image->move('img', $imagename);
                if ($imagelama != 'default.jpg') {
                    //hapus file lama
                    if ($imagelama != '') {
                        unlink('img/' . $imagelama);
                    }
                }
            }

            $data = [
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'name' => $this->request->getVar('name'),
                'image' =>  $imagename
            ];
            $this->usermodel->updatedata($data, $npm);
            session()->setFlashdata('Update', 'Your Profile has been updated');
            session()->remove('image');
            session()->set('image', $imagename);
        } else {

            $npm = $this->request->getVar('npm');
            $data = [
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'name' => $this->request->getVar('name')
            ];
            $this->usermodel->updatedata($data, $npm);
        }

        session()->remove('name');
        session()->set($data);
        session()->setFlashdata('Update', 'Your Profile has been updated');

        return redirect()->to('/user/updateprof');
    }
    public function woracle()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getora($periode, $year);
            $data = [
                'title' => 'Wating List',
                'oracleond' => $this->usermodel->getora($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('user/waitinglist/oracle', $data);
        }
        $data = [
            'title' => 'Wating List',
            'oracleond' => $this->usermodel->getora(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('user/waitinglist/oracle', $data);
    }
    public function wsap()
    {

        $periperi = json_decode($this->request->getVar('periode'), true);


        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getsap($periode, $year);
            $data = [
                'title' => 'Wating List',
                'oracleond' => $this->usermodel->getsap($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];

            return view('user/waitinglist/sap', $data);
        }
        $data = [

            'title' => 'Wating List',
            'sap' => $this->usermodel->getsap(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('user/waitinglist/sap', $data);
    }
    public function wciscomlm()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getciscomlm($periode, $year);
            $data = [
                'title' => 'Wating List',
                'oracleond' => $this->usermodel->getciscomlm($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('user/waitinglist/ciscomlm', $data);
        }
        $data = [

            'title' => 'Wating List',
            'ciscomlm' => $this->usermodel->getciscomlm(),
            'periperi' => $this->usermodel->getadminperiod()

        ];
        return view('user/waitinglist/ciscomlm', $data);
    }
    public function wciscosabtu()
    {

        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getciscosabtu($periode, $year);
            $data = [
                'title' => 'Wating List',
                'oracleond' => $this->usermodel->getciscosabtu($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('user/waitinglist/oracle', $data);
        }
        $data = [

            'title' => 'Wating List',
            'ciscosabtu' => $this->usermodel->getciscosabtu(),
            'periperi' => $this->usermodel->getadminperiod()

        ];
        return view('user/waitinglist/ciscosabtu', $data);
    }
    public function adperiods()
    {

        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            // $admin = $this->usermodel->getadminperiod();
            $perios = $periperi['perios'];
            $year = $periperi['year'];

            $course = $this->request->getVar('course');
            $oraaja = $this->usermodel->getora();
            $sapond = $this->usermodel->sapond($year);
            $sapjfm = $this->usermodel->sapjfm($year);
            $sapamj = $this->usermodel->sapamj($year);
            $sapjas = $this->usermodel->sapjas($year);
            $cisco_malamond = $this->usermodel->cisco_malamond($year);
            $cisco_malamjfm = $this->usermodel->cisco_malamjfm($year);
            $cisco_malamamj = $this->usermodel->cisco_malamamj($year);
            $cisco_malamjas = $this->usermodel->cisco_malamjas($year);
            $cisco_sabtuond = $this->usermodel->cisco_sabtuond($year);
            $cisco_sabtujfm = $this->usermodel->cisco_sabtujfm($year);
            $cisco_sabtuamj = $this->usermodel->cisco_sabtuamj($year);
            $cisco_sabtujas = $this->usermodel->cisco_sabtujas($year);


            $oraond = $this->usermodel->oraond();
            if ($course == 'oracle') {
                if ($perios == 'jfm' && $year == '2021') {
                    if (count($oraaja) >= 20) {
                        session()->setFlashdata('pesan', 'Sorry Your course choice does not exist longer ,Please choose other course or period');
                        return redirect()->to('/user/dashboard');
                    }
                } elseif ($perios != 'jfm' && $year != '2021') {
                    session()->setFlashdata('pesan', 'Sorry Your course choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                }
            }
            if ($course == 'sap') {
                if (count($sapond) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($sapjfm) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($sapamj) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($sapjas) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                }
            }
            if ($course == 'cisco_malam') {
                if (count($cisco_malamond) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($cisco_malamjfm) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($cisco_malamamj) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($cisco_malamjas) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                }
            }
            if ($course == 'cisco_sabtu') {
                if (count($cisco_sabtuond) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($cisco_sabtujfm) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($cisco_sabtuamj) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                } elseif (count($cisco_sabtujas) >= 40) {
                    session()->setFlashdata('pesan', 'Sorry Your period choice does not exist longer ,Please choose other course or period');
                    return redirect()->to('/user/dashboard');
                }
            }

            if ($perios == 'ond') {
                $ond = 1;
                $jfm = 0;
                $amj = 0;
                $jas = 0;
            } elseif ($perios == 'jfm') {
                $ond = 0;
                $jfm = 1;
                $amj = 0;
                $jas = 0;
            } elseif ($perios == 'amj') {
                $ond = 0;
                $jfm = 0;
                $amj = 1;
                $jas = 0;
            } elseif ($perios == 'jas') {
                $ond = 0;
                $jfm = 0;
                $amj = 0;
                $jas = 1;
            }
            if ($this->request->getVar('course') == 'oracle') {
                $oracle = 1;
                $sap = 0;
                $cisco_malam = 0;
                $cisco_sabtu = 0;
            } elseif ($this->request->getVar('course') == 'sap') {
                $oracle = 0;
                $sap = 1;
                $cisco_malam = 0;
                $cisco_sabtu = 0;
            } elseif ($this->request->getVar('course') == 'cisco_malam') {
                $oracle = 0;
                $sap = 0;
                $cisco_malam = 1;
                $cisco_sabtu = 0;
            } elseif ($this->request->getVar('course') == 'cisco_sabtu') {
                $oracle = 0;
                $sap = 0;
                $cisco_malam = 0;
                $cisco_sabtu = 1;
            }

            $npm = session()->get('npm');
            $data = [
                'npm' => $npm,
                'ond' => $ond,
                'jfm' => $jfm,
                'amj' => $amj,
                'jas' => $jas,
                'oracle' => $oracle,
                'sap' => $sap,
                'cisco_malam' => $cisco_malam,
                'cisco_sabtu' => $cisco_sabtu,
                'year' => $year
            ];
            $data2 = [
                'oracle' => $oracle,
                'sap' => $sap,
                'cisco_malam' => $cisco_malam,
                'cisco_sabtu' => $cisco_sabtu
            ];
            $this->usermodel->addcourse($data);
            $this->usermodel->updateusercourse($npm, $data2);
            $user = $this->usermodel->getuser($npm);

            session()->remove('oracle');
            session()->remove('sap');
            session()->remove('cisco_malam');
            session()->remove('cisco_sabtu');
            $data = [
                'oracle' => $user['oracle'],
                'sap' => $user['sap'],
                'cisco_malam' => $user['cisco_malam'],
                'cisco_sabtu' => $user['cisco_sabtu'],
            ];
            session()->set($data);
            return redirect()->to('/user/dashboard');
        } else {
            return redirect()->to('/user/dashboard');
        }
    }
    public function updateprof()
    {
        $npm = session()->get('npm');

        $data = [
            'title' => 'Edit Profie',
            'validation' => \Config\Services::validation(),
            'user' => $this->usermodel->getuser($npm),
            'periperi' => $this->usermodel->getadminperiod()
        ];

        return view('user/profile/index', $data);
    }
    public function changepassword()
    {
        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation(),
            'periperi' => $this->usermodel->getadminperiod()
        ];

        return view('user/changepassword', $data);
    }
    public function cgpswd()
    {
        if (!$this->validate([
            'oldpassword' => ['label' => 'Old Password', 'rules' => 'required'],
            'newpassword' => ['label' => 'Password', 'rules' => 'required|min_length[3]|matches[confirmpassword]'],
            'confirmpassword' => ['label' => 'Confirm_password', 'rules' => 'required|min_length[3]|matches[newpassword]']

        ])) {
            return redirect()->to('/user/changepassword')->withInput();
        } else {
            $npm = session()->get('npm');
            $user = $this->usermodel->getuser($npm);
            $oldpsswd = $this->request->getVar('oldpassword');
            $psswd = password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT);
            if (password_verify($oldpsswd, $user['password'])) {
                $this->usermodel->changepsswd($npm, $psswd);
                session()->setFlashdata('pesan', 'Congratulation ,Your password has been changed');
                return redirect()->to('/user/dashboard');
            } else {
                session()->setFlashdata('wrong', 'You added wrong old password');
                return redirect()->to('/user/changepassword');
            }
        }
    }
    public function download()
    {
        $data = $this->request->getVar('getdatas');
        return  $this->response->download('certif/' . $data . '.pdf', null);
        return redirect()->to('/user/dashboard');
    }
}
