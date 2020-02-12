<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('m_disposisi', '', TRUE);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function loginKode()
	{
		$this->load->view('admin/login_kode');
	}

	function auth()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$cek_user = $this->login_model->auth_user($username, $password);
		if ($cek_user->num_rows() > 0) { //jika login sebagai user
			$data = $cek_user->row_array();
			$this->session->set_userdata('masuk', TRUE);/*
		         if($data['level']=='1'){ //Akses ketua
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_nama_lengkap',$data['nama_lengkap']);
		            redirect('dashboard/dashboard');

		         }else if($data['level']=='3'){ //akses admin
		            $this->session->set_userdata('akses','3');
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_nama_lengkap',$data['nama_lengkap']);
		            redirect('dashboard/dashboard');
		        }
		        else if($data['level']=='4'){ //akses admin
		            $this->session->set_userdata('akses','4');
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_nama_lengkap',$data['nama_lengkap']);
		            redirect('dashboard/dashboard');
		        }
		         else{ //akses sekretaris
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_nama_lengkap',$data['nama_lengkap']);
		            redirect('dashboard/dashboard');
				 }*/
			$this->session->set_userdata('akses', $data['level']);
			$this->session->set_userdata('ses_id', $data['nip']);
			$this->session->set_userdata('ses_nama', $data['nama']);
			$this->session->set_userdata('ses_nama_lengkap', $data['nama_lengkap']);
			redirect('dashboard/dashboard');
		} else { //jika login sebagai admin
			$url = base_url();
			echo $this->session->set_flashdata('msg', 'Username atau Password Salah');
			redirect($url);
		}
	}

	function authKode()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$cek_user = $this->Login_model->auth_kode($username, $password);
		if ($cek_user->num_rows() > 0) { //jika login sebagai user
			$data = $cek_user->row_array();
			$this->session->set_userdata('masuk', TRUE);
			if ($data['level'] == '1') { //Akses ketua
				$this->session->set_userdata('akses', '1');
				$this->session->set_userdata('ses_id', $data['nip']);
				$this->session->set_userdata('ses_nama', $data['nama']);
				$this->session->set_userdata('ses_nama_dpn', $data['gel_dpn']);
				$this->session->set_userdata('ses_nama_lengkap', $data['nama_lengkap']);
				$this->session->set_userdata('ses_nama_blkng', $data['gel_blkng']);
				redirect('disposisi/rekapSaya');
			} else if ($data['level'] == '3') { //akses admin
				$this->session->set_userdata('akses', '3');
				$this->session->set_userdata('ses_id', $data['nip']);
				$this->session->set_userdata('ses_nama', $data['nama']);
				$this->session->set_userdata('ses_nama_dpn', $data['gel_dpn']);
				$this->session->set_userdata('ses_nama_lengkap', $data['nama_lengkap']);
				$this->session->set_userdata('ses_nama_blkng', $data['gel_blkng']);
				redirect('suratmasuk/rekap');
			} else if ($data['level'] == '4') { //akses admin
				$this->session->set_userdata('akses', '3');
				$this->session->set_userdata('ses_id', $data['nip']);
				$this->session->set_userdata('ses_nama', $data['nama']);
				$this->session->set_userdata('ses_nama_dpn', $data['gel_dpn']);
				$this->session->set_userdata('ses_nama_lengkap', $data['nama_lengkap']);
				$this->session->set_userdata('ses_nama_blkng', $data['gel_blkng']);
				redirect('suratmasuk/rekap');
			} else { //akses sekretaris
				$this->session->set_userdata('akses', '2');
				$this->session->set_userdata('ses_id', $data['nip']);
				$this->session->set_userdata('ses_nama', $data['nama']);
				$this->session->set_userdata('ses_nama_dpn', $data['gel_dpn']);
				$this->session->set_userdata('ses_nama_lengkap', $data['nama_lengkap']);
				$this->session->set_userdata('ses_nama_blkng', $data['gel_blkng']);
				redirect('disposisi/rekapSaya');
			}
		} else { //jika login sebagai admin

			echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
			redirect('login/loginKode');
		}
	}


	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url() . 'login');
	}

	public function save_password()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
			$data["notif"] = $this->m_disposisi->getNotifikasi();
			$data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
			$this->form_validation->set_rules('new', 'New', 'required|alpha_numeric');
			$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/profil', $data);
			} else {
				$cek_old = $this->login_model->cek_old();
				if ($cek_old == False) {
					$this->session->set_flashdata('error', 'Password Lama Salah!');
					$this->load->view('admin/profil', $data);
				} else {
					$this->login_model->save();
					$this->session->sess_destroy();
					$this->session->set_flashdata('error', 'Password berhasil diganti, silahkan login kembali');
					$this->load->view('admin/login');
				} //end if valid_user
			}
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}
}
