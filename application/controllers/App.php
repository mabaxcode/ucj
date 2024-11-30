<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->helper('download');  // Load the download helper

        if (! $this->session->userdata('user_id')) {
        	redirect();
        }

        $this->load->model('App_model', 'DbApp');

        $this->user_id = $this->session->userdata('user_id');
   
	}

	public function index()
	{	
		$data['content'] = 'app/dashboard_content';
		$data['add_script'] = 'app/order_script';

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		// order
		$data['total_order'] = count_any_table(array('user_id' => $this->user_id, 'status !=' => 'COMPLETE', 'is_submit' => '1'), 'orders');

		$data['total_kit'] = count_any_table(array('is_submit' => '1'), 'design');

		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design');	

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}


		$this->load->view('app/dashboard', $data);
	}

	public function template($data=false)
	{
		// code...
		$data['content'] = 'app/template';
		$data['template'] = get_any_table_array(array('is_submit' => '1'), 'template');	
		$data['add_script'] = 'app/order_script';

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}
		
		$this->load->view('app/dashboard', $data);

	}

	public function kit($data=false)
	{
		// code...
		$data['content'] = 'app/kit';
		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design');	
		$data['add_script'] = 'app/order_script';

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}


		$this->load->view('app/dashboard', $data);

	}

	public function editor($data=false)
	{
		// code...
		$data['content'] = 'app/editor_tools';
		$data['add_script'] = 'app/script/editor';
		$data['add_header'] = 'app/add_header/header_editor';
		$this->load->view('app/dashboard', $data);

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

	function get_filenames($data=false)
	{	

		$input = get_any_table_array(array('is_submit' => '1'), 'design', 'create_dt');

		$data = [];

		// Loop through the original array and transform it into the desired format
		foreach ($input as $index => $item) {
		    $newIndex = $index + 1; // Start numbering from 1
		    
		    // Add the transformed data
		    $data[$newIndex] = [
		        'filename' => $item['filename'],  // Use the 'filename' from the original item
		        'color' => [
		            [
		                'id' => $item['id'],               // Use 'id' as the color ID
		                'filename' => $item['name'],       // Use 'name' as the color filename
		                'color' => '0268b0'                // Default color, modify as needed
		            ]
		        ]
		    ];
		}

		// Define the array structure
		// $dataori = [
		//     '1' => [
		//         'filename' => 'men1_blue_front',
		//         'color' => [
		//             [
		//                 'id' => '1',
		//                 'filename' => 'blue',
		//                 'color' => '0268b0'
		//             ]
		//         ]
		//     ],
		//     '2' => [
		//         'filename' => 'women_black_front',
		//         'color' => [
		//             [
		//                 'id' => '3',
		//                 'filename' => 'black',
		//                 'color' => '000000'
		//             ]
		//         ]
		//     ]
		// ];

		// echo "<pre>";
		// print_r($data); 
		// echo "</pre>";
		// exit;

		// Return the array as JSON
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function logout()
	{	
		$this->session->sess_destroy();
		redirect();
	}

	public function download_image($filename) {

		$file_path = './uploads/kit/' . $filename;

        // Check if the file exists
        if (file_exists($file_path)) {
            // Force the download using the download helper
            force_download($file_path, NULL);  // The second parameter as NULL forces download
        } else {
            // If the file does not exist, show an error message
            show_404();  // Display a 404 error if the file is not found
        }
    }

    function send_message($data=false)
    {
    	$msg = $this->input->post('msg');
    	$user_id = $this->user_id;

    	$latest_row = $this->DbApp->get_latest_chat_row($this->user_id);

    	if ($latest_row == '0') {
    		$parent_id = '0';
    	} else {
    		$parent_id = $latest_row['id'];
    	}

    	$insert = array(
    		'user_id' => $user_id, 
    		'msg' => $msg, 
    		'user_type' => '1', 
    		'parent_id' => $parent_id, 
    		'chat_id' => $this->user_id, 
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
		$data['content'] = 'app/comment';
		$data['add_script'] = 'app/order_script';
		// $data['comments'] = get_any_table_array(array('user_id' => $this->user_id), 'comment');	

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}

		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design');	


		$this->load->view('app/dashboard', $data);
    }


    function commentPages($id)
    {
    	// code...
		$data['content'] = 'app/comment_pages'; 
		$data['add_script'] = 'app/comment_script';
		$data['comments'] = get_any_table_array(array('status' => '1', 'kit_id' => $id), 'comment');	

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}

		$data['kit'] = get_any_table_row(array('id' => $id), 'design');	

		$this->load->view('app/dashboard', $data);
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

    function order($data=false)
    {
    	// code...
		$data['content'] = 'app/order';
		$data['add_script'] = 'app/order_script';
		$data['orders'] = get_any_table_array(array('user_id' => $this->user_id, 'status !=' => 'COMPLETE'), 'orders');	

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}


		$this->load->view('app/dashboard', $data);
    }

    public function add_new_order($data=false)
	{
		// code...
		$data['temp_key'] = getRandomString('20');
		$this->load->view('app/modal_create_order', $data);
	}

	public function upload_order_design($data=false)
	{	

		$temp_key = $this->input->post('temp_key');


		if(!empty($_FILES['file']['name'])){
                        
            $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $hashfilename                   = getRandomString('20') . "." . $ext;
            $config['upload_path']          = 'uploads/order';
            $config['allowed_types']        = 'png';
            $config['max_size']             = 99999;
            $config['file_name']            = $hashfilename;
            $config['max_width']     		= "600";        
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
                    'user_id' => $this->user_id,
                );

                $insert = insert_any_table($data_insert, 'orders');
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

	function check_order_uploaded($data=false)
	{
		// $temp_key = $this->input->post('temp_key');

		$post = $this->input->post();
		// print_r($post); exit;

		$check = get_any_table_row(array('temp_key' => $post['temp_key']), 'orders');

		$msg = "";

		if ($check == false) {
			$msg .= "<li>Your Custom Jersey Image is required</li>	";
			echo encode( array('status' => false , 'msg' => $msg));
		} else {
			echo encode( array('status' => true , 'msg' => 'OK'));
		}
	}

	function save_new_order($data=false)
	{
		$post = $this->input->post();

		$temp_key = $post['temp_key'];

		$update = array('status' => 'ORDER', 'is_submit' => '1');
		$where = array('temp_key' => $temp_key);

		$update = update_any_table($update, $where, 'orders');

		if ($update == true) {
			echo encode(array('status' => true, 'msg' => 'Design has been successfully ordered !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to submit !'));
		}
	}

	function orderComplete($data=false)
	{
		// code...
		$data['content'] = 'app/order_complete';
		$data['add_script'] = 'app/order_comm_script';
		$data['orders'] = get_any_table_array(array('user_id' => $this->user_id, 'status' => 'COMPLETE'), 'orders');	

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}


		$this->load->view('app/dashboard', $data);
	}

	function myProfile($data=false)
	{
		$data['content'] = 'app/my_profile';
		$data['add_script'] = 'app/profile_script';
		$data['profile'] = get_any_table_row(array('id' => $this->user_id), 'users');	

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}


		$this->load->view('app/dashboard', $data);
	}

	function setting($data=false)
	{
		$data['content'] = 'app/profile_setting';
		$data['add_script'] = 'app/setting_script';
		$data['user'] = get_any_table_row(array('id' => $this->user_id), 'users');	

		$data['user_chat'] = true;

		// get chat
		$data['chats'] = get_any_table_array(array('chat_id' => $this->user_id), 'chat');

		if ($data['chats']) {
			$data['xmsg'] = '1';
		} else {
			$data['xmsg'] = '0';
		}


		$this->load->view('app/dashboard', $data);
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

		$is_password = $this->DbApp->checking_user_password($currentPass, $this->user_id);

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
