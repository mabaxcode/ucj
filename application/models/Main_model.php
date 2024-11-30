<?php
class Main_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users_table  = 'users';
    }

    function check_email($where)
	{
		$this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get($this->users_table);

        // return $this->db->last_query();

        if($query->num_rows() > 0){
        	$response = array('status' => true); 
        } else {
        	$response = array('status' => false);
        }

        return $response;

	}

    function insert_users_table($table, $data)
    {   
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    function check_user_login($data)
    {
        $this->db->select('*');
        $this->db->where(array(
            'email'      => $data['email'], 
            'password'   => md5($data['password']),
        ));
        $query = $this->db->get($this->users_table);

        if($query->num_rows() > 0){ return $query->row_array(); } else { return false; }
    }
}
