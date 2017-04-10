<?php

class Notify_model extends CI_Model
{
   function __construct()
    {
        parent::__construct();
        
    }
    
    
    public function notify($notidata) {
         $this->db->insert('notification', $notidata);
         if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
        
    }
    function gettype($type)
    {
        if ($type != null)
        {
            
            $this->db->order_by("id", "desc"); 
           $q = $this ->db-> get_where('notification',['to_'=>$type ]); 
        }
         return $q->result_array();
    }
    function get($user_uid = null) {
        
        if ($user_uid === null)  {
          $q = $this -> db -> get('notification');
      } 
      elseif(is_array($user_uid)){
        $q= $this->db  -> get_where('notification',$user_uid);
      }  
      else {
          
      $q = $this->db  -> get_where('notification',['uid'=> $user_uid  ]);
         
      }
      return $q->result_array();
     
    }
    
    function getnoti($seen) {
         $this->db->order_by("id", "desc"); 
      $q = $this->db  -> get_where('notification',['seen'=> $seen,'to_'=>'Admin']);  
       return $q->result_array();
    }
   
    function getupdate($data){
         //$this->db->where('uid', $userid);
        //$id = ;
        
       
            $this->db->update('notification',$data ); 
       
   
        
        //$this->db->update('notification',$data,array('id'=> $data['id']) );}
    }
    function getnotibyname($name)
    {
        $this->db->order_by("id", "desc"); 
        $q = $this->db->get_where('notification',['seen'=> 0,'to_'=>$name]);  
       return $q->result_array();
    }
    function getnotiall($name)
    {
        $this->db->order_by('id', 'desc'); 
        $this->db->where('to_',$name);
        $q = $this->db->get('notification');  
       return $q->result_array();
    }
//    function getnotitrbid()
//    {
//        $this->db->order_by("id", "desc"); 
//        $q = $this->db-> get_where('notification',['to_'=>$name]);  
//       return $q->result_array();  
//    }
    
    function upnoti($id,$to)
    {
        $this->db->where('id',$id);
         $this->db->where('to_',$to);
       
        $this->db->update('notification',['seen'=>'1']);
    }
	
	public function flight_image($id)
	{
		 $img=$this->db->get('flight_image',array('flight_code'));
		 return $img->result_array();
	}
   
}