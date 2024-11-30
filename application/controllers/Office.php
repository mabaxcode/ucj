<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        if (! $this->session->userdata('user_id')) {
        	redirect();
        }

        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('Office_model', 'DbOffice');
	}

	public function index()
	{	
		$data['content'] = 'office/dashboard_content';

		$data['total_order'] = count_any_table(array('status !=' => 'COMPLETE'), 'orders');

		$data['total_kit'] = count_any_table(array('is_submit' => '1'), 'design');

		$data['total_user'] = count_any_table(array('user_type' => '1'), 'users');

		$data['users'] = get_any_table_array(array('user_type' => '1'), 'users');


		$this->load->view('office/dashboard', $data);
	}

	function design($data=false)
	{
		$data['content'] = 'office/list_design';
		$data['add_script'] = 'office/kit_script';
		
		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design');	
 	
		$this->load->view('office/dashboard', $data);
	}

	function template($data=false)
	{
		$data['content'] = 'office/list_template';
		$data['add_script'] = 'office/template_script';
		
		$data['template'] = get_any_table_array(array('is_submit' => '1'), 'template');	
 	
		$this->load->view('office/dashboard', $data);
	}

	public function upload_kit_design($data=false)
	{	

		$temp_key = $this->input->post('temp_key');


		if(!empty($_FILES['file']['name'])){
                        
            $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $hashfilename                   = getRandomString('20') . "." . $ext;
            $config['upload_path']          = 'uploads/kit';
            $config['allowed_types']        = 'png';
            $config['max_size']             = 9999;
            $config['file_name']            = $hashfilename;
            $config['max_width']     		= "600";           // max width of the image (0 for no limit)
			$config['max_height']    		= "600";  

            $this->load->library('upload', $config);

            $status = true;

            if ( ! $this->upload->do_upload('file'))
            {
                $error      = array('error' => $this->upload->display_errors());
                $status     = false;
                $msg  = $error['error'];
            }
            else
            {       
                # insert success upload
                $data_insert = array(
                    'filename' => $hashfilename,
                    'original_filename' => $_FILES['file']['name'],
                    'path' => $config['upload_path'],
                    'create_dt' => current_date(),
                    'temp_key' => $temp_key,
                );

                $insert = insert_any_table($data_insert, 'design');
           		$msg = 'File uploaded successfully!';

            }

        } else {
            $status = false;
            $msg = 'File not found';
        }

        $response = array('status' => $status, 'message' => $msg );
        echo encode($response);

		// code...
		// echo "<pre>"; print_r($_FILES['file']); echo "</pre>";
	}

	public function add_new_kit_modal($data=false)
	{
		// code...
		$data['temp_key'] = getRandomString('20');
		$this->load->view('office/modal_create_kit', $data);
	}

	function check_kit_uploaded($data=false)
	{
		// $temp_key = $this->input->post('temp_key');

		$post = $this->input->post();
		// print_r($post); exit;

		$check = get_any_table_row(array('temp_key' => $post['temp_key']), 'design');

		$msg = "";

		if ($post['name'] == '') {
			$msg .= "<li>Kit Name is required</li>";
			echo encode( array('status' => false , 'msg' => $msg));
		} elseif ($check == false) {
			$msg .= "<li>Kit Image is required</li>	";
			echo encode( array('status' => false , 'msg' => $msg));
		} else {
			echo encode( array('status' => true , 'msg' => 'OK'));
		}
	}

	function check_template_uploaded($data=false)
	{
		// $temp_key = $this->input->post('temp_key');

		$post = $this->input->post();
		// print_r($post); exit;

		$eps   = get_any_table_row(array('temp_key' => $post['temp_key']), 'template');
		$cover = get_any_table_row(array('temp_key' => $post['temp_key']), 'cover_image');

		$msg = "";

		if ($post['name'] == '') {
			$msg .= "<li>Template Name is required</li>";
			echo encode( array('status' => false , 'msg' => $msg));
		} elseif ($cover == false) {
			$msg .= "<li>Template Cover Image is required</li>	";
			echo encode( array('status' => false , 'msg' => $msg));
		} elseif ($eps == false) {
			$msg .= "<li>EPS File is required</li>	";
			echo encode( array('status' => false , 'msg' => $msg));
		} 
		else {
			echo encode( array('status' => true , 'msg' => 'OK'));
		}
	}

	function save_new_kit($data=false)
	{
		$post = $this->input->post();

		$name = $post['name'];
		$temp_key = $post['temp_key'];

		$update = array('name' => $name, 'is_submit' => '1');
		$where = array('temp_key' => $temp_key);

		$update = update_any_table($update, $where, 'design');

		if ($update == true) {
			echo encode(array('status' => true, 'msg' => 'Kit Design has been successfully added !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to add !'));
		}
	}

	function save_new_template($data=false)
	{
		$post = $this->input->post();

		$name = $post['name'];
		$temp_key = $post['temp_key'];

		$update = array('name' => $name, 'is_submit' => '1');
		$where = array('temp_key' => $temp_key);

		$update = update_any_table($update, $where, 'template');
		$updateCover = update_any_table(array('is_submit' => '1'), $where, 'cover_image');

		if ($update == true) {
			echo encode(array('status' => true, 'msg' => 'Template has been successfully added !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to add !'));
		}
	}

	function delete_kit($data=false)
	{
		$id = $this->input->post('id');

		$delete = delete_any_table(array('id' => $id), 'design');

		if ($delete == true) {
			echo encode(array('status' => true));
		} else {
			echo encode(array('status' => false));
		}
	}

	function add_new_template_modal($data=false)
	{
		// code...
		$data['temp_key'] = getRandomString('20');
		$this->load->view('office/modal_create_template', $data);

	}

	public function upload_template($data=false)
	{	
		// print_r($_FILES['file']); exit;

		$temp_key = $this->input->post('temp_key');


		if(!empty($_FILES['file']['name'])){
                        
            $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $hashfilename                   = getRandomString('20') . "." . $ext;
            $config['upload_path']          = 'uploads/template';
            // $config['allowed_types']        = 'eps';
            $config['allowed_types'] 		= '*'; // Allow all types temporarily
            $config['max_size']             = 999999;
            $config['file_name']            = $hashfilename;

            $this->load->library('upload', $config);

            $status = true;

            if ( ! $this->upload->do_upload('file'))
            {
                $error      = array('error' => $this->upload->display_errors());
                $status     = false;
                $msg  = $error['error'];
            }
            else
            {       
                # insert success upload
                $data_insert = array(
                    'filename' => $hashfilename,
                    'original_filename' => $_FILES['file']['name'],
                    'path' => $config['upload_path'],
                    'create_dt' => current_date(),
                    'temp_key' => $temp_key,
                );

                $insert = insert_any_table($data_insert, 'template');
           		$msg = 'File uploaded successfully!';

            }

        } else {
            $status = false;
            $msg = 'File not found';
        }

        $response = array('status' => $status, 'message' => $msg );
        echo encode($response);

		// code...
		// echo "<pre>"; print_r($_FILES['file']); echo "</pre>";
	}

	public function upload_template_cover($data=false)
	{	
		// print_r($_FILES['file']); exit;

		$temp_key = $this->input->post('temp_key');


		if(!empty($_FILES['file']['name'])){
                        
            $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $hashfilename                   = getRandomString('20') . "." . $ext;
            $config['upload_path']          = 'uploads/template';
            $config['allowed_types']        = 'png|jpg';
            $config['max_size']             = 99999;
            $config['file_name']            = $hashfilename;

            $this->load->library('upload', $config);

            $status = true;

            if ( ! $this->upload->do_upload('file'))
            {
                $error      = array('error' => $this->upload->display_errors());
                $status     = false;
                $msg  = $error['error'];
            }
            else
            {       
                # insert success upload
                $data_insert = array(
                    'filename' => $hashfilename,
                    'original_filename' => $_FILES['file']['name'],
                    'path' => $config['upload_path'],
                    'create_dt' => current_date(),
                    'temp_key' => $temp_key,
                );

                $insert = insert_any_table($data_insert, 'cover_image');
           		$msg = 'File uploaded successfully!';

            }

        } else {
            $status = false;
            $msg = 'File not found';
        }

        $response = array('status' => $status, 'message' => $msg );
        echo encode($response);

		// code...
		// echo "<pre>"; print_r($_FILES['file']); echo "</pre>";
	}

	public function configurator($data=false)
	{	
		if (! $this->session->userdata('user_id')) {
			echo "Access Denied"; exit;
		}
		
		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design', 'create_dt');
		$data['default_kit'] = get_any_table_row(array('is_submit' => '1'), 'design', 'create_dt');

		$this->load->view('jersey-editor/main', $data);
	}

	function customer_support($data=false)
	{
		$data['content'] = 'office/customer_support';
		$data['add_script'] = 'office/cs_script';
		
		//$data['template'] = get_any_table_array(array('is_submit' => '1'), 'template');

		$data['users'] = $this->DbOffice->get_chat_user(); 

		if ($data['users']) {
			$data['chat_exist'] = true;
		} else {
			$data['chat_exist'] = false;
		}

		// echo "<pre>"; print_r($data['users']); echo "</pre>"; exit;
 	
		$this->load->view('office/dashboard', $data);
	}

	function msgBox($chat_id)
	{
		$data['all_chats'] = $this->DbOffice->getChatById($chat_id);

		# get user base on chat id
		$data['user_box'] = get_any_table_row(array('id' => $chat_id, 'user_type' => '1'), 'users');

		if ($data['user_box']['online'] == '1') {
			$data['online'] = "Online";
		} else {
			$data['online'] = "Offline";
		}

		// $data['user_box'] = 
		
		$data['content'] = 'office/msg_box';
		$data['add_script'] = 'office/msgBox_script';

		$data['users'] = $this->DbOffice->get_chat_user(); 

		$data['chat_id'] = $chat_id;

		# update to read
		update_any_table(array('read_flag' => '1'), array('chat_id' => $chat_id), 'chat');

		$this->load->view('office/dashboard', $data);

	}

	function open_chat_box($data=false)
	{
		$this->load->view('office/chat_box_content', $data);
	}

	function admin_send_message($data=false)
	{	
		$chat_id = $this->input->post('chat_id');
		$msg = $this->input->post('msg');
		$latest_row = $this->DbOffice->get_latest_chat_row($chat_id);

		$parent_id = $latest_row['id'];

		$insert = array(
    		'user_id' => $this->user_id, 
    		'msg' => $msg, 
    		'user_type' => '2', 
    		'parent_id' => $parent_id, 
    		'chat_id' => $chat_id, 
    		'created_at' => current_date()
    	);

    	// print_r($insert); exit;

    	$doInsert = insert_any_table($insert, 'chat');

    	if ($doInsert == false) {
    		echo encode(array('status' => false));
    	}

    	echo encode(array('status' => true));
	}

	function comment($data=false)
	{
		// code...
		$data['content'] = 'office/comment';
		// $data['add_script'] = 'office/comment_script';
		
		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design');	
 	
		$this->load->view('office/dashboard', $data);

	}

	function viewComment($id)
	{
		// code...
		$data['content'] = 'office/comment_details'; 
		$data['add_script'] = 'office/comment_script';
		$data['comments'] = get_any_table_array(array('status' => '1', 'kit_id' => $id), 'comment');	

		$data['kit'] = get_any_table_row(array('id' => $id), 'design');	

		$this->load->view('office/dashboard', $data);
	}

	function create_new_comment($data=false)
    {
    	$post = $this->input->post();

    	// echo "<pre>"; print_r($post); echo "</pre>";

    	$id = $post['id'];
    	$comment = $post['comment'];


    	$insert = array(
    		'user_id' => $this->user_id,
    		'comment' => $comment,
    		'create_dt' => current_date(),
    		'kit_id' => $id,
    		'status' => '1',
    	);

    	$do_insert = insert_any_table($insert, 'comment');

    	if ($do_insert == true) {
    		echo encode(array('status' => true, 'msg' => 'Your comment has been send'));
    	} else {
    		echo encode(array('status' => false, 'msg' => 'Failed to send'));
    	}

    }

    function viewOrder($data=false)
    {
    	$data['content'] = 'office/order_list'; 
		$data['add_script'] = 'office/order_script';
		$data['orders'] = get_any_table_array(array('status !=' => 'COMPLETE', 'is_submit' => '1'), 'orders');

		$this->load->view('office/dashboard', $data);
    }

    function confirm_order($data=false)
    {
    	$id = $this->input->post('id');

    	$update = array('status' => 'CONFIRM', 'remark' => 'Order has been confirmed,<br>kindly proceed to print this design');

    	$where = array('id' => $id);

    	$do_update = update_any_table($update, $where, 'orders');

    	if ($do_update == true) {
    		echo encode(array('status' => true));
    	} else {
    		echo encode(array('status' => false));
    	}

    }

    function reject_order($data=false)
    {
    	$id = $this->input->post('id');

    	$update = array('status' => 'REJECT', 'remark' => 'Order has been rejected');

    	$where = array('id' => $id);

    	$do_update = update_any_table($update, $where, 'orders');

    	if ($do_update == true) {
    		echo encode(array('status' => true));
    	} else {
    		echo encode(array('status' => false));
    	}
    }

    function print_order($data=false)
    {
    	$id = $this->input->post('id');

    	$update = array('status' => 'PRINT', 'remark' => 'Order In Process Of Printing');

    	$where = array('id' => $id);

    	$do_update = update_any_table($update, $where, 'orders');

    	if ($do_update == true) {
    		echo encode(array('status' => true));
    	} else {
    		echo encode(array('status' => false));
    	}
    }

    function complete_order($data=false)
    {
    	$id = $this->input->post('id');

    	$update = array('status' => 'COMPLETE', 'remark' => 'Order Completed');

    	$where = array('id' => $id);

    	$do_update = update_any_table($update, $where, 'orders');

    	if ($do_update == true) {
    		echo encode(array('status' => true));
    	} else {
    		echo encode(array('status' => false));
    	}
    }

    function orderComplete($data=false)
    {
    	$data['content'] = 'office/order_complete'; 
		$data['add_script'] = 'office/order_complete_script';
		$data['orders'] = get_any_table_array(array('status' => 'COMPLETE', 'is_submit' => '1'), 'orders');

		$this->load->view('office/dashboard', $data);
    }

    function myProfile($data=false)
	{
		$data['content'] = 'office/my_profile';
		$data['add_script'] = 'office/profile_script';
		$data['profile'] = get_any_table_row(array('id' => $this->user_id), 'users');	

		$data['user_chat'] = true;

		$this->load->view('office/dashboard', $data);
	}

	function setting($data=false)
	{
		$data['content'] = 'office/profile_setting';
		$data['add_script'] = 'office/setting_script';
		$data['user'] = get_any_table_row(array('id' => $this->user_id), 'users');	


		$this->load->view('office/dashboard', $data);
	}

	public function updateProfile($data=false)
	{
		// code...
		$post = $this->input->post();

	    $update_profile = array(
	    	'name' => $post['name'],
	    	'phone_no' => $post['phone_no']
	    );

	    $whereUser = array('id' => $this->user_id );


	    update_any_table($update_profile, $whereUser, 'users');

        
		// echo "<pre>"; print_r($post); echo "</pre>";

	
		// echo "<pre>"; print_r($_FILES['avatar']); echo "</pre>"; exit();

	    $response = array('status' => true, 'msg' => 'Your profile has been successfully updated !' );
	    echo encode($response);

	}

	function updateEmail($data=false)
	{
		$post = $this->input->post();

	    $update_profile = array(
	    	'email' => $post['email']
	    );

	    $whereUser = array('id' => $this->user_id );


	    $update_process = update_any_table($update_profile, $whereUser, 'users');

	    if ($update_process == true) {
	    	// code...
	    	$response = array('status' => true, 'msg' => 'Your profile has been successfully updated !' );
	    	echo encode($response);
	    }else{
	    	$response = array('status' => false, 'msg' => 'Failed to update !' );
	    	echo encode($response);
	    }

	    
	}

	function change_password($data=false)
	{
		$post        = $this->input->post();
		$currentPass = md5($post['currentpassword']);
		$newPass     = $post['newpassword'];
		$confirmPass = $post['confirmpassword'];

		// echo $currentPass; exit;

		$is_password = $this->DbOffice->checking_user_password($currentPass, $this->user_id);

		if ($is_password == true) {
			$data_upd   = array('password' => md5($newPass));
			$data_where = array('id' => $this->user_id, 'password' => $currentPass);
			update_any_table($data_upd, $data_where, 'users');

			$response = array('status' => true, 'msg' => 'Your password has been successfully updated');
		} else {
			$response = array('status' => false, 'msg' => 'Sorry, your current password is incorrect');
		}
		echo encode($response);
		exit;
	}
}
