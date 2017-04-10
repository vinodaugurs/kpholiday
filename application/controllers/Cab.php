<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cab extends CI_Controller {



     public function cab_list()
 	 { 
         $city=$this->input->post('source');
          
					//$cab['cab']=$this->cab->cab_list($city);
    			   	$this->load->view('home/car_list');
				
	 }
	 
	 public  function cab_detail($id)
	 {   $data['id']=$id;
		 $this->load->view('home/cab_detail',$data);
	 }

     public  function book_now($id)
	 {   $data['id']=$id;
		 $this->load->view('home/book_now',$data);
	 }	 
	 
}