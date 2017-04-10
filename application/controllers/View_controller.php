<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class View_controller extends CI_Controller {


	public function __construct()

	{ 
		parent::__construct();

		$this->load->database();

		$this->load->library('session');

		$this->load->library('email');

		$this->load->helper(array('form','html','url','path'));

		$this->load->model('admin_model');

		$this->load->model('earth_model');

		$this->load->library('pagination');


	}

	

	public function enquire(){
		$data_url['display'] = $this->earth_model->show_strip();
		if(isset($_POST['submit'])){
			$data = array( 
			"title"=>$this->input->post('title'),
			"f_name"=>$this->input->post('f_name'),
			"l_name"=>$this->input->post('l_name'),
			"mobile"=>$this->input->post('mobile'),
			"l_name"=>$this->input->post('l_name'),
			"email"=>$this->input->post('email'),
			"country"=>$this->input->post('country'),
			"state"=>$this->input->post('state'),
			"city"=>$this->input->post('city'),
			"property_type"=>$this->input->post('property_type'),
			"project"=>$this->input->post('project'),
			"comments"=>$this->input->post('comments'),
			"date"=>date("Y-M-D")
			);

			$this->earth_model->insert_data('enquire',$data);
			echo "<script>alert('Your query has been submited successfully');window.location='".base_url()."';</script>";
		}else{
			if($this->session->userdata('admin_id')){

				$data['display'] = $this->earth_model->get_data('enquire');
				// print_r($data);
				$this->load->view('admin/query_form', $data);
			}
		}


		// print_r($_POST);

	}

	public function request_site_visit(){
		$data_url['display'] = $this->earth_model->show_strip();

		if(isset($_POST['submit'])){
			$data = array( 

			"project"=>$this->input->post('project'),
			"date1"=>$this->input->post('date'),
			"city"=>$this->input->post('city'),
			"email"=>$this->input->post('email'),
			"date"=>date("Y-M-D")
			);

			$this->earth_model->insert_data('REQUEST_SITE',$data);
			echo "<script>alert('Your query has been submited successfully');window.location='".base_url()."';</script>";
		}
	}

	public function queryFrom(){
		$data_url['display'] = $this->earth_model->show_strip();
		//Array ( [name] => ssd [email] => as@gmail.com [messages] => sdfsf [submit] => ) 
		if(isset($_POST['submit'])){
			$data = array( 
			"name"=>$this->input->post('name'),
			"email"=>$this->input->post('email'),
			"message"=>$this->input->post('messages'),
			"date"=>date("Y-M-D")
			);

			$this->earth_model->insert_data('query_form',$data);
			echo "<script>alert('Your query has been submited successfully');window.location='".base_url()."';</script>";
		}else{
			if($this->session->userdata('admin_id')){

				$data['display'] = $this->earth_model->get_data('query_form');
				// print_r($data);
				$this->load->view('admin/query_form', $data);
			}
		}

		// print_r($_POST);
	}

	public function career(){
		$data_url['display'] = $this->earth_model->show_strip();
		// Array ( [name] => ssd [email] => ssd@fgd.hjh [phone] => 232323 [current_opening] => HR [submit] => ) 

		if(isset($_POST['submit'])){
			$data = array( 
			"name"=>$this->input->post('name'),
			"email"=>$this->input->post('email'),
			"phone"=>$this->input->post('phone'),
			"current_opening"=>$this->input->post('current_opening'),
			"date"=>date("Y-M-D")
			);

			$this->earth_model->insert_data('career',$data);

			echo "<script>alert('Your query has been submited successfully');window.location='".base_url()."';</script>";
			// redirect('index.php/excellainfra/index');
			// $this->load->view('index',$data_url);

		}else{
			if($this->session->userdata('admin_id')){

				$data['display'] = $this->earth_model->get_data('career');
				// print_r($data);
				$this->load->view('admin/query_form', $data);
			}
		}

		
	}

	public function contact(){
$data_url['display'] = $this->earth_model->show_strip();
		if(isset($_POST['submit'])){
			$data = array( 
			"name"=>$this->input->post('name'),
			"email"=>$this->input->post('email'),
			"message"=>$this->input->post('messages')
			);

			$this->earth_model->insert_data('contact',$data);

			echo "<script>alert('Your query has been submited successfully');window.location='".base_url()."';</script>";
		}else{
			if($this->session->userdata('admin_id')){

				$data['display'] = $this->earth_model->get_data('contact');
				// print_r($data);
				$this->load->view('admin/query_form', $data);
			}
		}
		// Array ( [name] => ssd [email] => as@gmail.com [messages] => sddwsw [submit] => ) 
		
	}

	public function add_data(){
		// $data_url['display'] = $this->earth_model->show_strip();
		if($this->input->post('submit')){
			$data = array("data_id"=>0,"doc"=>
			$this->input->post('textData'),"date"=>date("Y-M-D"));
			$this->earth_model->insert_data('show',$data);

			echo "<script>alert('insert data');</script>";
			redirect('index.php/admin/add_data','refresh');

		}
	}

	
	public function feedbackform(){
		$data_url['display'] = $this->earth_model->show_strip();
		if(isset($_POST['submit'])){
			$data = array( 
			"name"=>$this->input->post('name'),
			"email"=>$this->input->post('email'),
			"message"=>$this->input->post('message'),
			"date"=>date("Y-M-D")
			);

			$this->earth_model->insert_data('feedbackform',$data);

			echo "<script>alert('Your query has been submited successfully');window.location='".base_url()."';</script>";
		}else{
			if($this->session->userdata('admin_id')){

				$data['display'] = $this->earth_model->get_data('feedbackform');
				// print_r($data);
				$this->load->view('admin/query_form', $data);
			}
		}
		// Array ( [name] => ssd [email] => as@gmail.com [message] => asdddas [submit] => ) 
		//print_r($_POST);
	}





}	