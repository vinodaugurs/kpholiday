<?php

class User_model extends CI_Model
{


    public function get($user_uid = null)
    {

        $q = $this->db->get_where('users', array('email' => $user_uid['email'], 'password' => $user_uid['password']));

        if ($q->num_rows() > 0) {

            return $q->result_array();

        } else {

            return FALSE;

        }

    }

    //when new user register
    public function register_new_user($data)
    {

        $this->db->insert('users', $data);
        return true;
    }

    public function get_table_data($column_name, $table_name)
    {
        $this->db->select($column_name);
        $this->db->from($table_name);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function get_cancel_booking($table, $condition, $limit, $pageData)
    {
        $this->db->select()->from($table)->where($condition)->limit($pageData, $limit)->order_by('id', 'DESC');
        $q = $this->db->get();

        return $q->result_array();
    }


    //help to get user wallet amount
    public function user_wallet_amout($uid)
    {
        $this->db->select('BALANCE')->from('users')->where(array('uid' => $uid));
        $q = $this->db->get();
        return $q->result_array();
    }

    public function user_wallet_amout_update($balance, $id)
    {
        $this->db->where('uid', $id);
        return $this->db->update('users', array('BALANCE' => $balance));

    }

    public function failed_booking_data($uid)
    {
        $this->db->select()->from('booking_failed')->where(array('uid' => $uid))->order_by('id', 'DESC');
        $q = $this->db->get();
        return $q->result_array();
    }

    //pass id and get data

    public function basBookingData($id)
    {
        $this->db->select()->from('bus_bookings')->where(array('id' => $id));
        $q = $this->db->get();
        return $q->result_array();
    }

    public function hotelBookingData($id)
    {
        $this->db->select()->from('hotel_bookings')->where(array('id' => $id));
        $q = $this->db->get();
        return $q->result_array();
    }

//help to get total no of recored any table
    public function get_total_record($table, $condition)
    {
        $q = $this->db->get_where($table, $condition);
        return $q->num_rows();
    }


    //help to find booking detail and pass user id
    public function getBookingDetail($data, $limit, $pagedata)
    {


        $this->db->select();
        $this->db->from('flight_bookings');
        $this->db->where($data);
        $this->db->limit($pagedata, $limit);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get();

        return $data->result_array();
    }


    public function get_hotel_booking($id, $limit, $offdata)
    {

        $this->db->select()->from('hotel_bookings')->where($id)->limit($offdata, $limit)->order_by('id', 'DESC');
        $q = $this->db->get();

        return $q->result_array();
    }


    public function puyuMoney($data, $limit, $offset)
    {
        $this->db->select()->from('PayUMoney_transaction')->where($data)->limit($offset, $limit)->order_by('id', 'DESC');
        $q = $this->db->get();

        return $q->result_array();
    }

    public function get_bus_booking($data, $limit, $pageData)
    {
        $this->db->select()->from('bus_bookings')->where($data)->limit($pageData, $limit)->order_by('id', 'DESC');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function check_email($email)
    {


        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email', $email);
        $check = $this->db->get();
        if ($check->num_rows() > 0) {
            return FALSE;
        }
        return TRUE;
    }

    public function check_username($email)
    {


        $this->db->select('user_name');
        $this->db->from('users');
        $this->db->where('user_name', $email);
        $check = $this->db->get();
        if ($check->num_rows() > 0) {
            return FALSE;
        }
        return TRUE;
    }

    public function user_uid($id)
    {
        $data = $this->db->get_where('users', array('uid' => $id));
        return $data->result_array();

    }

    public function login_detail($uid)
    {
        $data = $this->db->get_where('users', ['uid' => $uid]);
        return $data->result_array();
    }

    //user profile data update
    public function register_update($data, $id)
    {
        // echo $id;
        // print_r($data);
        $this->db->where('uid', $id);
        return $this->db->update('users', $data);

    }


    /*Package process begin here */
    public function all_package($c)
    {
        $city = $this->db->get_where('city', ['city' => $c]);
        $pack = $city->result_array();

        if ($pack[0]['id']) {
            $detail = $this->db->get_where('packages', array('city' => $pack[0]['id']));
            return $detail->result_array();
        } else {
            return false;
        }
    }

    public function destination()
    {
        $query = $this->db->get('destination', 0, 4);
        return $query->result_array();
    }


    /*Package process End here */
    public function destinations()
    {

        $dest = $this->db->get('destination', 4);
        return $dest->result_array();
    }
    /* model for view all destinations */
    public  function destinations_all($limit, $page)
  {   $this->db->order_by('id','desc') ;    $this->db->limit($limit, $page);
    $dest=$this->db->get('destination');
    return $dest->result_array();
  }
   public  function destinations_all_count()
  {   $this->db->order_by('id','desc') ;
    $dest=$this->db->get('destination');
    return $dest->num_rows(); 
  }
/* model end for view al destinations */
    public function hotel_by_city($city)
    {
        $city_id = $this->db->get_where('city', ['city' => $city]);
        $c = $city_id->result_array();

        $hotel_list = $this->db->get_where('hotel', ['city' => $c[0]['id']]);
        if ($hotel_list->num_rows() > 0) {
            return $hotel_list->result_array();
        } else {
            return false;
        }

    }

    public function city($city)
    {
        $this->db->distinct();
        $av_city = $this->db->get_where('city', ['id' => $city]);

        return $av_city->result_array();

    }

    public function get_hotel($id)
    {

        $this->db->select('id');
        $this->db->from('city');
        $this->db->where('city', $id);
        $city = $this->db->get();
        $c = $city->result_array();
        $find = $c[0]['id'];
        $this->db->select('rating');
        $this->db->from('hotel');
        $this->db->where(['city' => $find]);
        $hotel = $this->db->get();

        if ($hotel->num_rows() > 0) {
            return $hotel->result_array();

        }
    }


    public function get_all_hotel($data)
    {
        $this->db->select('hotel_id,hotel_name');
        $this->db->from('hotel');
        $this->db->where(['rating' => $data]);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function hotel_in_city()
    {
        $country = 1;
        $hotel = $this->db->get_where('hotel', ['country' => $country]);

        return $hotel->result_array();

    }


    public function get_domestic_hotel()
    {
        $city = $this->input->get('city');
        $star = $this->input->get('star');
        $av_hotel = $this->input->get('av_hotel');

        if ($star == 0) {
            $this->db->select('id');
            $this->db->from('city');
            $this->db->where('city', $city);
            $city = $this->db->get();
            $c = $city->result_array();
            $find = $c[0]['id'];

            $query = $this->db->get_where('hotel', ['city' => $find]);
            return $query->result_array();
        }

        if ($star != 0) {
            $query = $this->db->get_where('hotel', ['hotel_id' => $av_hotel]);
            return $query->result_array();
        }


    }

    public function get_travel_hotel($data)
    {
        $city = $data['city'];

        $this->db->select('id');
        $this->db->from('city');
        $this->db->where('city', $city);
        $city = $this->db->get();
        $c = $city->result_array();
        $find = $c[0]['id'];

        $query = $this->db->get_where('hotel', ['city' => $find]);
        return $query->result_array();


    }

    function customize()
    {
        $data = $this->input->get('cus_form');
        $this->db->set('customize', $data);
        $this->db->insert('customize_form');
        return true;
    }

    public function custom_notify($notidata)
    {

        $this->db->insert('notification', $notidata);


    }

    public function hotel_view()
    {
        $query = $this->db->get('hotel');
        if ($query->num_rows() > 1) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function hotelid()
    {
        $hotel = $this->db->query('select * from hotel');
        return $hotel->result_array();


    }

    public function add_room($data)
    {
        $this->db->insert('room', $data);
    }

    public function remove_room($id)
    {
        $this->db->delete('room', array('room_id' => $id));
    }

    public function update_room($data, $id)
    {
        $this->db->where('room_id', $id);
        $this->db->update('room', $data);
    }

    public function room($id)
    {

        $query = $this->db->get_where('room', ['hotel_id' => $id]);

        return $query->result_array();
    }

    function get_all($uid)
    {
        $query = $this->db->get_where('users', ['uid' => $uid]);
        return $query->result_array();
    }

    public function chkuid()
    {
        $this->db->order_by('id', 'desc');
        $q = $this->db->get('users');

        return $q->result_array();
    }


    function getdestibyuid()
    {
        $q = $this->db->get('destination');
        return $q->result_array();
    }

    function getcitynames()
    {
        $q = $this->db->query("SELECT * FROM city");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1
        return $q->result_array();
    }

    function gethotelnames()
    {
        $q = $this->db->query("SELECT * FROM hotel");//UNION SELECT * FROM packages WHERE status='active' AND featured=0  AND view=1
        return $q->result_array();
    }


    function star_rating($rating)
    {
        $data = $this->db->get_where('hotel', ['rating' => $rating]);

        return $data->result_array();
    }

    public function search_pack($data)
    {
        $city = $this->db->get_where('city', ['city' => $data['destination']]);
        $city_find = $city->result_array();
        if ($city_find) {
            $ct = $city_find[0]['id'];

            $package = $this->db->get_where('packages', ['city' => $ct]);
            return $package->result_array();
        } else {
            return FALSE;
        }


    }


    /* public function hotel_price($data)
     {
        $min=$data[0];
        $max=$data[1];

       $list= $this->db->query("select * from hotel where price between ".$min." and ".$max);
     // echo  $this->db->last_query();
         if($list->num_rows()>0){
         return $list->result_array();
          }
          else
          {

        return FALSE;
      }

     }
  */
    public function pack_price($data)
    {
        $min = $data[0];
        $max = $data[1];

        $list = $this->db->query("select * from packages where price between " . $min . " and " . $max);
        // echo  $this->db->last_query();
        if ($list->num_rows() > 0) {
            return $list->result_array();
        } else {

            return FALSE;
        }

    }

    public function sort($hotel)
    {
        $query = $this->db->get_where('hotel', ['hotel_name' => $hotel]);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }


    }

    public function find_cabs($c)
    {
        $city = $this->db->get_where('city', ['city' => $c]);
        $cab = $city->result_array();

        $find = $this->db->get_where('cabs', ['city' => $cab[0]['id']]);

        if ($find->num_rows() > 0) {

            return $find->result_array();
        } else {
            return FALSE;
        }
    }


    public function pack_rating($id)
    {
        $query = $this->db->get_where('packages', ['pack_rating' => $id]);
        return $query->result_array();
    }


    public function offer_get()
    {
        $data = $this->db->get('offers');
        return $data->result_array();
    }

    public function geet_pack($id)
    {
        $data = $this->db->get_where('packages', ['pack_id' => $id]);
        return $data->result_array();
    }

    public function register_user($data)
    {
        $result = $this->db->insert('users', $data);
        if ($result) {
            #$id = $this->db->insert_id();
            return TRUE;
        } else {
            return FALSE;
        }
    }


    function getsmtp()
    {
        $q = $this->db->get_where('admin_setting', ['id' => '1']);
        return $q->result_array();

    }

    public function hotel_price_list($data)
    {
        $min = $data[0];
        $max = $data[1];

        $list = $this->db->query("select * from hotel where price between " . $min . " and " . $max);
        // echo  $this->db->last_query();
        if ($list->num_rows() > 0) {
            return $list->result_array();
        } else {

            return FALSE;
        }


    }


    public function find_hotel($c)
    {
        $city = $this->db->get_where('city', ['city' => $c]);
        $pack = $city->result_array();


        $detail = $this->db->get_where('hotel', array('city' => $pack[0]['id']));
        return $detail->result_array();
    }

    public function find_cab($c)
    {
        $city = $this->db->get_where('city', ['city' => $c]);
        $pack = $city->result_array();


        $detail = $this->db->get_where('cabs', array('city' => $pack[0]['id']));

        return $detail->result_array();
    }


    public function DMR_update_balance($balance, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', array('BALANCE' => $balance));

    }

    public function DMR_get_balance($id)
    {
        $data = $this->db->get_where('users', array('id' => $id));
        return $data->row();

    }

    public function DMR_add_transaction($data)
    {
        return $this->db->insert('dmr_transaction', $data);

    }

    public function DMR_get_transaction($GIREFID, $METHODID = '')
    {
        $conditions = array();
        $conditions['GIREFID'] = $GIREFID;
        if ($METHODID != '')
            $conditions['METHODID'] = $METHODID;
        $data = $this->db->get_where('dmr_transaction', $conditions);
        // echo $this->db->last_query();
        return $data->row();

    }

    public function savePayUMoney($data)
    {
        $this->db->insert('PayUMoney_transaction', $data);
        return true;
    }

    public function saveFlightBooking($data)
    {
        if ($this->db->insert('flight_bookings', $data))
            return true;
        else
            return false;
    }

    public function saveHotelBooking($data)
    {
        $this->db->insert('hotel_bookings', $data);
        return true;
    }

    function add_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function update_table_data($table, $condition)
    {
        $data = array('status' => 'Booking Cancel');
        $this->db->where($condition);
        $this->db->update($table, $data);
    }


    function update_data($table, $data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    function get_data($table, $data)
    {
        $query = $this->db->get_where($table, $data);
        /* print_r($this->db->last_query());
         exit;*/
        return $query->result_array();
    }

    function ticket_status($tranctionid)
    {
        $this->db->select('id')->from('canceled_tickets')->where('HermesPNR', $tranctionid);
        $q = $this->db->get();
        return $q->result_array();
    }

//forget work start 

    function forget($email)
    {
        $this->db->select()->from('users')->where('email', $email);
        $q = $this->db->get();
        return $q->result_array();
    }

    function forget_activeRecord($data, $uid)
    {
        $updateData = array('activecode' => $data);
        $this->db->where('uid', $uid);
        $this->db->update('users', $updateData);
    }

    function check_active_record($data)
    {
        $this->db->select('uid')->from('users')->where('activecode', $data);
        $q = $this->db->get();
        return $q->result_array();
    }

    function passwordChange($uid, $data)
    {
        $value = array('password' => $data, 'activecode' => '');
        $this->db->where('uid', $uid);
        $this->db->update('users', $value);
    }

    function updatePassword($uid, $oldPass, $newPass)
    {
        $value = array('password' => $newPass, 'activecode' => '');
        $this->db->where(array('uid'=>$uid, 'password'=>$oldPass));
        return $this->db->update('users', $value);
    }

//forget work end

    function get_city($data)
    {
        $this->db->like('state', $data);
        $q = $this->db->get('state');
        return $q->result_array();
    }

    public function get_search_data($table, $coloumn, $data)
    {
        $this->db->like($coloumn, $data);
        $q = $this->db->get($table);
        return $q->result_array();
    }
}    