<?php

class Region_model extends CI_Model
{

    function __construct(){
        parent::__construct();
    }

    function row_delete($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function search_data($table, $column, $data)
    {
        $this->db->like($column, $data);
        $q = $this->db->get($table);
        return $q->result_array();
    }

    //pass id and get country name
    function getCountryValue($id = '')
    {

        $this->db->select('*');
        $this->db->from('country');
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        $q = $this->db->get();
        return $q->result_array();
    }

    //pass state id and get state name
    function getStateValue($id = '')
    {
        $this->db->select('state');
        $this->db->from('state');
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        $q = $this->db->get();


        return $q->result_array();
    }

    function getStateList($id = '')
    {
        $this->db->select('id, state');
        $this->db->from('state');
        if (!empty($id)) {
            $this->db->where('country_id', $id);
        }
        $q = $this->db->get();


        return $q->result_array();
    }

    function getCityList($id = '')
    {
        $this->db->select('id, city');
        $this->db->from('city');
        if (!empty($id)) {
            $this->db->where('state_id', $id);
        }
        $q = $this->db->get();


        return $q->result_array();
    }

    //pass city id and get city name

    function getCityValue($id = '')
    {
        $this->db->select('city');
        $this->db->from('city');
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        $q = $this->db->get();


        return $q->result_array();
    }


    function getcountry()
    {
        $q = $this->db->get('country');
        return $q->result_array();
    }

    function getCountryName($value)
    {
        // $this->db->select()->from->('country')->where(array('country'=>$value));

        $q = $this->db->get_where('country', ['country' => $value]);
        return $q->result_array();
    }

    function getStateName($value)
    {
        $q = $this->db->get_where('state', ['state' => $value]);
        return $q->result_array();
    }

    function getstate($country_id)

    {

        $q = $this->db->get_where('state', ['country_id' => $country_id]);

        return $q->result_array();

    }

    function upregion($state_id, $data)

    {

        $this->db->where(['state_id' => $state_id]);

        $this->db->update('region', $data);


    }

    function getregion($state_id)

    {

        $this->db->where(['state_id' => $state_id]);

        $this->db->get('region');

    }


    function get_icon($code)

    {
        $rslt = array();

        $data = $this->db->get_where('flight_image', array('flight_code' => $code));
        $result = $data->result_array();

        if (!empty($result))
            return $result;
        else {
            $rslt[] = array('fimage' => 'notfound.png');
            return $rslt;
        }


    }

    function get_flight_name($code)

    {
        $rslt = array();

        $data = $this->db->get_where('fligt_name', array('flight_code' => $code));
        $result = $data->result_array();

        if (!empty($result))
            return $result;
        else {

            return false;
        }


    }

    function getcidbyname($name)

    {

        $q = $this->db->get_where('country', ['country' => $name]);

        return $q->result_array();

    }

    function getcity($sid)

    {

        $q = $this->db->get_where('city', ['state_id' => $sid, 'status' => '1']);

        return $q->result_array();

    }

    public function insertcity($data)

    {


        $this->db->insert('city', $data);

        if ($this->db->affected_rows() == '1') {

            return TRUE;

        }


        return FALSE;

    }

    function getcitybyid($id)

    {

        $q = $this->db->get_where('city', array('id' => $id, 'status' => '1'));

        return $q->result_array();

    }


    function getstatebyid($id)

    {

        $q = $this->db->get_where('state', array('id' => $id));

        return $q->result_array();

    }

    function getcntbyid($id)

    {

        $q = $this->db->get_where('country', array('id' => $id));

        return $q->result_array();

    }


    function getcityall()

    {

        //$this->db->select('city');

        $q = $this->db->get_where('city', array('status' => '1'));

        return $q->result_array();

    }

    function getcityidbyname($name)

    {

        $q = $this->db->get_where('city', ['status' => '1', 'city' => $name]);

        return $q->result_array();

    }

    function getstatebyname()

    {

        $q = $this->db->get_where('state', ['state' => $name]);

        return $q->result_array();

    }


    function getairportcode($param, $domestic)

    {
        if ($domestic == 'true') {
            $query = $this->db->query("SELECT distinct(CODE),CITYAIRPORT FROM airport_code WHERE (CITYAIRPORT LIKE '" . $param . "%' or CODE LIKE '" . $param . "%' ) and COUNTRY='India'");
            //echo $this->db->last_query();
            return $query->result_array();
        } else {

            $query = $this->db->query("SELECT distinct(CODE),CITYAIRPORT,COUNTRY FROM airport_code WHERE CITYAIRPORT LIKE '" . $param . "%' or CODE LIKE '" . $param . "%' or COUNTRY LIKE '" . $param . "%'");
            //echo $this->db->last_query();
            return $query->result_array();
        }

    }


    public function insertcityHotels($data)

    {


        $this->db->insert('hotel_citys', $data);

        if ($this->db->affected_rows() == '1') {

            return TRUE;

        }


        return FALSE;

    }


    function getHotelCitys($param, $domestic)

    {
        if ($domestic == 'true') {
            $query = $this->db->query("SELECT city,state FROM hotel_citys WHERE (city LIKE '" . $param . "%' or state LIKE '" . $param . "%' ) and country='India'");
            //echo $this->db->last_query();
            return $query->result_array();
        } else {

            $query = $this->db->query("SELECT city,state,country FROM hotel_citys WHERE city LIKE '" . $param . "%' or state LIKE '" . $param . "%' or country LIKE '" . $param . "%'");
            //echo $this->db->last_query();
            return $query->result_array();
        }

    }

    public function insertcityBus($data)

    {


        $this->db->insert('bus_citys', $data);

        if ($this->db->affected_rows() == '1') {

            return TRUE;

        }


        return FALSE;

    }

    function getCitysBus($param)

    {

        $query = $this->db->query("SELECT OriginId,OriginName FROM bus_citys WHERE (OriginName LIKE '" . $param . "%' or OriginId LIKE '" . $param . "%' )");
        //echo $this->db->last_query();
        return $query->result_array();


    }

    function get_data($table, $data)
    {
        $query = $this->db->get_where($table, $data);
        /* print_r($this->db->last_query());
         exit;*/
        return $query->result_array();
    }

    function new_agent($data = null)
    {

        $this->db->insert('users', $data);
        if ($this->db->affected_rows() == '1') {

            return TRUE;

        }
        return FALSE;
    }

    function add_commission($condition, $data)
    {
        $this->db->where($condition);
        return $this->db->update('agent_commision_markup', $data);
    }

    function add_balance($id = null, $data = null)
    {

        $this->db->where('uid', $id);
        $this->db->update('users', ['BALANCE' => $data['BALANCE']]);
        $insertDat = array();
        $insertDat['user_id'] = $id;
        $insertDat['AGENTCODE'] = $id;
        $insertDat['METHODID'] = 0;
        $insertDat['BALANCE'] = $data['current'];
        $insertDat['CREDITAMOUNT'] = $data['updateBalance'];
        $insertDat['TOTALAMOUNT'] = $data['BALANCE'];
        $insertDat['REASON'] = $data['reasion'];
        $insertDat['created'] = date("Y-m-d");
        $this->db->insert('dmr_transaction', $insertDat);
        return TRUE;
    }

    function insert_data($table, $table_data)
    {
        $this->db->insert($table, $table_data);
        return true;
    }

    function show()
    {
        $q = $this->db->get('packages');
        return $q->result_array();
    }

    function get_data_table($table)
    {
        $this->db->order_by("id", "DESC");
        $q = $this->db->get($table);
        return $q->result_array();
    }

    function get_query_data($query)
    {
        $q = $this->db->query($query);
        return $q->result_array();
    }


    public function getPackageBooking($limit, $pagedata)
    {


        $this->db->select();
        $this->db->from('package_booking');
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();
        return $data->result_array();
    }
    
    public function getPackageBookingByUser($uid, $limit, $pagedata)
    {


        $this->db->select();
        $this->db->from('package_booking');
        $this->db->where('user_id', $uid);
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();
        return $data->result_array();
    }

    /* Function of flight booking */
    public function getFlightBooking($limit, $pagedata)
    {


        $this->db->select();
        $this->db->from('flight_bookings');
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();

        return $data->result_array();
    }
    /* Function end of flight booking*/

    /* Function of Bus booking */
    public function getBusesBooking($limit, $pagedata)
    {


        $this->db->select();
        $this->db->from('bus_bookings');
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();

        return $data->result_array();
    }
    /* Function end of Bus booking*/

    /* Function of Hotels booking */
    public function getHotelsBooking($limit, $pagedata)
    {


        $this->db->select();
        $this->db->from('hotel_bookings');
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();

        return $data->result_array();
    }
    /* Function end of Hotels booking*/


}

