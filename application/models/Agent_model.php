<?php 
class Agent_model extends CI_Model{


// when user is login
    public function get($user_uid = null){
      
      $q=$this->db->get_where('users',array('email'=>$user_uid['email'],'password'=>$user_uid['password']));
      
     if($q->num_rows() >0){
       
     return $q->result_array();
     
        }else{
    return FALSE;
    	}
   	} 

//when new user register
    public function register_new_user($data){
        $this->db->insert('users', $data);
        return true;
    }


	//forget work start 

	public function forget($email){
	    $this->db->select()->from('users')->where('email', $email);
	    $q = $this->db->get();
	    return $q->result_array();
	}

    public function forget_activeRecord($data, $uid){
        $updateData = array('activecode'=>$data);
        $this->db->where('uid', $uid);
        $this->db->update('users', $updateData);
    }
     
    public function check_active_record($data){
        $this->db->select('uid')->from('users')->where('activecode',$data);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function passwordChange($uid, $data){
      $value = array('password'=>$data, 'activecode'=>'');
      $this->db->where('uid', $uid);
      $this->db->update('users', $value);
     }
//forget work end      

     public function insertAgent($data){
        $this->db->insert('agent_request',$data);
      return true;
     }

     public function get_data_join($table1, $table2, $tableCondition, $condition){
      $this->db->select();
      $this->db->from($table1);
      $this->db->join($table2, $tableCondition);
      $this->db->where($condition);
      $q = $this->db->get();
      return $q->result_array();
     }

    public function get_query_data($q){
      $q = $this->db->query($q);
      return $q->result_array();
     }

    public function table_pagnination_condition($table, $condition, $limit, $offdata){
          
         $this->db->select()->from($table)->where($condition)->limit($offdata, $limit)->order_by('id', 'DESC');
         $q = $this->db->get();
         
        return $q->result_array();
      
         
    }
	
  	public function get_domesticFlightMrakup($flightcode,$forcommision){
          
          $q = $this->db->query("SELECT  agent_commision_markup.adult_Commission,agent_commision_markup.Child_Commission,agent_commision_markup.Infant_Commission
FROM flight_image
LEFT JOIN agent_commision_markup ON ( flight_image.id = agent_commision_markup.`refrence_id`
AND `forcommision` = '".$forcommision."' AND agent_commision_markup.uid='".$this->session->userdata('auid')."') WHERE `flight_code` = '".$flightcode."'");
          return $q->result_array();
      
         
    }
	
	public function get_busMrakup($type='AC Bus'){
          
          $q = $this->db->query("SELECT  agent_commision_markup.adult_Commission,agent_commision_markup.Child_Commission,agent_commision_markup.Infant_Commission
FROM agent_commision_markup  WHERE `forcommision` = '".$type."' AND agent_commision_markup.uid='".$this->session->userdata('auid')."'");
          return $q->result_array();
      
         
    }
	
	public function get_hotelMrakup($type='Domestic Hotel'){
          
          $q = $this->db->query("SELECT  agent_commision_markup.adult_Commission,agent_commision_markup.Child_Commission,agent_commision_markup.Infant_Commission
FROM agent_commision_markup  WHERE `forcommision` = '".$type."' AND agent_commision_markup.uid='".$this->session->userdata('auid')."'");
          return $q->result_array();
      
         
    }

    
    public function get_data_table($tableName,$condition){
      $q = $this->db->get_where($tableName,$condition);
      return $q->result_array();
    }
	
	public function show_agent_request($limit, $pagedata){
		
		$this->db->select();
        $this->db->from('agent_request');
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data=$this->db->get();
    
	  return $data->result_array();
	}
}
?>