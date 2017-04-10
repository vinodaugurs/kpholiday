<?php

class Associate_model extends CI_Model
{
   function __construct()
    {
        parent::__construct();
    
    }
    function getpro($user_uid)
    {
        //print_r($user_uid);
    $q = $this->db->get_where('profile',['uid'=> $user_uid]);
     
    return $q->result_array();
    }
    
    function inpro($form_updata)
    {
     $this->db->insert('profile',$form_updata);   
    }
    function uppro($form_updata)
    {
        $user_uid = $this -> session ->userdata('uid');
        //$user_uid = $data['uid'];
    
     $this->db->where(['uid' => $user_uid ]);
     $this->db->update('profile',$form_updata);
  
//$this->db->update('profile',$form_data);
   // return $q->result_array();
         return true;
    }
     function upwpro($form_updata)
    {
        $user_uid = $this -> session ->userdata('uid');
        //$user_uid = $data['uid'];
        
        
         $this->db->where(['uid' => $user_uid ]);
     $this->db->update('asso_wprofile',$form_updata);
  
//$this->db->update('profile',$form_data);
   // return $q->result_array();
         return true;
    }
    
	
	public function custom_detail($id)
	{
		
	   $data=$this->db->get_where('customize_form', array('id'=>$id));	
	
	    return $data->result_array();
	}
	
    function gettour()
    {
       $this->db->order_by('id','desc');
     $q = $this->db->get_where('post_tour',['status'=>'active']); 
     return $q->result_array();
    }
    function tourbyid($tour_id)
    {
        $q = $this->db->get_where('post_tour',['id' => $tour_id]);
       
        return $q->result_array();
    }
    function hiretour($tour_id)
    {
       $q = $this->db->get_where('post_tour',['id' => $tour_id ,'hired' => 'yes']);
       
        return $q->result_array();  
    }
    
     function getwprobyitsid($id)
    {
        
        $q = $this->db->get_where('asso_wprofile',['id'=>$id]);
        return $q->result_array();  
    }
    
    function getwprobyid($uid)
    {
        
        $q = $this->db->get_where('asso_wprofile',['uid'=>$uid]);
        return $q->result_array();  
    }
     function getportbywpid($pid)
    {
        
        $q = $this->db->get_where('portfolio',['wprid' => $pid]);
        return $q->result_array();  
    }
    // dispute
    
