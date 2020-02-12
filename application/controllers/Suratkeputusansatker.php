<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Suratkeputusansatker extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_keputusan_satker');
    $this->load->model('m_disposisi', '', TRUE);
    $this->load->library('form_validation');
    $this->load->helper('url');
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

  public function rekap()
  {
    if ($this->sistem_surat) {
      $data['surat'] = $this->m_keputusan_satker->getAll();
      $this->load->view('templates/surat_keputusan_rekap', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function add()
  {
    if ($this->edit_del_upl_add) {
      $data['kode'] = $this->m_keputusan_satker->kode_();
      $data['surat'] = $this->m_keputusan_satker->getAll();
      $validation = $this->form_validation;
      $validation->set_rules($this->m_keputusan_satker->rules());

      if ($validation->run()) {
        $this->m_keputusan_satker->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
      }

      $this->load->view('templates/surat_keputusan_satker_entry', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }


  public function delete($id = null)
  {
    if ($this->edit_del_upl_add) {
      if (!isset($id)) show_404();

      if ($this->m_keputusan_satker->delete($id)) {
        redirect(site_url('Suratkeputusan/rekap'));
      }
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function edit($id = null)
  {
    if ($this->edit_del_upl_add) {
      if (!isset($id)) redirect('suratkeputusan/rekap');
      $validation = $this->form_validation;
      $validation->set_rules($this->m_keputusan_satker->rules());

      if ($validation->run()) {
        $this->m_keputusan_satker->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
      }

      $data["surat"] = $this->m_keputusan_satker->getById($id);
      if (!$data["surat"]) show_404();

      $this->load->view("templates/surat_keputusan_satker_edit", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function tampil($id = null)
  {
    if ($this->sistem_surat) {
      $data["surat"] = $this->m_keputusan_satker->getById($id);
      if (!$data["surat"]) show_404();

      $this->load->view("templates/surat_keputusan_satker_tampil", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function tampilPDF($id = null)
  {
    if ($this->sistem_surat) {
      $data["surat"] = $this->m_keputusan_satker->getById($id);
      if (!$data["surat"]) show_404();
      $this->load->view("templates/file_keputusan_satker", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  // Export ke excel
  public function export()
  {
    $surat = $this->m_keputusan_satker->listing();
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Set document properties
    $spreadsheet->getProperties()->setCreator('YBW UII')
      ->setLastModifiedBy('YBW UII')
      ->setTitle('Laporan Surat Keputusan SATKER')
      ->setSubject('Rekapitulasi Laporan Surat Keputusan SATKER')
      ->setDescription('')
      ->setKeywords('')
      ->setCategory('');

    // Add some data
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No Surat')
      ->setCellValue('B1', 'Tanggal')
      ->setCellValue('C1', 'Isi Surat');

    // Miscellaneous glyphs, UTF-8
    $i = 2;
    foreach ($surat as $surat) {

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $i, $surat->no_surat_no . $surat->no_surat_noplus . '/' . $surat->no_surat_kode . '/' . $surat->no_surat_kelompok . '/' . $surat->no_surat_romawi . '/' . $surat->no_surat_tahun)
        ->setCellValue('B' . $i, $surat->tanggal)
        ->setCellValue('C' . $i, $surat->isi_surat);
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
