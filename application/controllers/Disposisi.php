<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_disposisi', '', TRUE);
    $this->load->model('m_masuk');
    $this->load->model('login_model');
    $this->load->model('m_dashboard');
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

  public function rekap()
  {
    if ($this->edit_del_upl_add) {
      $data['disposisi'] = $this->m_disposisi->getDisposisi();
      $data['surat'] = $this->m_masuk->getAll();
      $this->load->view('templates/surat_masuk_disposisi', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function rekapSaya()
  {
    if ($this->user_biasa) {
      $data["surat"] = $this->m_disposisi->duatable();
      return $this->load->view("templates/surat_masuk_disposisi_user", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function adminBelum()
  {
    if ($this->edit_del_upl_add) {
      $data["surat"] = $this->m_disposisi->getAdminBelum();
      return $this->load->view("templates/surat_masuk_disposisi_belum_admin", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function adminSelesai()
  {
    if ($this->edit_del_upl_add) {
      $data["surat"] = $this->m_disposisi->getAdminSelesai();
      return $this->load->view("templates/surat_masuk_disposisi_selesai_admin", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function disposisiBelum()
  {
    if ($this->all_akses) {
      $data["surat"] = $this->m_disposisi->getDisposisiBelum();
      $data["adminsurat"] = $this->m_dashboard->getDisposisiBelumAdmin();
      return $this->load->view("templates/surat_masuk_disposisi_belum", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function disposisiTerbaca()
  {
    if ($this->all_akses) {
      $data["surat"] = $this->m_disposisi->getDisposisiSudah();
      $data["adminsurat"] = $this->m_dashboard->getDisposisiSudahAdmin();
      return $this->load->view("templates/surat_masuk_disposisi_terbaca", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }


  public function rekapDariSaya()
  {
    if ($this->all_akses) {
      $data["disposisi"] = $this->m_disposisi->getDisposisiSaya();
      return $this->load->view("templates/surat_masuk_disposisi_saya", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function rekapDetail($id = null)
  {
    if ($this->session->userdata('akses') == '3') {
      $data['disposisi'] = $this->m_disposisi->getByAll($id);
      $this->load->view('templates/surat_masuk_disposisi_detail', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function tampil($id = null, $id_surat_masuk = null)
  {
    if ($this->all_akses) {
      $data["surat"] = $this->m_masuk->getById($id);
      $data["disposisi"] = $this->m_disposisi->getTampil($id);

      // TERBACA
      $status_terbaca = '1';

      $r = array(
        'status_terbaca' => $status_terbaca,
      );
      $a = $this->m_disposisi->updateTerbaca($id_surat_masuk, $r);

      $this->load->view("templates/surat_masuk_disposisi_tampil", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function multi($id = null)
  {
    if ($this->all_akses) {
      $data["surat"] = $this->m_masuk->getById($id);
      $data['user'] = $this->login_model->getNama();
      $data['user2'] = $this->login_model->getNama2();
      if (!$data["surat"]) show_404();
      $this->load->view("templates/multi", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function saveUser()
  {
    if ($this->all_akses) {

      $tanggal = $_POST['tanggal'];
      $no_agenda = $_POST['no_agenda'];
      $catatan = $_POST['catatan'];
      $dari = $_POST['dari'];
      $kepada = $_POST['kepada'];
      $status_terbaca = $_POST['status_terbaca'];
      $data = array();

      $index = 0;
      foreach ($no_agenda as $dataagenda) {
        array_push($data, array(
          'id_disposisi' => '',
          'tanggal' => $tanggal[$index],
          'no_agenda' => $dataagenda,
          'catatan' => $catatan[$index],
          'dari' => $dari[$index],
          'kepada' => $kepada[$index],
          'status_terbaca' => $status_terbaca[$index]
        ));

        $index++;
      }

      $sql = $this->m_disposisi->save_batch($data);

      redirect(site_url('disposisi/rekapDariSaya'));
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function deleteUser($id = null)
  {
    if ($this->user_biasa) {
      if (!isset($id)) show_404();

      if ($this->m_disposisi->delete($id)) {
        redirect(site_url('disposisi/rekapDariSaya'));
      }
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function deleteAdmin($id = null)
  {
    if ($this->edit_del_upl_add) {
      if (!isset($id)) show_404();

      if ($this->m_disposisi->delete($id)) {
        redirect(site_url('disposisi/rekapDariSaya'));
      }
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  function editUser($id = null)
  {
    if ($this->all_akses) {
      $data['user'] = $this->login_model->getNama();
      $data['user2'] = $this->login_model->getNama2();


      $disposisi = $this->m_disposisi;
      $validation = $this->form_validation;
      $validation->set_rules($disposisi->rules());

      if ($validation->run()) {
        $disposisi->updateStaff();
        if (!isset($id)) redirect('Disposisi/rekapDariSaya');
        $this->session->set_flashdata('success', 'Berhasil disimpan');
      }

      $data["disposisi"] = $disposisi->getById($id);
      if (!$data["disposisi"]) show_404();

      $this->load->view("templates/surat_masuk_kendali_edit_user", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
}
