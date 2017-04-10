<?php

class Cab_model extends CI_Model
{
   public  function cab_list()
   { 
 	  $cab = $this->db->get_where('cabs');
      return  $cab->result_array();
  }
 
  public  function cab_detail($id)
  {  
	  $cab=$this->db->get_where('cabs',array('cab_id'=>$id));
	  return $cab->result_array();
  }
 
}