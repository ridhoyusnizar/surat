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
    }

    public function alur()
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $this->load->view('templates/alur_surat', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }


    public function search()
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1') {
            $keyword = $this->input->post('keyword');
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $data['surat'] = $this->m_masuk->search($keyword);
            $this->load->view('templates/surat_masuk_search_view', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function kendali($id = null, $id_surat_masuk = null)
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $surat = $this->m_masuk;
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $data["surat"] = $surat->getById($id);
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
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1') {
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $data['surat_masuk'] = $this->m_masuk->getAll();
            $data['user'] = $this->login_model->getAlluser();
            $this->load->view('templates/surat_masuk_rekap', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function rekapSaya()
    {
        if ($this->session->userdata('akses') == '1') {
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $data['surat'] = $this->m_masuk->getAll();
            $data['user'] = $this->login_model->getAlluser();
            $this->load->view('templates/surat_masuk_rekap_user', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function add()
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $data['kode'] = $this->m_masuk->kode_();
            $surat = $this->m_masuk;
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
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
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
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
            if (!isset($id_surat_masuk)) redirect('suratmasuk/rekap');
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $surat = $this->m_masuk;
            $validation = $this->form_validation;
            $validation->set_rules($surat->rules());

            if ($validation->run()) {
                $surat->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $data["surat"] = $surat->getById($id_surat_masuk);
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
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $surat = $this->m_masuk;
            $validation = $this->form_validation;
            $validation->set_rules($surat->rules());

            if ($validation->run()) {
                $surat->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $data["surat"] = $surat->getById($id_surat_masuk);
            if (!$data["surat"]) show_404();

            $this->load->view("templates/surat_masuk_disposisi_status", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampil($id = null)
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $surat = $this->m_masuk;
            $data["surat"] = $surat->getById($id);
            if (!$data["surat"]) show_404();
            $this->load->view("templates/surat_masuk_tampil", $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampilPDF($id = null, $id_surat_masuk = null)
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $surat = $this->m_masuk;
            $data["surat"] = $surat->getById($id);
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

    function uploadFile()
    {
        if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
            $data = array();
            // If file upload form submitted
            if ($this->input->post('fileSubmit') && !empty($_FILES['files_masuk']['name'])) {
                $filesCount = count($_FILES['files_masuk']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name']     = $_FILES['files_masuk']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['files_masuk']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files_masuk']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['files_masuk']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['files_masuk']['size'][$i];

                    // File upload configuration
                    $uploadPath = './upload/files/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    }
                }

                if (!empty($uploadData)) {
                    // Insert files data into the database
                    $insert = $this->m_file->insert($uploadData);

                    // Upload status message
                    $statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
                    $this->session->set_flashdata('statusMsg', $statusMsg);
                }
            }

            // Get files data from the database
            $data['files_masuk'] = $this->m_file->getRows();

            // Pass the files data to view
            redirect(site_url('Suratmasuk/rekap'));
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
