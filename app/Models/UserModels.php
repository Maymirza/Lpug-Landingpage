<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use DateTime;

class UserModels extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = [];
    public function getuser($npm)
    {
        return $this->where('npm', $npm)->first();
    }
    public function getoracle2()
    {
        return $this->where('oracle', 2)->findall();
    }
    public function getsap2()
    {
        return $this->where('sap', 2)->findall();
    }
    public function getciscom2()
    {
        return $this->where('cisco_malam', 2)->findall();
    }
    public function getciscos2()
    {
        return $this->where('cisco_sabtu', 2)->findall();
    }
    public function getoracleblank()
    {
        return $this->where('oracle >', 100)->findall();
    }
    public function getsapblank()
    {
        return $this->where('sap >', 100)->findall();
    }
    public function getciscomblank()
    {
        return $this->where('cisco_malam >', 100)->findall();
    }
    public function getciscosblank()
    {
        return $this->where('cisco_sabtu >', 100)->findall();
    }
    public function uoracle($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('oracle', $npm);
        $builder->set('status', 'menunggu pembayaran ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function usap($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('sap', $npm);
        $builder->set('status', 'menunggu pembayaran ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function uciscom($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_malam', $npm);
        $builder->set('status', 'menunggu pembayaran ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function uciscos($npm)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('cisco_sabtu', $npm);
        $builder->set('status', 'menunggu pembayaran ');
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function getinv()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('invoice');
        $builder->join('user', 'user.npm = invoice.npm');
        $builder->where('role_id >', 1);
        $builder->where('user.npm', session()->get('npm'));
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function addcourse($data)
    {
        $Time = new Time('now');
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->where('npm', session()->get('npm'));
        $builder->delete();
        $builder->set($data);
        $builder->set('created_at', $Time);
        $builder->insert();
    }
    public function updateusercourse($npm, $data2)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set($data2);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function getora($periode = false, $year = false)
    {

        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle', 1);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.oracle', 1);
            $builder->where("periode." . $periode, true);
            $builder->where('periode.year', $year);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function getsap($periode = false, $year = false)
    {

        if ($periode == false && $year == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->orderBy('periode.created_at', 'ASC');
            $builder->where('user.sap', 1);

            return $builder->get()->getResultArray();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('user');
            $builder->join('periode', 'periode.npm=user.npm');
            $builder->where('user.sap', 1);
            $builder->where("periode." . $periode, true);
            $builder->where('year', $year);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
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
            $builder->where("periode." . $periode, true);
            $builder->where('year', $year);
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
            $builder->where("periode." . $periode, true);
            $builder->where('year', $year);
            $builder->orderBy('periode.created_at', 'ASC');
            return $builder->get()->getResultArray();
        }
    }
    public function oraond()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.oracle', true);
        $builder->where("periode.ond", true);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function orajfm($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.oracle', true);
        $builder->where("periode.jfm", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function oraamj($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.oracle', true);
        $builder->where("periode.amj", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function orajas($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.oracle', true);
        $builder->where("periode.jas", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function sapond($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.sap', true);
        $builder->where("periode.ond", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function sapjfm($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.sap', true);
        $builder->where("periode.jfm", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function sapamj($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.sap', true);
        $builder->where("periode.amj", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function sapjas($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.sap', true);
        $builder->where("periode.jas", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_malamond($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_malam', true);
        $builder->where("periode.ond", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_malamjfm($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_malam', true);
        $builder->where("periode.jfm", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_malamamj($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_malam', true);
        $builder->where("periode.amj", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_malamjas($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_malam', true);
        $builder->where("periode.jas", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_sabtuond($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_sabtu', true);
        $builder->where("periode.ond", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_sabtujfm($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_sabtu', true);
        $builder->where("periode.jfm", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_sabtuamj($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_sabtu', true);
        $builder->where("periode.amj", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function cisco_sabtujas($year)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->join('periode', 'periode.npm=user.npm');
        $builder->where('periode.cisco_sabtu', true);
        $builder->where("periode.jas", true);
        $builder->where('year', $year);
        $builder->orderBy('periode.created_at', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function getadminperiod()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin_period');
        return $builder->get()->getResultArray();
    }

    public function changepsswd($npm, $psswd)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('password', $psswd);
        $builder->where('npm', $npm);
        $builder->update();
    }
    public function updatedata($data, $npm)
    {
        return $this->db->table($this->table)->update($data, ['npm' => $npm]);
    }
}
