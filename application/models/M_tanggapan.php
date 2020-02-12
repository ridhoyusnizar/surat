<?php
class m_tanggapan extends CI_Model{
	private $_table = "tanggapan";
  public $id_tanggapan;
	public $pesan;
  public $dari;
    public $kepada;

  public function rules()
    {
        return [
            ['field' => 'pesan',
            'label' => 'Pesan',
            'rules' => 'required'],

            ['field' => 'dari',
            'label' => 'Dari',
            'rules' => 'required'],

            ['field' => 'kepada',
            'label' => 'Kepada',
            'rules' => 'required']
        ];
    }

    	 public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

        public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tanggapan" => $id])->row();
    }


        public function getSaya() {
     $this->db->select ('*');
     $this->db->from('tanggapan');
    $this->db->join("user", "tanggapan.kepada = user.nama");
    $this->db->join("bantuan", "tanggapan.id_bantuan = bantuan.id_bantuan");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $query = $this->db->get();
     return $query->result();
    }

        public function getDariSaya() {
    $this->db->select ('*');
     $this->db->from('tanggapan');
    $this->db->join("user", "tanggapan.dari = user.nama");
    $this->db->join("bantuan", "tanggapan.id_bantuan = bantuan.id_bantuan");
    $this->db->where('user.nama', $this->session->userdata('ses_nama'));
    $query = $this->db->get();
     return $query->result();
    }

        public function save(){
        $post = $this->input->post();
        $this->pesan = $post["pesan"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->db->insert($this->_table, $this);
    }

     public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_tanggapan" => $id));
    }

         public function update()
    {
        $post = $this->input->post();
        $this->id_tanggapan = ["id"];
        $this->pesan = $post["pesan"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->db->update($this->_table, $this, array('id_tanggapan' => $post['id_tanggapan']));
    }

}