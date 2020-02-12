<?php
class m_disposisi extends CI_Model
{
  private $_table = "disposisi";
  public $id;
  public $no_agenda;
  public $tanggal;
  public $catatan_ketua;
  public $catatan;
  public $dari;
  public $kepada;

  public function rules()
  {
    return [
      [
        'field' => 'no_agenda',
        'label' => 'No Agenda',
        'rules' => 'required'
      ],

      [
        'field' => 'tanggal',
        'label' => 'Tanggal',
        'rules' => 'required'
      ],

      [
        'field' => 'dari',
        'label' => 'Dari',
        'rules' => 'required'
      ],

      [
        'field' => 'kepada',
        'label' => 'Kepada',
        'rules' => 'required'
      ]
    ];
  }

  public function getById($id)
  {
    return $this->db->get_where($this->_table, ["id_disposisi" => $id])->row();
  }

  function updateTerbaca($id, $data)
  {
    $this->db->where('id_disposisi', $id);
    return $this->db->update("disposisi", $data);
  }

  public function getByAll($id)
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('surat_masuk.id_surat_masuk', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function getTampil($id)
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('surat_masuk.id_surat_masuk', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function updateStaff()
  {
    $post = $this->input->post();
    $this->id = ["id_disposisi"];
    $this->no_agenda = $post["no_agenda"];
    $this->tanggal = $post["tanggal"];
    $this->catatan = $post["catatan"];
    $this->catatan_ketua = $post["catatan_ketua"];
    $this->dari = $post["dari"];
    $this->kepada = $post["kepada"];
    $this->db->update($this->_table, $this, array('id_disposisi' => $post['id']));
  }

  public function duatable()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $query = $this->db->get();
    return $query->result();
  }

  public function getNotifikasi()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $this->db->limit(4);
    $this->db->order_by('id_disposisi', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function jumlahNotifikasi()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $this->db->where('disposisi.status_terbaca', '0');
    $this->db->order_by('id_disposisi', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  public function getAdminBelum()
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->where('status', 'Belum');
    $this->db->order_by('id_surat_masuk', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function getAdminSelesai()
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->where('status', 'Selesai');
    $this->db->order_by('id_surat_masuk', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function getDisposisiBelum()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $this->db->where('disposisi.status_terbaca', '0');
    $this->db->order_by('id_disposisi', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function getDisposisiSudah()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $this->db->where('disposisi.status_terbaca', '1');
    $this->db->order_by('id_disposisi', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function semuaNotifikasi()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $this->db->order_by('id_disposisi', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  public function jumlahTerbaca()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.kepada = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $this->db->where('disposisi.status_terbaca', '1');
    $this->db->limit(4);
    $this->db->order_by('id_disposisi', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  public function jumlahBelum()
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->where('status', 'Belum');
    $this->db->order_by('id_surat_masuk', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function jumlahSelesai()
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->where('status', 'Selesai');
    $this->db->order_by('id_surat_masuk', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function getDisposisiSaya()
  {
    $this->db->select('*');
    $this->db->from('disposisi');
    $this->db->join("user", "disposisi.dari = user.nama");
    $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $query = $this->db->get();
    return $query->result();
  }

  public function getDisposisi()
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->join("disposisi", "surat_masuk.no_agenda = disposisi.no_agenda");
    $query = $this->db->get();
    return $query->result();
  }

  public function save_batch($data)
  {
    return $this->db->insert_batch('disposisi', $data);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_disposisi" => $id));
  }
}
