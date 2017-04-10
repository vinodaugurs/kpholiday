<?php

class Site_model extends CI_Model
{
   function __construct()
    {
        parent::__construct();
        
        
    }
    
	
	function  flight_city()
	{
		$city=$this->db->get('flight_code');
	    return $city->result_array();
	}
    public  function custome_package($data)
	{
		$this->db->insert('custome_package',$data);
	   return true;
	}
	
	public  function destination($id)
    {
	  $data=$this->db->get_where('destination',array('uid'=>$id));
	  return $data->result_array();
	}	
    
	function book_package($book)
	{
		 $this->db->insert('booked_package',$book);
		 return true;
	}
	
    function packsearch($desti,$checkin,$checkout,$budget)
    {
        //SELECT * FROM `packages` WHERE `start_date`<= '2014-12-03' AND `end_date` >= '2014-12-24' AND `price` <= '15000'
        $this->db->select('*');
        $this->db->from('packages');
       // $array = array('city' => $desti ,);
        //$this->db->having('price <= '.$budget);
                //$this->db->having('price < '.$budget);
                       // $this->db->having('price < '.$budget);
         $this->db->where('start_date <=', $checkin);
         $this->db->where('end_date >=', $checkout); 
         $this->db->where('price <=', $budget); 
         $this->db->where('city', $desti); 
         $this->db->where('status', 'active');
           $this->db->where('view', '1');


        // $this->db->like($array); 
         $q = $this->db->get();


        return $q->result_array();
    }
    
    
    public function traveler_contact($id)
    {
		$data=$this->db->get_where('users',['uid'=>$id]);
		return $data->result_array();
		//$this->db->last_query();
	}
   public function pack_availibility($p_id,$c_id)
    {
	    $data=$this->db->query('select * from travel,hotel where hotel.uid=travel.uid and  hotel.uid="'.$p_id.'" and hotel.city='.$c_id);
	  $r=$data->row_array();
	
	
	  return  $r;
	   
	   
	   
	   
	}
	
	
	 public function pdf_data($pi,$pcity)
	{
	   echo $pcity;
	   echo $pi;	
	$query=$this->db->query('select * from packages,destination where  packages.uid=destination.uid   and packages.id=' .$pi. ' and destination.city='   .$pcity );
   
     $row=$query->result_array();
     print_r($row);
      echo $this->db->last_query();
		
	}
	
	function destination_details($id)
	{
	   $details=$this->db->get_where('destination',['city'=>$id]);
	    //$this->db->last_query();
	    return $details->result_array();
	   
	    	
	}
	
	
	
	
	public function pack_offers($id)
	{
	    	$data=$this->db->query('select * from offers where  pack_id='.$id);
		   return $data->row_array();   
		     
	        
	}
	public function package_details($pid)
	{   
		$data=$this->db->query('select * from packages where id='.$pid);
		
		return $data->result_array();
	
	}
	
	
    function getofferinpack($pid)
    {
       $q = $this->db->get_where('offers',['pack_id'=>$pid]);
      
       return $q->result_array();
    }
//    function getallpack()
//    {
//        $q = $this->db->get_where('packages',['status'=>'active']);
//        return $q->result_array();
//    }
    function getpropack()
    {
        $this->db->order_by("id", "desc"); 
        $q = $this->db->get_where('packages',['status'=>'active','promotion'=>'1']);
        return $q->result_array();
    }
    function getdesti()
    {
       // $this->db->limit(1);
        //$this->db->order_by("id", "desc"); 
        //$q = $this->db->get_where('destination',['status'=>'1','featured'=>'1']);
        
        $q = $this->db->query('SELECT * FROM destination WHERE status=1  UNION SELECT * FROM destination WHERE status=1 AND featured=0 limit 0,15');
      
        return $q->result_array();   
    }
    function getpack()
    {
       // $this->db->limit(1);
        //$this->db->order_by("id", "desc"); 
        //$q = $this->db->get_where('destination',['status'=>'1','featured'=>'1']);
        
        $q = $this->db->query("SELECT * FROM packages WHERE status='active'  AND view=1  limit 0,9");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1
      
        return $q->result_array();   
    }
    
    function getoffer()
    {
        
        $q = $this->db->query("SELECT * FROM offers WHERE status='active'   UNION SELECT * FROM offers WHERE status='active' AND featured=0  limit 0,4");
      
        return $q->result_array(); 
    }
   
    function getpackbyid($id)
    {
          
      $q = $this->db->get_where('packages',['id'=>$id]);
       //echo $this->db->last_query(); 
      return  $q->result_array();
      
       // print_r($row);
        
    }
	
