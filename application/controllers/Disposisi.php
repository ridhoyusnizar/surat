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
  }

  public function rekap()
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
      $disposisi = $this->m_disposisi;
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data['disposisi'] = $this->m_disposisi->getDisposisi();
      $surat = $this->m_masuk;
      $data['surat'] = $this->m_masuk->getAll();
      $data['user'] = $this->login_model->getAlluser();
      $this->load->view('templates/surat_masuk_disposisi', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function rekapSaya()
  {
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
      $data["surat"] = $this->m_disposisi->duatable();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      return $this->load->view("templates/surat_masuk_disposisi_user", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function adminBelum()
  {
    if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') {
      $data["surat"] = $this->m_disposisi->getAdminBelum();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      return $this->load->view("templates/surat_masuk_disposisi_belum_admin", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function adminSelesai()
  {
    if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') {
      $data["surat"] = $this->m_disposisi->getAdminSelesai();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      return $this->load->view("templates/surat_masuk_disposisi_selesai_admin", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function disposisiBelum()
  {
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') {
      $data["surat"] = $this->m_disposisi->getDisposisiBelum();
      $data["adminsurat"] = $this->m_dashboard->getDisposisiBelumAdmin();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      return $this->load->view("templates/surat_masuk_disposisi_belum", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function disposisiTerbaca()
  {
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') {
      $data["surat"] = $this->m_disposisi->getDisposisiSudah();
      $data["adminsurat"] = $this->m_dashboard->getDisposisiSudahAdmin();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      return $this->load->view("templates/surat_masuk_disposisi_terbaca", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }


  public function rekapDariSaya()
  {
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["disposisi"] = $this->m_disposisi->getDisposisiSaya();
      return $this->load->view("templates/surat_masuk_disposisi_saya", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function rekapDetail($id = null)
  {
    if ($this->session->userdata('akses') == '3') {
      $disposisi = $this->m_disposisi;
      $data['disposisi'] = $this->m_disposisi->getByAll($id);
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $user = $this->login_model;
      $data['user'] = $this->login_model->getAlluser();
      $this->load->view('templates/surat_masuk_disposisi_detail', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function notifikasi($limit, $offset, $order_by)
  {
    $query = $this->m_disposisi->getNotifikasi($limit, $offset, $order_by);
    return $query;
  }

  public function search()
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      $keyword = $this->input->post('keyword');
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data['disposisi'] = $this->m_masuk->search($keyword);
      $this->load->view('templates/surat_masuk_disposisi_search_view', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function searchDetail()
  {
    if ($this->session->userdata('akses') == '3') {
      $keyword = $this->input->post('keyword');
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data['disposisi'] = $this->m_disposisi->search($keyword);
      $this->load->view('templates/surat_masuk_disposisi_search_view', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function disposisi()
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
      $disposisi = $this->m_disposisi;
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data['disposisi'] = $this->m_disposisi->getDisposisi();
      $surat = $this->m_masuk;
      $data['surat'] = $this->m_masuk->getAll();
      $data['user'] = $this->login_model->getAlluser();
      $this->load->view('templates/surat_masuk_disposisi', $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function tampil($id = null, $id_surat_masuk = null)
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      $surat = $this->m_masuk;
      $data["surat"] = $surat->getById($id);
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $disposisi = $this->m_disposisi;
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

  public function tampilSaya($id = null)
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      $surat = $this->m_disposisi;
      $data["surat"] = $surat->getById($id);
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["surat_masuk"] = $this->m_disposisi->getIdAll();
      if (!$data["surat"]) show_404();
      $this->load->view("templates/surat_masuk_disposisi_user", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function kendali($id = null)
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      $surat = $this->m_disposisi;
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["surat"] = $surat->getById($id);
      $this->load->view("templates/surat_masuk_kendali");
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function savedAdmin()
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3') {
      $tanggal = $this->input->post('tanggal');
      $no_agenda = $this->input->post('no_agenda');
      $catatan_ketua = $this->input->post('catatan_ketua');
      $catatan = $this->input->post('catatan');
      $dari = $this->input->post('dari');
      $kepada = $this->input->post('kepada');
      $status_terbaca = $this->input->post('status_terbaca');

      $r = array(
        'id_disposisi' => '',
        'tanggal' => $tanggal,
        'no_agenda' => $no_agenda,
        'catatan_ketua' => $catatan_ketua,
        'catatan' => $catatan,
        'dari' => $dari,
        'kepada' => $kepada,
        'status_terbaca' => $status_terbaca
      );
      $this->m_disposisi->addDisposisi('disposisi', $r);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
      redirect(site_url('disposisi/rekap'));
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function savedUser()
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
      $tanggal = $this->input->post('tanggal');
      $no_agenda = $this->input->post('no_agenda');
      $catatan_ketua = $this->input->post('catatan_ketua');
      $catatan = $this->input->post('catatan');
      $dari = $this->input->post('dari');
      $kepada = $this->input->post('kepada');

      $r = array(
        'id_disposisi' => '',
        'tanggal' => $tanggal,
        'no_agenda' => $no_agenda,
        'catatan_ketua' => $catatan_ketua,
        'catatan' => $catatan,
        'dari' => $dari,
        'kepada' => $kepada
      );
      $this->m_disposisi->addDisposisi('disposisi', $r);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
      redirect(site_url('disposisi/rekapSaya'));
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function multi($id = null)
  {
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      $surat = $this->m_masuk;
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data["surat"] = $surat->getById($id);
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
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '1') {

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

  public function saveKetua()
  {
    if ($this->session->userdata('ses_nama') == 'Ketua Umum') {
      $tanggal = $_POST['tanggal'];
      $no_agenda = $_POST['no_agenda'];
      $catatan_ketua = $_POST['catatan_ketua'];
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
          'catatan_ketua' => $catatan_ketua[$index],
          'dari' => $dari[$index],
          'kepada' => $kepada[$index],
          'status_terbaca' => $status_terbaca[$index]
        ));

        $index++;
      }

      $sql = $this->m_disposisi->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)

      // Cek apakah query insert nya sukses atau gagal
      redirect(site_url('disposisi/rekapDariSaya'));
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  public function deleteUser($id = null)
  {
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
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
    if ($this->session->userdata('akses') == '4' ||  $this->session->userdata('akses') == '3') {
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
    if ($this->session->userdata('akses') == '4' || $this->session->userdata('akses') == '3' ||                 $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '1') {

      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
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

  function editKetua($id = null)
  {
    if ($this->session->userdata('ses_nama') == 'Ketua Umum') {
      if (!isset($id)) redirect('suratmasuk/rekap');
      $data["notif"] = $this->m_disposisi->getNotifikasi();
      $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
      $data['user'] = $this->login_model->getNama();
      $data['user2'] = $this->login_model->getNama2();
      $disposisi = $this->m_disposisi;
      $validation = $this->form_validation;
      $validation->set_rules($disposisi->rules());

      if ($validation->run()) {
        $disposisi->updateKetua();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
      }
      $data['user'] = $this->login_model->getNama();
      $data["disposisi"] = $disposisi->getById($id);
      if (!$data["disposisi"]) show_404();

      $this->load->view("templates/surat_masuk_kendali_edit_ketua", $data);
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  function actionEditStatus($id)
  {
    if ($this->session->userdata('akses') == '2') {
      $status_terbaca = '1';

      $r = array(
        'id_disposisi' => $id,
        'status_terbaca' => $status,
      );
      $this->m_disposisi->updateTerbaca($id, $r);
      redirect(base_url('disposisi/rekapSaya'));
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
}
