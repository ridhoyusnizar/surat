<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeputusan extends CI_Controller {
		public function __construct(){
        parent::__construct();
        $this->load->model('m_bantuan');
        $this->load->model('m_tanggapan');
        $this->load->model('m_disposisi', '', TRUE);
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
            if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	}

	public function rekap(){
		if($this->session->userdata('akses')=='3'){
	      		$data['tanggapan'] = $this->m_tanggapan->getAll();
				$this->load->view('templates/bantuan_rekap', $data);
	    }else{
	      echo "Anda tidak berhak mengakses halaman ini";
	    }

	}

	public function add()
    {
        if($this->session->userdata('akses')=='3'){
        $data['tanggapan'] = $this->m_tanggapan->getAll();
        $tanggapan = $this->m_tanggapan;
        $validation = $this->form_validation;
        $validation->set_rules($tanggapan->rules());

        if ($validation->run()) {
            $tanggapan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('templates/tanggapan_entry', $data);
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }


	    public function delete($id=null)
    {
        if($this->session->userdata('akses')=='3'){
        if (!isset($id)) show_404();
        
        if ($this->m_tanggapan->delete($id)) {
            redirect(site_url('tanggapan/rekap'));
        }
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }

    }

    public function edit($id = null)
    {
        if($this->session->userdata('akses')=='3'){
        if (!isset($id)) redirect('tanggapan/rekap');
       
        $tanggapan = $this->m_tanggapan;
        $validation = $this->form_validation;
        $validation->set_rules($tanggapan->rules());

        if ($validation->run()) {
            $tanggapan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["tanggapan"] = $tanggapan->getById($id);
        if (!$data["tanggapan"]) show_404();
        
        $this->load->view("templates/tanggapan_edit", $data);
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tampil($id = null)
    {
        if(($this->session->userdata('akses')=='3')){
        $bantuan = $this->m_bantuan;
        $data["tanggapan"] = $surat->getById($id);
        if (!$data["tanggapan"]) show_404();
        
        $this->load->view("templates/tanggapan_tampil", $data);
        }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }
}