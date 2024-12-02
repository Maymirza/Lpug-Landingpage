<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use DateTime;

class AdminModels extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = [];

    public function getuser($npm = false)
    {
        if ($npm == false) {
            return  $this->where('role_id >', 1)->findall();
        } else {
            return $this->where(['npm' => $npm])->first();
        }
    }
    public function getoracle($periode = false, $year = false)
    {
        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle', 1);
            $builder->orderBy('periode.created_at', 'ASC');
            return   $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle', 1);
            $builder->where('periode.year', $year);
            $builder->where('periode.' . $periode, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return   $builder->get()->getResultArray();
        }
    }
    public function getsap($periode = false, $year = false)
    {
        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap', 1);
            $builder->orderBy('periode.created_at', 'ASC');
            return  $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap', 1);
            $builder->where('periode.year', $year);
            $builder->where('periode.' . $periode, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return  $builder->get()->getResultArray();
        }
    }
    public function getciscomlm($periode = false, $year = false)
    {
        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_malam', 1);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_malam', 1);
            $builder->where('periode.' . $periode, true);
            $builder->where('periode.year', $year);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getciscosabtu($periode = false, $year = false)
    {
        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_sabtu', 1);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_sabtu', 1);
            $builder->where('periode.' . $periode, true);
            $builder->where('periode.year', $year);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getoracle1()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('oracle ', 2);
        return   $builder->get()->getResultArray();
    }
    public function getsap1()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('sap ', 2);
        return   $builder->get()->getResultArray();
    }
    public function getciscomlm1()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('cisco_malam', 2);
        return   $builder->get()->getResultArray();
    }
    public function getciscosabtu1()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('cisco_sabtu', 2);
        return   $builder->get()->getResultArray();
    }
    public function getoracle2($periode = false, $year = false)
    {

        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle >', 100);
            $builder->orderBy('periode.created_at', 'ASC');
            return ($builder->get()->getResultArray());
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle >', 100);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $periode, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getsap2($periode = false, $year = false)
    {

        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap >', 100);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap >', 100);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $periode, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getciscomlm2($periode = false, $year = false)
    {

        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_malam >', 100);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_malam >', 100);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $periode, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getciscosabtu2($periode = false, $year = false)
    {

        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_sabtu >', 100);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_sabtu >', 100);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $periode, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getoracle4()
    {
        return $this->where('oracle', 4)->findall();
    }
    public function getsap4()
    {
        return $this->where('sap', 4)->findall();
    }
    public function getciscomlm4()
    {
        return $this->where('cisco_malam', 4)->findall();
    }
    public function getciscosabtu4()
    {
        return $this->where('cisco_sabtu', 4)->findall();
    }
    public function apo($npm, $date, $courses)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('oracle', 2);
        $builder->set('status', 'proses pendaftaran');
        $builder->set('course', $courses);
        $builder->set('start', $date);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function aps($npm, $date, $courses)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('sap', 2);
        $builder->set('status', 'proses pendaftaran');
        $builder->set('course', $courses);
        $builder->set('start', $date);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function apcm($npm, $date, $courses)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_malam', 2);
        $builder->set('status', 'proses pendaftaran');
        $builder->set('course', $courses);
        $builder->set('start', $date);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function apcs($npm, $date, $courses)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_sabtu', 2);
        $builder->set('status', 'proses pendaftaran');
        $builder->set('course', $courses);
        $builder->set('start', $date);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function apbo($npm, $kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('oracle', 3);
        $builder->set('kelas', $kelas);
        $builder->set('status', 'mengikuti pelatihan ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function apbs($npm, $kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('sap', 3);
        $builder->set('kelas', $kelas);
        $builder->set('status', 'mengikuti pelatihan ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function apbcm($npm, $kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_malam', 3);
        $builder->set('kelas', $kelas);
        $builder->set('status', 'mengikuti pelatihan ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function apbcs($npm, $kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_sabtu', 3);
        $builder->set('kelas', $kelas);
        $builder->set('status', 'mengikuti pelatihan ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function inputora4($user)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('oracle', 4);
        $builder->set('status', 'berjalan');
        $builder->where('npm', $user);
        $builder->update();
    }
    public function inputsap4($user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('sap', 4);
        $builder->set('status', 'berjalan');
        $builder->where('npm', $user);
        $builder->update();
    }
    public function inputcisco4($user)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_malam', 4);
        $builder->set('status', 'berjalan');
        $builder->where('npm', $user);
        $builder->update();
    }
    public function inputciscosabtu4($user)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_sabtu', 4);
        $builder->set('status', 'berjalan');
        $builder->where('npm', $user);
        $builder->update();
    }
    public function getkora($kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('kelas', 'ora_01');
        return  $builder->get()->getResultArray();
    }
    public function getksap($kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('kelas', $kelas);
        return  $builder->get()->getResultArray();
    }
    public function getkcism($kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('kelas', $kelas);
        return  $builder->get()->getResultArray();
    }
    public function getkciss($kelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('kelas', $kelas);
        return  $builder->get()->getResultArray();
    }
    public function getadminperiod()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin_period');
        $result =  $builder->get()->getResultArray();
        if ($result == true) {
            return $result;
        }
    }
    public function addperiod($period, $perios, $year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin_period');
        $builder->set('periode', $period);
        $builder->set('value', $perios);
        $builder->set('year', $year);
        $builder->insert();
    }
    public function changeperiod($data, $npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->set($data);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function changeperioduser($data2, $npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set($data2);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function getora3($perios = false, $year = false)
    {

        if ($perios == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle', 3);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle', 3);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $perios, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getsap3($perios = false, $year = false)
    {

        if ($perios == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap', 3);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap', 3);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $perios, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getciscomlm3($perios = false, $year = false)
    {
        if ($perios == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_malam', 3);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_malam', 3);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $perios, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getciscosabtu3($perios = false, $year = false)
    {
        if ($perios == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_sabtu', 3);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.cisco_sabtu', 3);
            $builder->where('periode.year', $year);
            $builder->where("periode." . $perios, true);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function adselesaiora($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('oracle', 4);
        $builder->set('kelas', '');
        $builder->set('status', 'Telah Lulus');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function adselesaisap($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('sap', 4);
        $builder->set('kelas', '');
        $builder->set('status', 'Telah Lulus');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function adselesaicism($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_malam', 4);
        $builder->set('kelas', '');
        $builder->set('status', 'Telah Lulus');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function adselesaiciss($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('status', 'Telah Lulus');
        $builder->set('kelas', '');
        $builder->set('cisco_sabtu', 4);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function getreport()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select('npm,name,course,start');
        $builder->where('oracle', 2);
        $builder->orWhere('sap', 2);
        $builder->orWhere('cisco_malam', 2);
        $builder->orWhere('cisco_sabtu', 2);
        return $builder->get()->getResultArray();
    }
    public function uploadcertif($title)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_certif');
        $builder->where('name', $title);
        $builder->delete();
        $builder->set('name', $title);
        $builder->insert();
    }
    public function getcertif()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_certif');
        return $builder->get()->getResultArray();
    }
    public function getinfo()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('information');
        return $builder->get()->getResultArray();
    }
    public function updateinfo($data_id, $val)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('information');
        $builder->set('is_active', $val);
        $builder->where('id', $data_id);
        $builder->update();
    }
    public function addinfo($judul, $isi)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('information');
        $builder->set('judul', $judul);
        $builder->set('isi', $isi);
        $builder->set('is_active', 1);
        $builder->insert();
    }
}
