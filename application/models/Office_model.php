<?php
class Office_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function get_chat_user()
    {
        $this->db->select('*');
        $this->db->where('user_type', '1');
        $this->db->group_by('user_id');
        $this->db->order_by('created_at', 'desc');

        $query = $this->db->get('chat');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function getChatById($chat_id)
    {
        $this->db->select('*');
        $this->db->where('chat_id', $chat_id);
        $this->db->order_by('created_at', 'desc');

        $query = $this->db->get('chat');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function get_latest_chat_row($chat_id)
    {
        // Fetch the latest chat message for the given user_id, ordered by created_at descending
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('chat_id', $chat_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        // Check if a message was found
        if ($query->num_rows() > 0) {
            return $query->row_array();  // Return the latest row as an object
        } else {
            return "0";  // Return NULL if no messages are found for this user
        }
    }


    function checking_user_password($password, $user_id)
    {
        $this->db->select('id');
        $this->db->where('id', $user_id);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
    
        if($query->num_rows() > 0){ return $query->row_array(); }
        return false;
    }


    // function get_workshop_by_owner($owner_id)
	// {
	// 	$this->db->select('*');
    //     $this->db->where('owner_id', $owner_id);
    //     $query = $this->db->get($this->workshop_table);

    //     // return $this->db->last_query();
    //     if($query->num_rows() > 0){ 
    //         return $query->row_array(); 
    //     } else { 
    //         return false; 
    //     }

	// }

    // function insert_users_table($table, $data)
    // {   
    //     $this->db->insert($table, $data);
    //     return $this->db->affected_rows();
    // }

    // function check_user_login($data)
    // {
    //     $this->db->select('*');
    //     $this->db->where(array(
    //         'email'      => $data['email'], 
    //         'password'   => md5($data['password']),
    //     ));
    //     $query = $this->db->get($this->users_table);

    //     if($query->num_rows() > 0){ return $query->row_array(); } else { return false; }
    // }
}
