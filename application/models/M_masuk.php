<?php
class m_masuk extends CI_Model
{
    private $_table = "surat_masuk";
    public $id_surat_masuk;
    public $tanggal_agenda;
    public $waktu_agenda;
    public $no_agenda;
    public $tanggal_surat;
    public $no_surat;
    public $asal_surat;
    public $sifat_surat;
    public $sifat_surat_detail;
    public $kelompok;
    public $alamat;
    public $perihal;
    public $gambar = "default.jpg";
    public $status;
    public $catatan_masuk;


    public function rules()
    {
        return [
            [
                'field' => 'tanggal_agenda',
                'label' => 'Tanggal agenda',
                'rules' => 'required'
            ],

            [
                'field' => 'waktu_agenda',
                'label' => 'Waktu agenda',
                'rules' => 'required'
            ],

            [
                'field' => 'no_agenda',
                'label' => 'No Agenda',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal_surat',
                'label' => 'Tanggal agenda',
                'rules' => 'required'
            ],

            [
                'field' => 'no_surat',
                'label' => 'No Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'asal_surat',
                'label' => 'Asal Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'sifat_surat',
                'label' => 'Sifat Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'sifat_surat_detail',
                'label' => 'Sifat Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'kelompok',
                'label' => 'Kelompok',
                'rules' => 'required'
            ],

            [
                'field' => 'perihal',
                'label' => 'Isi Surat',
                'rules' => 'required'
            ]
        ];
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->order_by('id_surat_masuk', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->order_by('no_surat', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_surat_masuk" => $id])->row();
    }

    public function search($keyword)
    {
        $this->db->like('tanggal_agenda', $keyword);
        $this->db->or_like('waktu_agenda', $keyword);
        $this->db->or_like('no_agenda', $keyword);
        $this->db->or_like('no_surat', $keyword);
        $this->db->or_like('asal_surat', $keyword);
        $this->db->or_like('sifat_surat', $keyword);
        $this->db->or_like('sifat_surat_detail', $keyword);
        $this->db->or_like('kelompok', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('perihal', $keyword);
        $this->db->or_like('status', $keyword);
        $this->db->or_like('catatan_masuk', $keyword);

        $result = $this->db->get($this->_table)->result(); // Tampilkan data siswa berdasarkan keyword

        return $result;
    }

    function add($_table, $data)
    {
        return $this->db->insert($_table, $data);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tanggal_agenda = $post["tanggal_agenda"];
        $this->tanggal_agenda = date('Y-m-d', strtotime($this->tanggal_agenda));
        $this->waktu_agenda = $post["waktu_agenda"];
        $this->no_agenda = $post["no_agenda"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->tanggal_surat = date('Y-m-d', strtotime($this->tanggal_surat));
        $this->no_surat = $post["no_surat"];
        $this->asal_surat = $post["asal_surat"];
        $this->sifat_surat = $post["sifat_surat"];
        $this->sifat_surat_detail = $post["sifat_surat_detail"];
        $this->kelompok = $post["kelompok"];
        $this->alamat = $post["alamat"];
        $this->perihal = $post["perihal"];
        $this->gambar = $this->_uploadImage();
        $this->status = $post["status"];
        $this->catatan_masuk = $post["catatan_masuk"];
        $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_surat_masuk" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_surat_masuk = ["id"];
        $this->tanggal_agenda = $post["tanggal_agenda"];
        $this->tanggal_agenda = date('Y-m-d', strtotime($this->tanggal_agenda));
        $this->waktu_agenda = $post["waktu_agenda"];
        $this->no_agenda = $post["no_agenda"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->tanggal_surat = date('Y-m-d', strtotime($this->tanggal_surat));
        $this->no_surat = $post["no_surat"];
        $this->asal_surat = $post["asal_surat"];
        $this->sifat_surat = $post["sifat_surat"];
        $this->sifat_surat_detail = $post["sifat_surat_detail"];
        $this->kelompok = $post["kelompok"];
        $this->alamat = $post["alamat"];
        $this->perihal = $post["perihal"];
        $this->status = $post["status"];
        $this->catatan_masuk = $post["catatan_masuk"];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_surat_masuk' => $post['id']));
    }

    public function updatedisposisi()
    {
        $post = $this->input->post();
        $this->no_agenda = $post["no_agenda"];
        $this->catatan_ketua = $post["catatan_ketua"];
        $this->catatan = $post["catatan"];
        $this->db->insert($this->_table, $this);
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './upload/suratmasuk/gambar/';
        $config['allowed_types']        = 'jpg|png|pdf';
        $config['file_name']            = $this->no_surat;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        } else if ($this->upload->do_upload('pdf')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $surat = $this->getById($id);
        if ($surat->gambar != "default.jpg") {
            $filename = explode(".", $surat->gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/suratmasuk/gambar/$filename.*"));
        }
    }

    function kode_()
    {
        $this->db->select('no_agenda');
        $this->db->order_by('no_agenda', 'DESC');
        $query = $this->db->get('surat_masuk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_agenda) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, STR_PAD_LEFT);
        $kodejadi  = $kodemax;
        return $kodejadi;
    }

    function kode()
    {
        $cek = $this->db->query('SELECT id_surat_masuk FROM surat_masuk ORDER BY id_surat_masuk DESC LIMIT 1');
        $ex = explode('/', $cek[no_surat]);

        if (date('d') == '01') {
            $a = '01';
        } else {
            $a = $ex[0] + 1;
        }

        $c = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $d = date('Y');
        $no_surat = $a . '/' . $b . '/' . $c[date('n')] . '/' . $d;
        echo $no_surat;
    }
}
