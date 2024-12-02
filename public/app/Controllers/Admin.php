<?php

namespace App\Controllers;

use App\Models\AdminModels;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xls as WriterXls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    protected $helpers = ['pancha_helper'];
    protected $usermodel;
    public function __construct()
    {
        if (session()->get('email') == null) {
            header('Location: /auth');
        }
        $this->usermodel = new AdminModels();
    }
    public function dashboard()
    {

        $data = [
            'title' => 'dashboard',
            'oracle' => $this->usermodel->getoracle4(),
            'sap' => $this->usermodel->getsap4(),
            'cisco_malam' => $this->usermodel->getciscomlm4(),
            'cisco_sabtu' => $this->usermodel->getciscosabtu4(),
            'periperi' => $this->usermodel->getadminperiod(),
            'information' => $this->usermodel->getinfo()


        ];

        return view('admin/dashboard', $data);
    }
    public function woracle()
    {

        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getoracle($periode, $year);
            $data = [
                'title' => 'Wating List',
                'oracle' => $this->usermodel->getoracle($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/waiting/oracle', $data);
        }
        $data = [
            'title' => 'WaitingList ORACLE',
            'oracle' => $this->usermodel->getoracle(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/waiting/oracle', $data);
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
                'sap' => $this->usermodel->getsap($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/waiting/sap', $data);
        }
        $data = [
            'title' => 'WaitingList SAP',
            'sap' => $this->usermodel->getsap(),
            'periperi' => $this->usermodel->getadminperiod()
        ];

        return view('admin/waiting/sap', $data);
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
                'ciscomlm' => $this->usermodel->getciscomlm($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/waiting/ciscomlm', $data);
        }
        $data = [
            'title' => 'WaitingList CISCO',
            'ciscomlm' => $this->usermodel->getciscomlm(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/waiting/ciscomlm', $data);
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
                'ciscosabtu' => $this->usermodel->getciscosabtu($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/waiting/ciscosabtu', $data);
        }
        $data = [
            'title' => 'WaitingList CISCO',
            'ciscosabtu' => $this->usermodel->getciscosabtu(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/waiting/ciscosabtu', $data);
    }
    public function approveo()
    {
        $date = $this->request->getVar('dates');
        $courses = 'oracle';
        $npm = $this->request->getVar('waitapo');

        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->apo($npm[$i], $date, $courses);
        }
        return redirect()->to('/admin/woracle');
    }
    public function approves()
    {
        $npm = $this->request->getVar('waitaps');
        $date = $this->request->getVar('dates');
        $courses = 'sap';
        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->aps($npm[$i], $date, $courses);
        }
        return redirect()->to('/admin/wsap');
    }
    public function approvecm()
    {
        $npm = $this->request->getVar('waitapcm');
        $date = $this->request->getVar('dates');
        $courses = 'cisco';
        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->apcm($npm[$i], $date, $courses);
        }
        return redirect()->to('/admin/wciscomlm');
    }
    public function approvecs()
    {
        $npm = $this->request->getVar('waitapcs');
        $date = $this->request->getVar('dates');
        $courses = 'cisco';
        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->apcs($npm[$i], $date, $courses);
        }
        return redirect()->to('/admin/wciscosabtu');
    }
    public function boracle()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getoracle2($periode, $year);
            $data = [
                'title' => 'Wating List',
                'oracle' => $this->usermodel->getoracle2($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/blanko/oracle', $data);
        }
        $data = [
            'title' => 'Blanko ORACLE',
            'oracle' => $this->usermodel->getoracle2(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/blanko/oracle', $data);
    }
    public function bsap()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getsap2($periode, $year);
            $data = [
                'title' => 'Wating List',
                'sap' => $this->usermodel->getsap2($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/blanko/sap', $data);
        }
        $data = [
            'title' => 'Blanko SAP',
            'sap' => $this->usermodel->getsap2(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/blanko/sap', $data);
    }
    public function bciscom()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getciscomlm2($periode, $year);
            $data = [
                'title' => 'Wating List',
                'ciscomlm' => $this->usermodel->getciscomlm2($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/blanko/ciscomlm', $data);
        }
        $data = [
            'title' => 'Blanko CISCO Malam',
            'ciscomlm' => $this->usermodel->getciscomlm2(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/blanko/ciscomlm', $data);
    }
    public function bciscos()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);

        if ($periperi != null) {
            $periperi = json_decode($this->request->getVar('periode'), true);
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $periode = $perios;
            $this->usermodel->getciscosabtu2($periode, $year);
            $data = [
                'title' => 'Wating List',
                'ciscosabtu' => $this->usermodel->getciscosabtu2($periode, $year),
                'periperi' => $this->usermodel->getadminperiod()
            ];
            return view('admin/blanko/ciscosabtu', $data);
        }
        $data = [
            'title' => 'Blanko CISCO',
            'ciscosabtu' => $this->usermodel->getciscosabtu2(),
            'periperi' => $this->usermodel->getadminperiod()
        ];
        return view('admin/blanko/ciscosabtu', $data);
    }
    public function approvebo()
    {
        $npm = $this->request->getVar('blankora');
        $kelas = 'Ora_01';
        if ($npm == true) {
            for ($i = 0; $i < count($npm); $i++) {
                $this->usermodel->apbo($npm[$i], $kelas);
            }
            return redirect()->to('/admin/boracle');
        }
        return redirect()->to('/admin/boracle');
    }
    public function approvebs()
    {
        $npm = $this->request->getVar('blanksap');
        $kelas = 'Sap_01';
        $kels = $this->usermodel->getksap($kelas);

        if (count($kels) >= 20) {
            $kelas = 'Sap_02';
            if ($npm == true) {
                for ($i = 0; $i < count($npm); $i++) {
                    $this->usermodel->apbs($npm[$i], $kelas);
                }
                return redirect()->to('/admin/bsap');
            }
        }
        if ($npm == true) {
            for ($i = 0; $i < count($npm); $i++) {
                $this->usermodel->apbs($npm[$i], $kelas);
            }
            return redirect()->to('/admin/bsap');
        }
        return redirect()->to('/admin/bsap');
    }
    public function approvebcm()
    {
        $npm = $this->request->getVar('blankcis');
        $kelas = 'Cis_M01';
        $kels = $this->usermodel->getkcism($kelas);
        if (count($kels) >= 20) {
            $kelas = 'Cis_M02';
            if ($npm == true) {
                for ($i = 0; $i < count($npm); $i++) {
                    $this->usermodel->apbcm($npm[$i], $kelas);
                }
                return redirect()->to('/admin/bciscom');
            }
        }
        if ($npm == true) {
            for ($i = 0; $i < count($npm); $i++) {
                $this->usermodel->apbcm($npm[$i], $kelas);
            }
            return redirect()->to('/admin/bciscom');
        }
        return redirect()->to('/admin/bciscom');
    }
    public function approvebcs()
    {
        $npm = $this->request->getVar('blankcis');
        $kelas = 'Cis_S01';
        $kels = $this->usermodel->getkciss($kelas);
        if (count($kels) >= 20) {
            $kelas = 'Cis_S02';
            if ($npm == true) {
                for ($i = 0; $i < count($npm); $i++) {
                    $this->usermodel->apbcs($npm[$i], $kelas);
                }
                return redirect()->to('/admin/bciscos');
            }
        }
        if ($npm == true) {
            for ($i = 0; $i < count($npm); $i++) {
                $this->usermodel->apbcs($npm[$i], $kelas);
            }
            return redirect()->to('/admin/bciscos');
        }
        return redirect()->to('/admin/bciscos');
    }
    public function periodsora()
    {
        $user = $this->request->getVar('periodora');
        $period = $this->request->getVar('periode');

        for ($i = 0; $i < count($user); $i++) {
            $this->usermodel->insertperiodora($user[$i], $period);
            $this->usermodel->inputora4($user[$i]);
        }
        return redirect()->to('/admin/dashboard');
    }
    public function periodssap()
    {
        $user = $this->request->getVar('periodsap');
        $period = $this->request->getVar('periode');

        for ($i = 0; $i < count($user); $i++) {
            $this->usermodel->insertperiodsap($user[$i], $period);
            $this->usermodel->inputsap4($user[$i]);
        }
        return redirect()->to('/admin/dashboard');
    }
    public function periodscisco()
    {
        $user = $this->request->getVar('periodcisco');
        $period = $this->request->getVar('periode');
        for ($i = 0; $i < count($user); $i++) {
            $this->usermodel->insertperiodcisco($user[$i], $period);
            $this->usermodel->inputcisco4($user[$i]);
        }
        return redirect()->to('/admin/dashboard');
    }
    public function addperiod()
    {
        $period = $this->request->getVar('course');

        if ($period == "Period") {
            return redirect()->to('/admin/dashboard');
        }

        if ($period != 'perios')

            if ($period == 'ond') {
                $perios = 'Oktober-November-Desember';
            } elseif ($period == 'jfm') {
                $perios = 'Januari-Februari-Maret';
            } elseif ($period == 'amj') {
                $perios = 'April-Mei-Juni';
            } elseif ($period == 'jas') {
                $perios = 'July-Agustus-September';
            }
        $year = $this->request->getVar('year');

        $this->usermodel->addperiod($period, $perios, $year);
        return redirect()->to('/admin/dashboard');
    }
    public function updateperiode()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);
        $npm = $this->request->getVar('npm');
        if ($periperi != null) {
            $perios = $periperi['perios'];
            $year = $periperi['year'];
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
            $data = [
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
            $this->usermodel->changeperiod($data, $npm);
            $data2 = [
                'oracle' => $oracle,
                'sap' => $sap,
                'cisco_malam' => $cisco_malam,
                'cisco_sabtu' => $cisco_sabtu
            ];
            $this->usermodel->changeperioduser($data2, $npm);
            return redirect()->to('/admin/dashboard');
        }
        return redirect()->to('/admin/dashboard');
    }
    public function onproveorac()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);
        $npm = $this->request->getVar('npm');
        if ($periperi != null) {
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $data = [
                'title' => 'OnGoing Oracle',
                'periperi' =>  $this->usermodel->getadminperiod(),
                'oracle' => $this->usermodel->getora3($perios, $year)
            ];
            return view('admin/ongoing/oracle', $data);
        }
        $data = [
            'title' => 'OnGoing Oracle',
            'periperi' =>  $this->usermodel->getadminperiod(),
            'oracle' => $this->usermodel->getora3()
        ];
        return view('admin/ongoing/oracle', $data);
    }
    public function onprovesap()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);
        $npm = $this->request->getVar('npm');
        if ($periperi != null) {
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $data = [
                'title' => 'OnGoing Sap',
                'periperi' =>  $this->usermodel->getadminperiod(),
                'sap' => $this->usermodel->getsap3($perios, $year)
            ];
            return view('admin/ongoing/sap', $data);
        }
        $data = [
            'title' => 'OnGoing Sap',
            'periperi' =>  $this->usermodel->getadminperiod(),
            'sap' => $this->usermodel->getsap3()
        ];
        return view('admin/ongoing/sap', $data);
    }
    public function onprovecism()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);
        $npm = $this->request->getVar('npm');
        if ($periperi != null) {
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $data = [
                'title' => 'OnGoing Cisco Malam',
                'periperi' =>  $this->usermodel->getadminperiod(),
                'ciscomlm' => $this->usermodel->getciscomlm3($perios, $year)
            ];
            return view('admin/ongoing/ciscomlm', $data);
        }
        $data = [
            'title' => 'OnGoing Cisco Malam',
            'periperi' =>  $this->usermodel->getadminperiod(),
            'ciscomlm' => $this->usermodel->getciscomlm3()
        ];
        return view('admin/ongoing/ciscomlm', $data);
    }
    public function onproveciss()
    {
        $periperi = json_decode($this->request->getVar('periode'), true);
        $npm = $this->request->getVar('npm');
        if ($periperi != null) {
            $perios = $periperi['perios'];
            $year = $periperi['year'];
            $data = [
                'title' => 'OnGoing Sabtu',
                'periperi' =>  $this->usermodel->getadminperiod(),
                'ciscosabtu' => $this->usermodel->getciscosabtu3($perios, $year)
            ];
            return view('admin/ongoing/ciscosabtu', $data);
        }
        $data = [
            'title' => 'OnGoing Sabtu',
            'periperi' =>  $this->usermodel->getadminperiod(),
            'ciscosabtu' => $this->usermodel->getciscosabtu3()
        ];
        return view('admin/ongoing/ciscosabtu', $data);
    }
    public function adselesaiora()
    {
        $npm = $this->request->getVar('waitapo');

        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->adselesaioraadselesaiora($npm[$i]);
        }
        return redirect()->to('/admin/onproveorac');
    }
    public function adselesaisap()
    {
        $npm = $this->request->getVar('waitaps');

        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->adselesaisap($npm[$i]);
        }
        return redirect()->to('/admin/onprovesap');
    }
    public function adselesaimalam()
    {
        $npm = $this->request->getVar('waitapcm');

        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->adselesaicism($npm[$i]);
        }
        return redirect()->to('/admin/onprovecism');
    }
    public function adselesaisabtu()
    {
        $npm = $this->request->getVar('waitapcs');

        for ($i = 0; $i < count($npm); $i++) {
            $this->usermodel->adselesaiciss($npm[$i]);
        }
        return redirect()->to('/admin/onproveciss');
    }
    public function report()
    {

        $user = $this->usermodel->getreport();

        foreach ($user as $u) {
            $data[] = [
                'npm' => $u['npm'],
                'nama' => $u['name'],
                'ket1' => '',
                'ket2' => '',
                'ket3' => '',
                'Deskripsi' => $u['course'] . '(' . $u['start'] . ')',
                'pembayaran' => 'Kursus',
                'Jumlah' => '3,000,000'
            ];
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()
            ->fromArray($data);
        $sheet->insertNewRowBefore(1);
        // tulis header/nama kolom 
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
        ];
        $style2 = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $sheet->getStyle('F2:F500')->applyFromArray($style2);
        $sheet->getStyle('G2:G500')->applyFromArray($style2);
        $sheet->getStyle('H2:H500')->applyFromArray($style2);
        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B1')->applyFromArray($styleArray);
        $sheet->getStyle('C1')->applyFromArray($styleArray);
        $sheet->getStyle('D1')->applyFromArray($styleArray);
        $sheet->getStyle('E1')->applyFromArray($styleArray);
        $sheet->getStyle('F1')->applyFromArray($styleArray);
        $sheet->getStyle('G1')->applyFromArray($styleArray);
        $sheet->getStyle('H1')->applyFromArray($styleArray);
        // $sheet->getStyle('A1:B1')->getAlignment()->setHorizontal('center');

        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NPM')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Ket1')
            ->setCellValue('D1', 'Ket2')
            ->setCellValue('E1', 'Ket3')
            ->setCellValue('F1', 'DESKRIPSI')
            ->setCellValue('G1', 'Jenis Pembayaran')
            ->setCellValue('H1', 'Jumlah Pembayaran');
        // tulis dalam format .xlsx

        $writer = new WriterXls($spreadsheet);
        $fileName = 'Dataaa';
        ob_end_clean();
        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xls');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $writer->save('php://output');

        return redirect()->to('/');
    }

    public function certificate()
    {

        $data = [
            'title' => 'Upload Certif'
        ];
        return view('/admin/UploadCertif', $data);
    }
    public function uploadcertif()
    {

        foreach ($files = $this->request->getFileMultiple('files') as $file) {

            $file->move('certif');
            $title = $file->getClientName();
            $this->usermodel->uploadcertif($title);
            return redirect()->to('/admin/dashboard');
        }
    }

    public function activeinfo()
    {
        $data_id = $this->request->getVar('data_id');
        $is_active = $this->request->getVar('is_active');

        if ($is_active == 0) {
            $val = 1;
            $this->usermodel->updateinfo($data_id, $val);
        } else {
            $val = 0;
            $this->usermodel->updateinfo($data_id, $val);
        }
    }
    public function addinfo()
    {
        $judul = $this->request->getvar('judul');
        $isi = $this->request->getVar('isi');

        $this->usermodel->addinfo($judul, $isi);
        return redirect()->to('/admin/dashboard');
    }
}
