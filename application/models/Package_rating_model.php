<?php

class Package_rating_model extends CI_Model
{

    function __construct(){
        parent::__construct();
    }   

    public function save($data){
        $this->db->insert('package_rating', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    public function getAllReview($pack_id){
        
        $this->db->select("*");
        $this->db->from('package_rating');
        $this->db->where("pack_id", $pack_id);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();
        return $data->result_array();
    }
    
    public function getReviewAvg($pack_id){
        
        $this->db->select("AVG(rating_average) AS rating_average, AVG(sleep) AS sleep, AVG(location) AS location, AVG(service) AS service, AVG(clearness) AS clearness, AVG(rooms) AS rooms");
        $this->db->from('package_rating');
        $this->db->where("pack_id", $pack_id);
        $data = $this->db->get();
        $row = $data->row_array();
        return $row;
    }
    
    public function getTotalRating($pack_id, $numOfRating){
        
        $this->db->select("COUNT(id) AS total");
        $this->db->from('package_rating');
        $this->db->where(array("pack_id"=>$pack_id, "rating_average"=>$numOfRating));
        $data = $this->db->get();
        $row = $data->row_array();
        return $row["total"];
    }
    
    public function checkAlreadyDoneReview($pack_id, $user_id){
        
        $this->db->select("*");
        $this->db->from('package_rating');
        $this->db->where(array("pack_id"=>$pack_id, "user_id"=>$user_id));
        $data = $this->db->get();
        return $data->num_rows();
    }

}

