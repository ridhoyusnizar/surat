<?php
class m_bantuan extends CI_Model{
    private $_table = "bantuan";
    public $id_tanggapan;
    public $subjek;
    public $pesan;
    public $dari;
    public $kepada;

  public function rules()
    {
        return [
            ['field' => 'subjek',
            'label' => 'Subjek',
            'rules' => 'required'],

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
        return $this->db->get_where($this->_table, ["id_bantuan" => $id])->row();
    }

        public function save(){
        $post = $this->input->post();
        $this->id_tanggapan = $post["id_tanggapan"];
        $this->subjek = $post["subjek"];
        $this->pesan = $post["pesan"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->db->insert($this->_table, $this);
    }

     public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_bantuan" => $id));
    }

         public function update()
    {
        $post = $this->input->post();
        $this->id_bantuan = ["id"];
        $this->id_tanggapan = $post["id_tanggapan"];
        $this->subjek = $post["subjek"];
        $this->pesan = $post["pesan"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->db->update($this->_table, $this, array('id_bantuan' => $post['id_bantuan']));
    }

}