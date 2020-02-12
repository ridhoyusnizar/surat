<?php
class Login_model extends CI_Model
{
    //cek nip dan password dosen
    private $_tableuser = "user";


    public function getAlluser()
    {
        return $this->db->get($this->_tableuser)->result();
    }



    // function getuser($where)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where($where);
    //     $data = $this->db->get();
    //     return $data;
    // }

    public function getById($nip)
    {
        return $this->db->get_where($this->_tableuser, ["nip" => $nip])->row();
    }

    function getNama()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    function getNama2()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', '2');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    //cek nim dan password mahasiswa
    function auth_user($username, $password)
    {
        $query = $this->db->query("SELECT * FROM user WHERE nip='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }

    function auth_kode($username, $password)
    {
        $query = $this->db->query("SELECT * FROM user WHERE nip='$username' AND kode=MD5('$password') LIMIT 1");
        return $query;
    }

    // public function disposisiSaya($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->join('surat_masuk', 'surat_masuk.kepada = user.nama', 'left');
    //     $this->db->join('disposisi', 'disposisi.no_agenda = surat_masuk.no_agenda', 'left');
    //     // $this->db->where('user.nip',$nip);
    //     $this->db->where('nip', $this->session->userdata('nip'));
    //     $this->db->order_by('surat_masuk.no_agenda', 'asc');
    //     $query = $this->db->get();
    //     if ($query->num_rows() != 0) {
    //         return $query->result_array();
    //     } else {
    //         return false;
    //     }
    // }


    public function save()
    {
        $pass = md5($this->input->post('new'));
        $data = array(
            'pass' => $pass
        );
        $this->db->where('nip', $this->session->userdata('ses_id'));
        $this->db->update('user', $data);
    }
    public function cek_old()
    {
        $old = md5($this->input->post('old'));
        $this->db->where('pass', $old);
        $query = $this->db->get('user');
        return $query->result();;
    }
}
