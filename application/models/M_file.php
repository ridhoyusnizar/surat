<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_file extends CI_Model{
    function __construct() {
        $this->tableName = 'files_masuk';
    }
    
    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('id,file_name,uploaded_on');
        $this->db->from('files_masuk');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insert($data = array()){
        $insert = $this->db->insert_batch('files_masuk',$data);
        return $insert?true:false;
    }
    
}