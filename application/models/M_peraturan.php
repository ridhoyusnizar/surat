<?php
class m_peraturan extends CI_Model
{
    private $_table = "surat_peraturan";
    public $id_sp;
    public $tanggal;
    public $no_surat_no;
    public $no_surat_noplus;
    public $no_surat_tahun;
    public $isi_surat;
    public $gambar = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'tanggal',
                'label' => 'Tanggal Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'no_surat_no',
                'label' => 'No Surat',
                'rules' => 'numeric'
            ],

            [
                'field' => 'no_surat_tahun',
                'label' => 'No Surat',
                'rules' => 'numeric'
            ],

            [
                'field' => 'isi_surat',
                'label' => 'Isi Surat',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('surat_peraturan');
        $this->db->order_by('no_surat_no', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_sp" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tanggal = $post["tanggal"];
        $this->tanggal = date('Y-m-d', strtotime($this->tanggal));
        $this->no_surat_no = $post["no_surat_no"];
        $this->no_surat_noplus = $post["no_surat_noplus"];
        $this->no_surat_tahun = $post["no_surat_tahun"];
        $this->isi_surat = $post["isi_surat"];
        $this->gambar = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_sp" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_sp = ["id"];
        $this->tanggal = $post["tanggal"];
        $this->tanggal = date('Y-m-d', strtotime($this->tanggal));
        $this->no_surat_no = $post["no_surat_no"];
        $this->no_surat_noplus = $post["no_surat_noplus"];
        $this->no_surat_tahun = $post["no_surat_tahun"];
        $this->isi_surat = $post["isi_surat"];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_sp' => $post['id_sp']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/suratPeraturan/';
        $config['allowed_types']        = 'jpg|png|pdf';
        $config['file_name']            = $this->no_surat_no;
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
            return array_map('unlink', glob(FCPATH . "upload/suratPeraturan/$filename.*"));
        }
    }

    function kode_()
    {
        $this->db->select('no_surat_no');
        $this->db->order_by('no_surat_no', 'DESC');
        $query = $this->db->get('surat_peraturan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_surat_no) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, STR_PAD_LEFT);
        $kodejadi  = $kodemax;
        return $kodejadi;
    }

    function kode()
    {
        $cek = $this->db->query('SELECT id_sp FROM surat_peraturan ORDER BY id_sp DESC LIMIT 1');
        $ex = explode('/', $cek[no_surat]);

        if (date('d') == '01') {
            $a = '01 v';
        } else {
            $a = $ex[0] + 1;
        }

        $c = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $d = date('Y');
        $no_surat = $a . '/' . $b . '/' . $c[date('n')] . '/' . $d;
        echo $no_surat;
    }
}
