<?php

class M_data extends CI_Model{
	private $_table = "surat_masuk";
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where)->num_rows();
	}

	function tampil_data_surat_masuk(){
		return $this->db->get($this->_table)->result();
	}

	function input_data_surat_masuk($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data_surat_masuk($id_surat_masuk)
	{
		$hasil=$this->db->query("SELECT * FROM surat_masuk WHERE id_surat_masuk='$id_surat_masuk'");
		return $hasil->result();
	}

	function update_surat_masuk($id_surat_masuk, $data){
		$this->db->where('id_surat_masuk', $id_surat_masuk);
		return $this->db->update('surat_masuk', $data);
	}

		function delete_surat_masuk($id_surat_masuk){
		$this->db->where('id_surat_masuk', $id_surat_masuk);
		return $this->db->delete('surat_masuk');
	}

		function tampil_data_surat_keluar(){
		$hasil=$this->db->query("SELECT * FROM surat_keluar");
		return $hasil->result();
	}

		function input_data_surat_keluar($data,$table){
		$this->db->insert($table,$data);
	}

		function delete_surat_keluar($id_surat_keluar){
		$this->db->where('id_surat_keluar', $id_surat_keluar);
		return $this->db->delete('surat_keluar');
	}

		function update_surat_keluar($id_surat_keluar, $data){
			$this->db->where('id_surat_keluar', $id_surat_keluar);
			return $this->db->update("surat_keluar", $data);
		}

		public function update(){
		$post = $this->input->post();
		$this->id_surat_masuk = $post["id_surat_masuk"];
		$this->tanggal_agenda = $post["tanggal_agenda"];

		$this->waktu_agenda = $post["id_surat_masuk"];
		$this->no_agenda_no= $post["id_surat_masuk"];
		$this->no_agenda_kode = $post["id_surat_masuk"];
		$this->no_surat_romawi = $post["id_surat_masuk"];
		$this->no_agenda_tahun = $post["id_surat_masuk"];
		$this->tanggal_surat = $post["id_surat_masuk"];

		$this->no_surat_no = $post["id_surat_masuk"];
		$this->no_agenda_kode = $post["id_surat_masuk"];
		$this->no_surat_romawi = $post["id_surat_masuk"];
		$this->no_agenda_tahun = $post["id_surat_masuk"];
		$this->asal_surat = $post["id_surat_masuk"];
		$this->sifat_surat = $post["id_surat_masuk"];
		$this->sifat_surat_detail = $post["id_surat_masuk"];
		$this->lokasi = $post["id_surat_masuk"];
		$this->perihal = $post["id_surat_masuk"];
		$this->gambar = $post["id_surat_masuk"];
		$this->db->update($this->_table, $this, array('id_surat_masuk' => $post['id_surat_masuk']));
	}

		
}