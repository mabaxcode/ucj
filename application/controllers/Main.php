<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        if ($this->session->userdata('user_id')) {  
        	// check user type
        	if ($this->session->userdata('user_type') == '1') {
        		// user
        		redirect('app');
        	} else {
        		// admin
        		redirect('office');
        	}

        }

        $this->load->model('Main_model', 'main');
        $this->users_table  = 'users';
	}

	public function index()
	{	
		$data['kits'] = get_any_table_array(array('is_submit' => '1'), 'design');
		$this->load->view('home', $data);
	}

	public function login($data=false)
	{
		// code...
		$this->load->view('login', $data);
	}

	public function createAccount($data=false)
	{
		$this->load->view('create_account');
	}

	function doCreateAccount($data=false)
	{
		$data = $this->input->post();
		// print_r($data); exit();

		$emailExist = $this->main->check_email(array('email' => $data['email']));

		if ($emailExist['status'] == true) {
			$this->session->set_flashdata('error', 'Sorry, the email address is already exist.');
			redirect(base_url('#contact'));
		} else {

			# do register account
			$data_insert = array(
				'name' 	 	 => $data['name'],
				'email'  	 => $data['email'],
				'password' 	 => md5($data['password']),
				'create_dt'  => current_date(),
				'user_type'  => '1',
			);

			$insert = $this->main->insert_users_table($this->users_table, $data_insert);
			

			// if ($insert == true) {
			// 	$response    = array('status' => true, 'msg' => 'Account has been successfully created !');
			// } else {
			// 	$response = array('status' => false, 'msg' => 'Something when wrong !');
			// }

			$this->session->set_flashdata('success', 'Account has been successfully created !');
			redirect(base_url('#contact'));

		}

		// echo encode($response);
		// exit();
	}

	function loginProcess($data=false)
	{
		$data = $this->input->post();
		// print_r($data); exit();
		$user_login = $this->main->check_user_login($data);

		if ($user_login == false) {

			$this->session->set_flashdata('error', 'Sorry, the email or password is incorrect, please try again.');
			redirect('main/login');

		} else {

			$sess_data = array(
				'user_id' 	=> $user_login['id'],
				'name' 	  	=> $user_login['name'],
				'email' 	=> $user_login['email'],
				'user_type' => $user_login['user_type']
			);

			$this->session->set_userdata($sess_data);
			if ($user_login['user_type'] == 1) {
				redirect('app');
			} else {
				redirect('office');
			}
			
		}

	}
}