	function get_pack_detail()
    {       
      $q = $this->db->query("SELECT * FROM package_details");
        return $q->result_array();     
   }
    
    function getpacklist($dst,$bdgt,$chkin,$chkout)
    {
		$q = $this->db->query("SELECT  * FROM packages WHERE  (status='active' AND city='$dst' AND price <='$bdgt' AND start_date <= '$chkin' AND end_date >= '$chkout')");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1
		//echo $this->db->last_query(); 
    
        if($q->num_rows() >0)
        {  //$val=$q->result_array();
          //print_r($val);
			return $q->result_array();   
        }
        else
        {
		   return FALSE;	
		}   
    }
    
  function getpacklist1()
    {        
        $q = $this->db->query("SELECT * FROM packages WHERE status='active'  ORDER BY time DESC limit 0,6");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1      
        return $q->result_array();   
    }
  
  function getpacklist2($bud_val,$dur_val,$rat_val,$inc_val,$the_val,$cit_val,$chkin,$chkout)
    {     
	   $bud_val;
	   $dur_val;
	   $rat_val;
	   $inc_val;
	   $the_val;
	   $cit_val;
	   if($bud_val)   $s = " And (price<='".$bud_val ."') ";
	   if($dur_val)   $s .= " And (nights<='".$dur_val ."') ";
	   if($inc_val)   $s .= " And (transport='".$inc_val ."') ";
	   if($cit_val)   $s .= " And (city in (". substr($cit_val,0,strlen($cit_val)-1) .")";
	  
	
         echo "SELECT * FROM packages WHERE status='active' AND (start_date >= '$chkin' AND end_date <= '$chkout') $s"; die;

	   $sql_qry=$this->db->query("SELECT * FROM packages WHERE status='active' AND (start_date >= '$chkin1[1]' AND end_date <= '$chkout1[1]') $s");
            
		/*print_r($c1);		
		$dest1=explode("=",$dest);		
		$chkin1=explode("=",$chkin);		
		$chkout1=explode("=",$chkout);*/
		
		
		//$data=explode("",$c1);
		 //$arrlen=($array_len-1);
		//print_r($c1); die;
		//for($i=0; $i<=$arrlen; $i++)
//		{
//			$c12=$c1[$i];			
//			print_r($c12);			
//		}
        //$q = $this->db->query("SELECT * FROM packages WHERE status='active' && (city LIKE '$dest1[1]' OR start_date >= '$chkin1[1]' && end_date <= '$chkout1[1]')");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1      
        return $q->result();   
    }
    
    ///new functionality according new theme
    function getdestipl()
    {
        // $this->db->select('city','state','country');
        //$this->db->select('city','state','country');
          $q = $this->db->query("SELECT distinct city,state,country from destination where status = '1'");

        return $q->result_array();
    }
    function getdestiloc()
    {
//         $this->db->select('city','state','country');
       $q = $this->db->get_where('destination',['status'=>'1']);
        return $q->result_array();
    }
   function getdestibyname($name)
   {
       $q = $this->db->get_where('destination',['city'=>$name,'status'=>'1']);
        return $q->result_array();
   }
    function getdestidesc($name,$pid)
   {
       $q = $this->db->get_where('destination',['city'=>$name,'status'=>'1','id'=>$pid]);
        return $q->result_array();
   }
   function getoffbyid($id)
   {
     $q = $this->db->get_where('offers',['id'=>$id,'status'=>'active']);
    return $q->result_array();  
   }
   function getallpack()
   {
     $q = $this->db->query("SELECT * FROM packages WHERE status='active' AND view=1 ");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1
     return $q->result_array();     
   }
   
   function getcity($city)
   {
     $q = $this->db->get_where('city',['id'=>$city]);
    return $q->result_array();  
   }
   function getcityname($city)
   {   //echo $city;
          $val=$this->db->get_where('city', array('city' => $city));
          // echo $val->num_rows();die;
	     if($val->num_rows() >0)
	     {
		 return $val->result_array();
	     }
	     else
	     { 
	        return FALSE;
	      	    
		      
		 }
	     //$val=$q->result_array();
	     
	     /*
	     if($q->num_rows>0)
	     {
		      return $q->result_array();  
	   	
		 }
	     else{
		    $city_details['city_info']="Unfortunately, We don't have any readymade package available for criteria searched by you!"; 	     
		}*/
		
	   
     }
   
   
   function booking_record($id)
   {
   	 $pck_detls= $this->db->get_where('packages',['id'=>$id]);
   	  return  $pck_detls->result_array(); 
   	  
   	  
   	  
   	
   }
   function getcitynames()
   {
     $q = $this->db->query("SELECT * FROM city");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1      
   return $q->result_array();     
   }
}