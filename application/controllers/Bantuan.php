<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeputusan extends CI_Controller {
		public function __construct(){
        parent::__construct();
        $this->load->model('m_bantuan');
        $this->load->model('m_tanggapan');
        $this->load->model('login_model');
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
        $this->load->helper('url');
            if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	}

	public function rekap(){
		if($this->session->userdata('akses')=='3'){
	      		$data['bantuan'] = $this->m_bantuan->getAll();
				$this->load->view('templates/bantuan_rekap', $data);
	    }else{
	      echo "Anda tidak berhak mengakses halaman ini";
	    }

	}

	public function add()
    {
        if($this->session->userdata('akses')=='3'){
        $data['bantuan'] = $this->m_bantuan->getAll();
        $bantuan = $this->m_bantuan;
        $validation = $this->form_validation;
        $validation->set_rules($bantuan->rules());

        if ($validation->run()) {
            $surat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('templates/bantuan_entry', $data);
        // var_dump($surat_keluar);
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }


	    public function delete($id=null)
    {
        if($this->session->userdata('akses')=='3'){
        if (!isset($id)) show_404();
        
        if ($this->m_bantuan->delete($id)) {
            redirect(site_url('bantuan/rekap'));
        }
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }

    }

    public function edit($id = null)
    {
        if($this->session->userdata('akses')=='3'){
        if (!isset($id)) redirect('bantuan/rekap');
       
        $bantuan = $this->m_bantuan;
        $validation = $this->form_validation;
        $validation->set_rules($bantuan->rules());

        if ($validation->run()) {
            $bantuan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["bantuan"] = $bantuan->getById($id);
        if (!$data["bantuan"]) show_404();
        
        $this->load->view("templates/bantuan_edit", $data);
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampil($id = null)
    {
        if(($this->session->userdata('akses')=='3')){
        $bantuan = $this->m_bantuan;
        $data["bantuan"] = $surat->getById($id);
        if (!$data["bantuan"]) show_404();
        
        $this->load->view("templates/bantuan_tampil", $data);
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }
}