<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id_surat_masuk', 'DESC');
		$query = $this->db->get('surat_masuk');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('surat_masuk', $data);
	}
}
