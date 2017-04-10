<?php

class Pack_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function packeges() {
        $this->db->order_by('id', 'desc');
        $dest = $this->db->get('packages', 4);
        return $dest->result_array();
    }

    public function packeges_all($limit, $page) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $page);
        $dest = $this->db->get('packages');
        return $dest->result_array();
    }

    public function packeges_all_count() {
        $this->db->order_by('id', 'desc');
        $dest = $this->db->get('packages');
        return $dest->num_rows();
    }

    public function addpackform($form_data) {

        $this->db->insert('packages', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    public function pack_details($id) {
        $query = $this->db->get_where('packages', ['pack_id' => $id]);
        return $query->result_array();
    }

    function getdestibyid($id) {
        $q = $this->db->get_where('destination', array('id' => $id));

        return $q->result_array();
    }

    public function room_id($id) {
        $data = $this->db->get_where('room', array('room_id' => $id));
        return $data->result_array();
    }

    public function all_room($id) {
        $room = $this->db->get_where('room', array('hotel_id' => $id));
        return $room->result_array();
    }

    function all_destination() {

        $data = $this->db->get('destination');
        return $data->result_array();
    }

    function updesti($upid, $updata) {
        $this->db->where('id', $upid);
        $this->db->update('destination', $updata);
    }

    public function del_desti($id) {
        $this->db->delete('destination', array('id' => $id));
    }

    public function package_city() {
        $this->db->select('city');
        $this->db->from('city');
        $city = $this->db->get();
        return $city->result_array();
    }

    public function about_destination($id) {
        $data = $this->db->get_where('destination', array('id' => $id));
        return $data->result();
    }

    public function package_selection($asc, $bud, $trip) {


        if ($asc == "min_to_max") {
            $query = $this->db->query("select * from packages,city  where packages.city=city.id and packages.city='" . $trip . "' and  packages.price<='" . $bud . "'  order by packages.price asc");
            //echo $this->db->last_query();
            return $query->result_array();
        } else {
            $query = $this->db->query("select * from packages,city  where packages.city=city.id and packages.city='" . $trip . "' and  packages.price<='" . $bud . "' order by packages.price desc");
            // echo $this->db->last_query();  

            return $query->result_array();
        }
    }

    public function price_list_item($val, $dest) {
        /* echo "<script>alert('value in modal'+$val);</script>"; */

        $query = $this->db->query('select * from packages,city  where packages.city=city.id and packages.city=' . $dest . ' and  packages.price<=' . $val);

        // print_r($query); 

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function notify($notidata) {

        $this->db->insert('notification', $notidata);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    public function get() {

        $this->db->order_by('id', 'asc');
        $q = $this->db->get('packages');
        return $q->result_array();
    }

    public function similer_pack($city) {
        $data = $this->db->get('packages', array('city' => $city));
        return $data->result_array();
    }

    public function get_hotel() {
        $this->db->order_by('id', 'asc');
        $q = $this->db->get('hotel');
        return $q->result_array();
    }

    public function get_cabs() {
        $this->db->order_by('id', 'asc');
        $this->db->limit(6);
        $q = $this->db->get('cabs');
        return $q->result_array();
    }

    public function load_all() {
        $q = $this->db->get('cabs');
        $r = $q->result_array();

        return $q->result_array();
    }

    public function get_hotel_rc($id) {

        $this->db->order_by('id', 'asc');
        $q = $this->db->get_where('hotel', ['hotel_id' => $id]);
        return $q->result_array();
    }

    public function get_cab_rc($id) {

        $this->db->order_by('id', 'asc');
        $q = $this->db->get_where('cabs', ['cab_id' => $id]);
        return $q->result_array();
    }

    public function booking($id) {
        $book = $this->db->get_where('room', ['room_id' => $id]);
        return $book->result_array();
    }

    function getoffer($uid, $limit) {
        $this->db->limit($limit);
        $this->db->order_by("id", "desc");
        $q = $this->db->get_where('offers', ['uid' => $uid]);


        return $q->result_array();
    }

    function getpackbyid($id) {
        $q = $this->db->get_where('packages', ['pack_id' => $id]);
        return $q->result_array();
    }

    function uppack($id, $data) {
        $this->db->where('pack_id', $id);
        $this->db->update('packages', $data);

        // echo $this->db->affected_rows();die;		 
    }

    function getpackuid() {
        $q = $this->db->get('packages');
        return $q->result_array();
    }

    function getofferbyid($id) {
        $q = $this->db->get_where('offers', ['id' => $id]);
        return $q->result_array();
    }

    function getoffers() {

        $this->db->order_by("date", "desc");
        $q = $this->db->get_where('offers');


        return $q->result_array();
    }

    function offer_update($id, $data) {
        $this->db->where(['id' => $id]);
        $q = $this->db->update('offers', $data);
    }

    function customize($data) {
        $this->db->insert('customize_form', ['customize' => $data]);
        return true;
    }

    function offerform($data) {
        $this->db->insert('offers', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    function getpackbypid($id) {
        $q = $this->db->get_where('packages', ['id' => $id]);
        return $q->result_array();
    }

    function offtopack($id, $data) {
        $this->db->where(['id' => $id]);
        $q = $this->db->update('packages', $data);
    }

    function delpack($id) {
        $this->db->where(['pack_id' => $id]);
        $this->db->delete('packages');
    }

    function del_hotel($id) {
        $this->db->delete('hotel', array('id' => $id));
    }

    function deloffer($id) {
        $this->db->where(['id' => $id]);
        $this->db->delete('offers');
    }

    function getpack($lim) {
        $this->db->limit($lim);
        $this->db->order_by("id", "desc");
        $q = $this->db->get('packages');
        return $q->result_array();
    }

    function getofferfront($limit) {
        $this->db->limit($limit);
        $this->db->order_by("id", "desc");
        $q = $this->db->get('offers');

        return $q->result_array();
    }

    function uppackfprice($id, $pdata) {

        $this->db->where(['pack_id' => $id]);
        $this->db->update('packages', $pdata);
    }

    function frontof() {
        $this->db->select('*');
        //$this->db->where(['status'=>'active']);
        $this->db->from('offers');

        $this->db->join('packages', 'packages.id = offers.pack_id', 'inner');
        $this->db->where('offers.status', 'active');
        $r = $this->db->get();
        return $r->result_array();
    }

    function getoff() {
        $this->db->order_by("id", "desc");
        $q = $this->db->get('offers');
        return $q->result_array();
    }

    function activatepack() {
        $this->db->where('view', '2');
        $this->db->where('start_date', date('Y-m-d'));
        $q = $this->db->get('packages');
        return $q->result_array();
    }

    function uppackviewbyid($id) {
        $this->db->where(['id' => $id]);
        $this->db->update('packages', ['view' => '1']);
    }

    function getpackwithoff() {
        $this->db->where('offer_id >', '0');
        $q = $this->db->get('packages');
        return $q->result_array();
    }

    function getoffbyid($id) {
        $q = $this->db->get_where('offers', ['id' => $id]);
        return $q->result_array();
    }

    function getallasso($id) {
        if ($id == 1) {
            $this->db->order_by("id", "desc");
            $this->db->where('type', 'agent');
            // $this->db->or_where('type','Traveler');
            $q = $this->db->get('users');

            return $q->result_array();
        } else {
            $this->db->order_by("id", "desc");
            $this->db->where('type', 'traveler');
            // $this->db->or_where('type','Traveler');
            $q = $this->db->get('users');

            return $q->result_array();
        }
    }

    function assodelete($uid) {
        $this->db->where(['uid' => $uid]);
        $this->db->delete('users');
    }

    function assoupdate($uid, $udata) {
        $this->db->where(['uid' => $uid]);
        if ($udata) {
            $this->db->update('users', $udata);
            echo "<script>alert('User is updated!');</script>";
        }
    }

    function getdisputebyadminnid($id) {
        $this->db->order_by("id", "desc");
        $q = $this->db->get_where('dispute_messages', ['id' => $id, 'from_' => 'Admin']);
        return $q->result_array();
    }

    function getdispbyid($id) {
        $this->db->order_by("id", "desc");
        $q = $this->db->get_where('disput', ['id' => $id]);

        return $q->result_array();
    }

    function getassobyid($uid) {
        $q = $this->db->get_where('users', ['uid' => $uid]);

        return $q->result_array();
    }

    public function all_agent() {
        $a = $this->db->get_where('users', ['type' => 'agent']);
        $row = $a->num_rows();
        return $row;
    }

    function all_trav() {
        $a = $this->db->get_where('users', ['type' => 'traveler']);
        $row = $a->num_rows();
        return $row;
    }

    public function customize_request($data) {
        $this->db->insert('customize_form', $data);
    }

    public function delete_notify($id) {
        $this->db->delete('notification', array('id' => $id));
    }

    public function get_facilities() {
        $query = $this->db->get('pack_facilities');
        $rows = $query->result_array();
        $result = array();
        foreach ($rows as $row) {
            $result[$row['name']] = $row['icon'];
        }
        return $result;
    }

    /* Model for destinations */

    public function destinations() {
        $this->db->order_by('id', 'desc');
        $dest = $this->db->get('destination', 4);
        return $dest->result_array();
    }

    public function destinations_all($limit, $page) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $page);
        $dest = $this->db->get('destination');
        return $dest->result_array();
    }

    public function destinations_all_count() {
        $this->db->order_by('id', 'desc');
        $dest = $this->db->get('destination');
        return $dest->num_rows();
    }

    /* Model end for destinations */
    
}