    function getdistour($asso,$trv,$tid)
    {
        $q = $this->db->get_where('post_tour',['id' => $tid ,'asso_uid' => $asso,'trv_uid' => $trv]);
       
        return $q->result_array(); 
    }
    function getchatfr($to)
    {
        $this->db->select('from');
        
       $this->db->distinct();
       $q = $this->db->get_where('chat',['to' => $to]);
       
        return $q->result_array(); 
    }
    function uploaddoc($form_data)
    {
        $this->db->insert('document', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
    }
    function getdoc($uid)
    {
       $q = $this->db->get_where('document',['uid' => $uid]);    
        
         return $q->result_array();  
    }
    function doccount($uid)
    {
        $this->db->like('uid', $uid);
        $this->db->from('document');
        $q = $this->db->count_all_results();
        return $q;
    }
    function wprodata($form_data)
    {    
      
      $this->db->insert('asso_wprofile', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
    }
    function isport($uid)
    {
        //$q = $this->db->get_where('portfolio',['uid' => $uid]);
        
        $this->db->like('uid', $uid);
        $this->db->from('portfolio');
        $q = $this->db->count_all_results();
        return $q;
    }
    function addport($form_data)
    {
         $this->db->insert('portfolio', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
    }
    function getportbyuid($uid)
    {
        
        $this->db->order_by("id","desc");
        $q = $this->db->get_where('portfolio',['uid' => $uid]);       
        
        return $q->result_array();  
    }
    
    function getportbyid($id)
    {
      $q = $this->db->get_where('portfolio',['id' => $id]);       
        
        return $q->result_array();   
    }
    
    function addpayment($fdata)
    {
       $this->db->insert('payment', $fdata);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE; 
    }
    
    function getpayment($uid)
    {
         $q = $this->db->get_where('payment',['uid' => $uid]);       
        
        return $q->result_array();  
    }
    
    function getannounce($uid)
    {
        $this->db->limit(7);
        $this->db->order_by("id", "desc"); 
        $q = $this->db->get_where('announcement',['uid' => $uid]);    
        
        return $q->result_array();  
    }
    
    
    function upport($id,$portdata)
    {
     $this->db->where(['id' => $id ]);
     $this->db->update('portfolio',$portdata);
     
    }
    
    function delport($id)
    {
     $this->db->where(['id' => $id ]);
     $this->db->delete('portfolio');
    }
   function addtrans($tdata)
   {
       $this->db->insert('travel', $tdata);
		if ($this->db->affected_rows() == '1')
		{
	         return TRUE;
		}
		return FALSE;  
   }
   function gettransbyuid()
   {
        $uid = $this->session->userdata('uid');
        $this->db->order_by("id", "desc"); 
        $q = $this->db->get_where('travel',['uid' => $uid]);    
        return $q->result_array(); 
   }
   
    public function addcab($data)
   {
   	$this->db->insert('cabs',$data);
   
   if($this->db->affected_rows() == '1')
   {
   	return TRUE;
   }
   return FALSE;
   
   }
   
   
   function addhotel($hdata)
    {
      $this->db->insert('hotel', $hdata);
		if ($this->db->affected_rows() == '1')
		{
	         return TRUE;
		}
		return FALSE;     
    }
    
    function gethotelbyuid()
    {
        $this->db->order_by('id','desc');
       
        $q = $this->db->get('hotel');    
        return $q->result_array(); 
    }
    function del_customize($id)
	{  
		$this->db->where('id', $id);
        $this->db->delete('customize_form'); 
	
	}
	
	function getuserbyuid()
    {
        $this->db->order_by('id','asc');
       
        $q = $this->db->get('customize_form');    
        return $q->result_array(); 
    }
    
	
    function getcabbyuid()
    {
        $this->db->order_by('id','desc');
       
        $q = $this->db->get('cabs');    
        return $q->result_array(); 
		
	}
    function gethotelbyid($hid)
    {
         $q = $this->db->get_where('hotel',['id' => $hid]);    
        return $q->result_array(); 
    }
    
     function getcabbyid($hid)
    {
         $q = $this->db->get_where('cabs',['cab_id' => $hid]);    
        return $q->result_array(); 
    }
    
    function uphotel($id,$data)
    {
     $this->db->where(['id' => $id]);
     $this->db->update('hotel',$data); 
    }
    
    function upcab($id,$data)
    { 
     $this->db->where(['cab_id' => $id]);
     $this->db->update('cabs',$data); 
      return true;
	}
    
    function delete_cab($id)
    {
		$this->db->delete('cabs',['cab_id'=>$id]);
	    return TRUE;	
	}
    function gettravelbyid($id)
    {
       $q = $this->db->get_where('travel',['id' => $id]);    
        return $q->result_array(); 
    }
    function uptravel($id,$data)
    {
      $this->db->where(['id' => $id]);
     $this->db->update('travel',$data);   
    }
    function delhotel($id)
    {
        $this->db->where(['id' => $id]);
        $this->db->delete('hotel');  
    }
    
    function addgroup($gdata)
    {
        $this->db->insert('group',$gdata);
        if ($this->db->affected_rows() == '1')
		{
	         return TRUE;
		}
		return FALSE;  
    }
    
     function savedesti($form_data)
    {
     $this->db->insert('destination', $form_data);
      	
    }
    function getgroupbyuid()
    {
        $uid = $this->session->userdata('uid');
        $q = $this->db->get_where('group',['uid' => $uid]);    
        return $q->result_array();   
    }
    function getgroupbyid($id)
    {
        $q = $this->db->get_where('group',['id' => $id]);    
        return $q->result_array(); 
    }
    function upgroup($id,$data)
    {
     $this->db->where(['id' => $id]);
     $this->db->update('group',$data); 
    }
    
    function getdestibyuid()
    {
       $q = $this->db->get_where('destination',['uid' => $this->session->userdata('uid')]);    
        return $q->result_array();  
    }
    function getpaymeth()
    {
        $q = $this->db->get_where('payment',['uid' => $this->session->userdata('uid')]);    
        return $q->result_array();   
    }
    
}

