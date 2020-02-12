<?php
class m_user extends CI_Model{
	private $_table = "user";
	public $nip;
	public $nama;
	public $gel_dpn;
	public $nama_lengkap;
	public $gel_blkng;
    public $pass;
	public $level;
	public $kode;

    public function rules()
    {
        return [
        	['field' => 'nip',
            'label' => 'Username',
            'rules' => 'required'],

        	['field' => 'nama',
            'label' => 'Jabatan',
            'rules' => 'required'],

            ['field' => 'nama_lengkap',
            'label' => 'Nama Lengkap',
            'rules' => 'required'],

            ['field' => 'pass',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'level',
            'label' => 'Level',
            'rules' => 'numeric'],

            ['field' => 'kode',
            'label' => 'Password 2',
            'rules' => 'required'],
        ];
    }

     public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save(){
		$post = $this->input->post();
		$this->nip = $post["nip"];
		$this->nama = $post["nama"];
		$this->gel_dpn = $post["gel_dpn"];
		$this->nama_lengkap = $post["nama_lengkap"];
        $this->gel_blkng = $post["gel_blkng"];
		$this->pass = md5($post["pass"]);
		$this->level = $post["level"];
		$this->kode = md5($post["kode"]);
		$this->db->insert($this->_table, $this);
	}

	 public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    	 public function update()
    {
        $post = $this->input->post();
        $this->id = ["id"];
		$this->nip = $post["nip"];
		$this->nama = $post["nama"];
		$this->gel_dpn = $post["gel_dpn"];
		$this->nama_lengkap = $post["nama_lengkap"];
        $this->gel_blkng = $post["gel_blkng"];
		$this->pass = md5($post["pass"]);
		$this->level = $post["level"];
		$this->kode = md5($post["kode"]);
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }
}