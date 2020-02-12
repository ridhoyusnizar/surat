<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Keputusan extends CI_Controller {
		public function __construct(){
        parent::__construct();
        $this->load->model('m_kep');
        $this->load->model('m_disposisi', '', TRUE);
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->helper('tgl_indo');
        $this->load->helper('url');
            if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	}

	public function rekap(){
		if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='1'){
	      		$data['surat'] = $this->m_kep->getAll();
                $data["notif"] = $this->m_disposisi->getNotifikasi();
                $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
				$this->load->view('templates/keputusan_rekap', $data);
	    }else{
	      echo "Anda tidak berhak mengakses halaman ini";
	    }

	}

	public function add()
    {
        if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3'){
        $data['kode'] = $this->m_kep->kode_();
        $data['surat'] = $this->m_kep->getAll();
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $surat = $this->m_kep;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('templates/keputusan_entry', $data);
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }


	    public function delete($id=null)
    {
        if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3'){
        if (!isset($id)) show_404();
        
        if ($this->m_kep->delete($id)) {
            redirect(site_url('keputusan/rekap'));
        }
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function edit($id = null)
    {
        if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3'){
        if (!isset($id)) redirect('keputusan/rekap');
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $surat = $this->m_kep;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        
        $this->load->view("templates/keputusan_edit", $data);
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampil($id = null)
    {
        if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='1'){
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $surat = $this->m_kep;
        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        
        $this->load->view("templates/keputusan_tampil", $data);
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

        public function tampilPDF($id = null)
    {
        if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='1'){
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $surat = $this->m_kep;
        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        $this->load->view("templates/file_kep", $data);
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    // Export ke excel
        public function export()
        {
        $surat = $this->m_kep->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('YBW UII')
        ->setLastModifiedBy('YBW UII')
        ->setTitle('Laporan Keputusan')
        ->setSubject('Rekapitulasi Laporan Keputusan')
        ->setDescription('')
        ->setKeywords('')
        ->setCategory('');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'No Surat')
        ->setCellValue('B1', 'Tanggal')
        ->setCellValue('C1', 'Isi Surat')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; foreach($surat as $surat) {

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $surat->no_surat_no.$surat->no_surat_noplus.'/'.$surat->no_surat_kode.'/'.$surat->no_surat_romawi.'/'.$surat->no_surat_tahun)
        ->setCellValue('B'.$i, $surat->tanggal)
        ->setCellValue('C'.$i, $surat->isi_surat);
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y'));

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