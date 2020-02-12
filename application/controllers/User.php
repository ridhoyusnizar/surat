<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
		public function __construct(){
        parent::__construct();
        $this->load->model('m_user');
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
	      		$data['user'] = $this->m_user->getAll();
                $data["notif"] = $this->m_disposisi->getNotifikasi();
                $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
				$this->load->view('templates/user_rekap', $data);
	    }else{
	      echo "Anda tidak berhak mengakses halaman ini";
	    }

	}

	public function add()
    {
        if($this->session->userdata('akses')=='3'){
        $data['user'] = $this->m_user->getAll();
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $user = $this->m_user;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('templates/user_entry', $data);
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }


	    public function delete($id=null)
    {
        if($this->session->userdata('akses')=='3'){
        if (!isset($id)) show_404();
        
        if ($this->m_user->delete($id)) {
            redirect(site_url('user/rekap'));
        }
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function edit($id = null)
    {
        if($this->session->userdata('akses')=='3'){
        if (!isset($id)) redirect('user/rekap');
        $data["notif"] = $this->m_disposisi->getNotifikasi();
        $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
        $user = $this->m_user;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("templates/user_edit", $data);
         }else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }
}