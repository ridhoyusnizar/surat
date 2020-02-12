<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Suratmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_masuk');
        $this->load->model('m_file');
        $this->load->model('login_model');
        $this->load->model('m_disposisi', '', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('form', 'url'));
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $this->load->vars($data);
        $this->all_akses = in_array($this->session->userdata('akses'), [1, 2, 3, 4]);
        $this->sistem_surat = in_array($this->session->userdata('akses'), [1, 3, 4]);
        $this->edit_del_upl_add = in_array($this->session->userdata('akses'), [3, 4]);
        $this->user_biasa = in_array($this->session->userdata('akses'), [1, 2]);
    }

    public function alur()
    {
        if ($this->all_akses) {
            $this->load->view('templates/alur_surat');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function kendali($id = null, $id_surat_masuk = null)
    {
        if ($this->all_akses) {
            $data["surat"] = $this->m_masuk->getById($id);
            $data['user'] = $this->login_model->getNama();
            $data['user2'] = $this->login_model->getNama2();
            // TERBACA
            $status_terbaca = '1';

            $r = array(
                'status_terbaca' => $status_terbaca,
            );
            $a = $this->m_disposisi->updateTerbaca($id_surat_masuk, $r);
            if (!$data["surat"]) show_404();

            $this->load->view("templates/multi", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function rekap()
    {
        if ($this->all_akses) {
            $data['surat_masuk'] = $this->m_masuk->getAll();
            $this->load->view('templates/surat_masuk_rekap', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function add()
    {
        if ($this->edit_del_upl_add) {
            $data['kode'] = $this->m_masuk->kode_();
            $validation = $this->form_validation;
            $validation->set_rules($this->m_masuk->rules());

            if ($validation->run()) {
                $this->m_masuk->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $this->load->view("templates/surat_masuk_entry", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function delete($id_surat_masuk = null)
    {
        if ($this->edit_del_upl_add) {
            if (!isset($id_surat_masuk)) show_404();

            if ($this->m_masuk->delete($id_surat_masuk)) {
                redirect(site_url('Suratmasuk/rekap'));
            }
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function edit($id_surat_masuk = null)
    {
        if ($this->edit_del_upl_add) {
            if (!isset($id_surat_masuk)) redirect('suratmasuk/rekap');
            $validation = $this->form_validation;
            $validation->set_rules($this->m_masuk->rules());

            if ($validation->run()) {
                $this->m_masuk->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $data["surat"] = $this->m_masuk->getById($id_surat_masuk);
            if (!$data["surat"]) show_404();

            $this->load->view("templates/surat_masuk_edit", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function editStatus($id_surat_masuk = null)
    {
        if ($this->session->userdata('akses') == '3') {
            if (!isset($id_surat_masuk)) redirect('disposisi/rekapSaya');
            $validation = $this->form_validation;
            $validation->set_rules($this->m_masuk->rules());

            if ($validation->run()) {
                $this->m_masuk->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $data["surat"] = $this->m_masuk->getById($id_surat_masuk);
            if (!$data["surat"]) show_404();

            $this->load->view("templates/surat_masuk_disposisi_status", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampil($id = null)
    {
        if ($this->all_akses) {
            $data["surat"] = $this->m_masuk->getById($id);
            if (!$data["surat"]) show_404();
            $this->load->view("templates/surat_masuk_tampil", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampilPDF($id = null, $id_surat_masuk = null)
    {
        if ($this->all_akses) {
            $data["surat"] = $this->m_masuk->getById($id);
            if (!$data["surat"]) show_404();
            // TERBACA
            $status_terbaca = '1';

            $r = array(
                'status_terbaca' => $status_terbaca,
            );
            $a = $this->m_disposisi->updateTerbaca($id_surat_masuk, $r);
            $this->load->view("templates/file_masuk", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    // Export ke excel
    public function export()
    {
        $surat = $this->m_masuk->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('YBW UII')
            ->setLastModifiedBy('YBW UII')
            ->setTitle('Laporan Surat Masuk')
            ->setSubject('Rekapitulasi Laporan Surat Masuk')
            ->setDescription('')
            ->setKeywords('')
            ->setCategory('');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tanggal Agenda')
            ->setCellValue('B1', 'Waktu Agenda')
            ->setCellValue('C1', 'No Agenda')
            ->setCellValue('D1', 'Tanggal Surat')
            ->setCellValue('E1', 'No Surat')
            ->setCellValue('F1', 'Asal Surat')
            ->setCellValue('G1', 'Sifat Surat')
            ->setCellValue('H1', 'Jenis Surat')
            ->setCellValue('I1', 'Kelompok')
            ->setCellValue('J1', 'Alamat')
            ->setCellValue('K1', 'Perihal');

        // Miscellaneous glyphs, UTF-8
        $i = 2;
        foreach ($surat as $surat) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $surat->tanggal_agenda)
                ->setCellValue('B' . $i, $surat->waktu_agenda)
                ->setCellValue('C' . $i, $surat->no_agenda)
                ->setCellValue('D' . $i, $surat->tanggal_surat)
                ->setCellValue('E' . $i, $surat->no_surat)
                ->setCellValue('F' . $i, $surat->asal_surat)
                ->setCellValue('G' . $i, $surat->sifat_surat)
                ->setCellValue('H' . $i, $surat->sifat_surat_detail)
                ->setCellValue('I' . $i, $surat->kelompok)
                ->setCellValue('J' . $i, $surat->alamat)
                ->setCellValue('K' . $i, $surat->perihal);
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
