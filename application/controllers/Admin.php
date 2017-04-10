<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
        //     $this->load->model('admin_model');
        //   $this->load->model('tour_model');
        // $this->load->model('notify_model');

        //  $this->load->model('region_model');
        // $this->load->model('pack_model');
        $this->load->library('upload');
        $this->load->library('image_lib');

        $user_uid = $this->session->userdata('auid');
//$this->load->model ('user_model');
        //    $data=$this->user_model->get(['uid'=>$user_uid]);
//print_r($data);
//checking for active or not

    }

    public function user()
    {

        if (empty($_GET['id'])) {
            $this->load->view('admin/associate_view');
        } else {
            echo $data['associate_id'] = $_GET['id'];
            $this->load->view('admin/single_associate_view', $data);

        }


    }


    public function traveler_view()
    {
        $this->load->view('admin/traveler_view');
    }


    public function traveler()
    {
        $this->load->view('admin/traveler_view');
    }

    public function profile()
    {
        if (!isset($_GET['id'])) {
            redirect('index.php/dashboard');  //print_r($_POST['uid']);
        } else {

            // echo $_GET['id'];
            $getid['myid'] = $_GET['id'];
            $this->load->view('admin/profile_view', $getid);
        }


    }

    public function editprofile()
    {

    }


    public function notification()
    {


        $this->load->view('admin/notify_view');
        //print_r($data);


    }

    public function asso_approval()
    {


        if ($this->input->get_post('upuid')) {

            $apruid = $this->input->get_post('upuid');
            $this->admin_model->assoapr($apruid);
            $this->load->view('admin/asso_approval_view');
        } elseif ($this->input->get_post('deluid')) {

            $deluid = $this->input->get_post('deluid');
            $this->admin_model->assodec($deluid);

            $this->load->view('admin/asso_approval_view');
        } else {
            $this->load->view('admin/asso_approval_view');
        }
    }

    function package_apr()
    {

    }


    function edit_asso()
    {

        if ($this->input->get_post('id')) {
            if ($this->input->get_post('deluid')) {
                $duid = $this->input->get_post('deluid');
                $this->pack_model->assodelete($duid);

                redirect(base_url() . 'index.php/dashboard/agent');

            }
            if ($this->input->get_post('upuid')) {

                $udata = array(
                    'uid' => $this->input->get_post('uid'),
                    'user_name' => $this->input->get_post('user_name'),

                    'email' => $this->input->get_post('email'),
                    'type' => $this->input->get_post('type'),
                    'phone' => $this->input->get_post('phone'),
                    // 'country'=> $this->input->get_post('country'),
                    // 'state'=> $this->input->get_post('state'),
                    // 'city'=> $this->input->get_post('city'),
                    'address' => $this->input->get_post('address'),

                    'activecode' => $this->input->get_post('active_code'),
                );

                $uid = $this->input->get_post('upuid');
                // print_r($uid);
                $this->pack_model->assoupdate($uid, $udata);
                //$this->load->view('admin/editasso_view',$eid);
            }

            $eid['assouid'] = $this->input->get_post('id');
            $this->load->view('admin/editasso_view', $eid);


        }


    }

    function suspend()
    {
        echo $this->input->get_post('id');
        if ($this->input->get_post('id')) {
            if ($this->input->get_post('sus') === '1') {
                $sid = $this->input->get_post('id');
                $this->admin_model->assorevsuspend($sid);
                redirect(base_url() . 'index.php/admin/user');
            }
            $sid = $this->input->get_post('id');
            $this->admin_model->assosuspend($sid);
            redirect(base_url() . 'index.php/admin/user');
        }

    }


    public function package()
    {
        $a = $this->input->get_post('id');
        if ($a != NULL) {
            $data['pck_id'] = $a;
            $this->load->view('admin/single_package_view', $data);
        } else {
            $this->load->view('admin/package_view');
        }

    }

    public function pack_approve()
    {
        if ($this->input->get_post('pid')) {
            if ($this->input->get_post('sus') === '0') {
                $pid = $this->input->get_post('pid');

                $reason = $this->input->get_post($pid . 'reason');


                $this->admin_model->packapr($pid, $reason);


                //mail ,notification
                //
                //
                //
                echo "<script>alert('Activated Package!');document.location = 'package';</script>";
                //redirect(base_url().'index.php/admin/package');
            }
            if ($this->input->get_post('sus') === '1') {
                $pid = $this->input->get_post('pid');
                $reason = $this->input->get_post($pid . 'reason');


                $this->admin_model->packdisapr($pid, $reason);
                //mail ,notification

                echo "<script>alert('Suspended Package!');document.location = 'package';</script>";
                //redirect(base_url().'index.php/admin/package');

            }

        }
    }

    public function pack_edit()
    {

        if ($this->input->get_post('pid')) {
            $pid['pid'] = $this->input->get_post('pid');
            if ($this->input->get_post('uppid')) {

                $this->image_1 = "";
                if (@$_FILES['image_1']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_1');
                    $this->form_validation->set_rules('image_1', 'image_1', 'callback_check_file[image_1]');
                }

                $this->image_2 = "";
                if (@$_FILES['image_2']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_2');
                    $this->form_validation->set_rules('image_2', 'image_2', 'callback_check_file[image_2]');
                }
                $this->image_3 = "";
                if (@$_FILES['image_3']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_3');
                    $this->form_validation->set_rules('image_3', 'image_3', 'callback_check_file[image_3]');
                }
                $this->image_4 = "";
                if (@$_FILES['image_4']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_4');
                    $this->form_validation->set_rules('image_4', 'image_4', 'callback_check_file[image_4]');
                }
                $this->image_5 = "";
                if (@$_FILES['image_5']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_5');
                    $this->form_validation->set_rules('image_5', 'image_5', 'callback_check_file[image_5]');
                }
                $this->image_6 = "";
                if (@$_FILES['image_6']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_6');
                    $this->form_validation->set_rules('image_6', 'image_6', 'callback_check_file[image_6]');
                }
                $this->image_7 = "";
                if (@$_FILES['image_7']['name'] != "") {
                    $config['upload_path'] = './upload/package/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '5048';
                    $this->upload_file($config, 'image_7');
                    $this->form_validation->set_rules('image_7', 'image_7', 'callback_check_file[image_7]');
                }

                $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
                if ($this->form_validation->run() == FALSE) // validation hasn't been passed
                {
                    //$this->load->view('associate/addport_view');

                    $this->load->view('admin/packedit_view', $pid);
                } else {
                    $pimg = array();
                    $img = $this->admin_model->getpackbyid($this->input->get_post('uppid'));
                    for ($j = 1; $j < 8; $j++) {
                        $im[1] = @$this->image_1;
                        $im[2] = @$this->image_2;
                        $im[3] = @$this->image_3;
                        $im[4] = @$this->image_4;
                        $im[5] = @$this->image_5;
                        $im[6] = @$this->image_6;
                        $im[7] = @$this->image_7;
                        if ($im[$j] != "") {

                            $pimg[$j] = $im[$j];

                        } else {
                            $pimg[$j] = $img[0]['image_' . $j];
                        }


                    }
                    $uppkdata = array(
                        'image_1' => $pimg[1],
                        'image_2' => $pimg[2],
                        'image_3' => $pimg[3],
                        'image_4' => $pimg[4],
                        'image_5' => $pimg[5],
                        'image_6' => $pimg[6],
                        'image_7' => $pimg[7]
                    );

                    /*
                    $uppkdata = array(  
                                                'image_1' => @$this->image_1,
					        'image_2' => @$this->image_2,
					      	'image_3' => @$this->image_3,
					      	'image_4' => @$this->image_4,
					      	'image_5' => @$this->image_5,
					     	'image_6' => @$this->image_6,
					      	'image_7' => @$this->image_7
                            );
                   
                    */
                    $this->admin_model->uppack($pid['pid'], $uppkdata);
                    redirect(base_url() . 'index.php/admin/pack_edit?pid=' . $pid['pid']);
                    //$this->load->view('admin/packedit_view',$pid);
                }

                // build array for the model


                // $this->admin_model->uppack($pid['pid'],$uppkdata);
                // redirect(base_url().'index.php/admin/pack_edit?pid='.$pid['pid']);


                $uppkdata = array(
                    'pack_name' => $this->input->post('pack_name'),
                    'price' => $this->input->post('price'),
                    'transport' => $this->input->post('transport'),
                    'stay_info' => $this->input->post('stay_info'),
                    'details' => $this->input->post('details'),
                    'special_places' => $this->input->post('stay_info'),
                    'status' => $this->input->post('status'),
                    'halts' => $this->input->post('halts'),
                    'tour_highlight' => $this->input->post('tour_highlight')


                );
                $this->admin_model->uppack($pid['pid'], $uppkdata);
                redirect(base_url() . 'index.php/admin/pack_edit?pid=' . $pid['pid']);
            }

            // $this->admin_model->packapr($pid);
            $this->load->view('admin/packedit_view', $pid);
        }

    }

    public function check_file($field, $field_value)
    {
        if (isset($this->custom_errors[$field_value])) {
            $this->form_validation->set_message('check_file', $this->custom_errors[$field_value]);
            unset($this->custom_errors[$field_value]);
            return FALSE;
        }
        return TRUE;
    }

    function upload_file($config, $fieldname)
    {
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload($fieldname);
        $error = $this->upload->display_errors();
        if (empty($error)) {
            $data = $this->upload->data();
            $this->$fieldname = $data['file_name'];
        } else {
            $this->custom_errors[$fieldname] = $error;
        }
    }

    //check for ad


    public function documents()
    {
        $this->load->view('admin/document_view');
    }

    public function doc_check()
    {
        $uid = $this->input->get_post('uid');
        $apr = $this->input->get_post('apr');
        $del = $this->input->get_post('del');
        if ($apr === '1') {
            $st = $this->admin_model->getdoc($uid);
            if ($st[0]['status'] === '1') {
                $this->admin_model->docapr($uid, '0');
                redirect(base_url() . 'index.php/admin/documents');
            } else {
                $this->admin_model->docapr($uid, '1');
                redirect(base_url() . 'index.php/admin/documents');
            }
        }

        if ($del === '1') {
            $this->admin_model->docdel($uid);
            redirect(base_url() . 'index.php/admin/documents');
        }

    }


    public function place_request()
    {
        $this->load->view('admin/destination_view');
    }

    function dest_check()
    {
        $id = $this->input->get_post('id');
        $apr = $this->input->get_post('apr');
        $del = $this->input->get_post('del');
        $uid = $this->input->get_post('uid');

        if ($apr === '1') {
            // $stcheck = $this->admin_model->getdeststatus($id,$uid);
            // if ($stcheck)
            //  {
            //    $this->admin_model->updest($id,'0');
            //    $this->load->view('admin/destination_view');
            //  }
            $this->admin_model->updest($id, '1');
            $this->load->view('admin/destination_view');
        } elseif ($del === '1') {
            $this->admin_model->deldest($id);
            $this->load->view('admin/destination_view');
        }
    }

    function dispute()
    {
        $dispid = $this->input->get_post('dispid');
        $comid = $this->input->get_post('comid');
        $makecomid = $this->input->get_post('makecomid');
        $editid = $this->input->get_post('editid');
        $delid = $this->input->get_post('delid');
        $upid = $this->input->get_post('upid');
        $apr = $this->input->get_post('apr');
        if ($dispid) {
            $id['did'] = $dispid;
            $this->load->view('admin/comments_view', $id);
        } elseif ($comid) {
            $cid['comid'] = $comid;
            $this->load->view('admin/comment_view', $cid);

        } elseif ($makecomid) {

            $this->form_validation->set_rules('message', 'message', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $cid['comid'] = $makecomid;
                $this->load->view('admin/comment_view', $cid);
            } else {
                $data = array(
                    'message' => @$this->input->post('message'),
                    'from_' => 'Admin',
                    'disp_id' => $makecomid,
                    'date' => date("Y-m-d")


                );

                $this->admin_model->incomment($data);
                $cid['comid'] = $makecomid;
                $this->load->view('admin/comment_view', $cid);

            }


        } elseif ($editid) {
            $editdid['editid'] = $editid;


            if ($upid) {

                $udata = array
                ('message' => @$this->input->post('msg'));
                $this->admin_model->upadcom($upid, $udata);


            }
            $this->load->view('admin/edit_view', $editdid);
        } elseif ($delid) {
            $dcom['comid'] = @$this->input->post('dcomid');
            $this->admin_model->delcom($delid);
            $this->load->view('admin/comment_view', $dcom);

        } elseif ($apr === '1') {
            $sts = $this->admin_model->getdispbyid(@$this->input->post('disputeid'));
            if ($sts[0]['status'] === '0') {
                $st = '1';
            } else {
                $st = '0';
            }
            $this->admin_model->updatedispute(@$this->input->post('disputeid'), $st);

            $this->load->view('admin/dispute_view');
        } elseif (@$this->input->post('delmeid')) {
            $this->admin_model->deldispbyid(@$this->input->post('delmeid'));
            $this->load->view('admin/dispute_view');
        } else {
            $this->load->view('admin/dispute_view');
        }


    }

    function reward()
    {
        $this->load->view('admin/reward_view');
    }


    function email()
    {
        $mxallmail = $this->admin_model->allmailcount();
        //echo $mxallmail;
        $mxassomail = $this->admin_model->allassocount();
        $mxtrvmail = $this->admin_model->alltrvcount();
        //$this->output->enable_profiler(TRUE);

        $reci = $this->input->post('recipient');
        $mailmsg = $this->input->post('mailmessage');


        $this->form_validation->set_rules('recipient', 'recipient', 'required');

        $this->form_validation->set_rules('mailmessage', 'Announcement Body', 'required');


        $this->form_validation->set_error_delimiters('<br /><span class="error" ><font color="red">', '</font></span>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/email_view');
        } else {

            require 'mail/PHPMailerAutoload.php';
            if ($reci === '12') {
                $allmail = $this->admin_model->allmail();
                $i = 0;
                foreach ($allmail as $vemail) {

                    $sendreci['r' . $i] = $this->maassmail($vemail['email'], $vemail['user_name'], $mailmsg);
                    $sendreci['c'] = $i;
                    $i++;
                    //echo $vemail['email']."<br>";
                }
                // echo "count".$i;
            }
            if ($reci === '2') {
                $i = 0;
                $allmail = $this->admin_model->allassomail();

                foreach ($allmail as $vemail) {

                    $sendreci['r' . $i] = $this->maassmail($vemail['email'], $vemail['user_name'], $mailmsg);
                    $sendreci['c'] = $i;
                    $i++;
                    //echo $vemail['email']."<br>";

                    // $pbaar = ($i/$mxassomail)*100;
                }
                //echo "count".$i;
            }
            if ($reci === '1') {
                $alltmail = $this->admin_model->alltrvmail();
                $i = 0;
                foreach ($alltmail as $vetmail) {
                    $sendreci['r' . $i] = $this->maassmail($vetmail['email'], $vetmail['user_name'], $mailmsg);
                    $sendreci['c'] = $i;
                    $i++;
                    //echo $vemail['email']."<br>";
                }

            }
            $this->load->view('admin/email_view', $sendreci);
            // echo base_url().'mail/PHPMailerAutoload.php';
            //echo "Recipient".$reci."Message". $mailmsg;
        }

    }

    function maassmail($to, $user, $mailbody)
    {
        $sendreci = array();

        $mail = new PHPMailer;
        $smtpdata = $this->admin_model->getsmtp();
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
        if ($smtpdata[0]['smtp_host'] === "") {
            echo "<script>alert('smtp setting not defined!');</script>";
        }
//{
//    
//
//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'mail.52wkends.com';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'noreply@52wkends.com';                 // SMTP username
//$mail->Password = '^urfrl9E-;QF';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 25;                                    // TCP port to connect to
//
//$mail->From = 'noreply@52wkends.com';
//$mail->FromName = '52wkends';
//$mail->addAddress($to, $user);     // Add a recipient
////$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
////$mail->addCC('cc@example.com');
////$mail->addBCC('bcc@example.com');
//
////$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
////$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML
//
//$mail->Subject = '52wkends Mail';
//$mail->Body    =$mailbody;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//if(!$mail->send()) {
//   // echo 'Message could not be sent!';
//   // echo 'Mailer Error: ' . $mail->ErrorInfo;
//    echo "<div class='alert alert-danger'>Message has not been sent to:".$to."!</div> ";
//              // $this->load->view('admin/email_view');
//
//} else {   
//    
//    echo "<div class='alert alert-success'>Message has been sent to:".$to."!</div> ";
//               //$this->load->view('admin/email_view');
//
//}
//
//
//  }
        else {
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $smtpdata[0]['smtp_host'];  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $smtpdata[0]['smtp_user'];                 // SMTP username
            $mail->Password = $smtpdata[0]['smtp_pass'];                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $smtpdata[0]['smtp_port'];                                    // TCP port to connect to

            $mail->From = $smtpdata[0]['smtp_from'];
            $mail->FromName = '52wkends';
            $mail->addAddress($to, $user);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = '52wkends mail';
            $mail->Body = $mailbody;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                //echo "<div class='alert alert-danger'>Message has not been sent to:".$to."!</div> ";
                return $sendrecie = "<b>Message has not been sent to:" . $to . "!</b>";

                // $this->load->view('admin/email_view');
//return $sendreci = $to;
                // echo 'Message could not be sent!';
                // echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {

//echo "<script>  alert('Message has been sent to:".$to."!');</script> ";
                // echo "<div class='alert alert-success' style='postion:relative !important; top:400px'>Message has been sent to:".$to."!</div> ";
                // $this->load->view('admin/email_view');
                return $sendreci = "Message has been sent to:" . $to . "!";
            }


        }
    }


    function mailme()
    {
        // $reci = array();
        // $this->input->get_post('recipient');
        $reci = $this->input->get_post('recipient');
        $mailbody = $this->input->get_post('mailmessage');
        // foreach( $this->input->get_post('recipient[]') as $reci)
        //{
        //   echo $reci;
        //}

        $this->form_validation->set_rules('recipient', 'recipient', 'required');

        $this->form_validation->set_rules('mailmessage', 'Announcement Body', 'required');


        $this->form_validation->set_error_delimiters('<br /><span class="error" ><font color="red">', '</font></span>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/mailme_view');
        } else {
            $i = 1;
            require 'mail/PHPMailerAutoload.php';
            foreach ($reci as $to) {
                $name = $this->admin_model->getuserbyemail($to);
                $user = $name[0]['user_name'];
                $recipient['r' . $i] = $this->maassmail($to, $user, $mailbody);
                $recipient['c'] = $i;
                $i++;
            }

            $this->load->view('admin/mailme_view', $recipient);

        }


    }

    function announcement()
    {

        $reci = $this->input->post('annorecipient');
        $msg = $this->input->post('annomessage');
        $this->form_validation->set_rules('annorecipient', 'annorecipient', 'required');
        $this->form_validation->set_rules('annomessage', 'annomessage', 'required');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/announce_view');
        } else {
            if ($reci != "" AND $msg != "") {
                $data = array(
                    'level' => $reci,
                    'details' => $msg,
                    'date' => date('Y-m-d')

                );

                $this->admin_model->makeannounce($data);
                redirect('index.php/admin/allannounce');
            }
        }

    }

    function allannounce()
    {

        $editid = $this->input->get_post('editid');
        $delid = $this->input->get_post('delid');


        if ($editid != "") {
            $ed['editid'] = $editid;
            $this->load->view('admin/allannounce_edit_view', $ed);
        } elseif ($delid != "") {

        } else {
            $this->load->view('admin/allannounce_view');

        }

    }

    function upanno()
    {
        $reci = $this->input->post('upannorecipient');
        $msg = $this->input->post('upannomessage');
        $eid = $this->input->post('editid');
        $delid = $this->input->post('delid');
        if ($reci != '' AND $msg != '') {
            $data = array(
                'level' => $reci,
                'details' => $msg
            );
            $this->admin_model->upanno($eid, $data);
            redirect('index.php/admin/allannounce');
        } elseif ($delid != "") {
            $this->admin_model->delanno($delid);
            redirect('index.php/admin/allannounce');
        }

    }

    public function approval_request()
    {
        $this->load->view('admin/approval_req_view');
    }

    public function featured()
    {
        $allpack = $this->input->post('pack');
        $alldesti = $this->input->post('desti');
        if ($allpack) {
            $this->admin_model->upfeature('pack', $allpack);
            echo "<script>alert('Featured Packages Updated !');</script>";
        }
        if ($alldesti) {

            $this->admin_model->upfeature('desti', $alldesti);
            echo "<script>alert('Featured Destination Updated !');</script>";
        }

        $this->load->view('admin/feature_view');
    }

    public function setting()
    {
        $off = $this->input->post('siteoff');
        $c = $this->input->post('checkme');
        $pnt = $this->input->post('points');
        $cm = $this->input->post('comission');
        $smtpset = $this->input->post('smtp');
        $minpayset = $this->input->post('min_pay');

        if ($off == '1' OR $c == '1') {
            $offsite = array(

                'site_off' => $off
            );
            $this->admin_model->setting($offsite);
        } elseif ($pnt != "") {
            $point = array(

                'point' => $pnt
            );
            $this->admin_model->setting($point);
        } elseif ($cm != "") {
            $cms = array(

                'commision' => $cm
            );
            $this->admin_model->setting($cms);
        } elseif ($smtpset === '1') {


            $this->form_validation->set_rules('smtp_host', 'smtp_host', 'required');
            $this->form_validation->set_rules('smtp_user', 'smtp_user', 'required');
            $this->form_validation->set_rules('smtp_pass', 'smtp_pass', 'required');
            $this->form_validation->set_rules('smtp_port', 'smtp_port', 'required');
            $this->form_validation->set_rules('smtp_from', 'smtp_from', 'required');

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/admin_setting');
            } else {
                $smt = array(

                    'smtp_host' => @$this->input->post('smtp_host'),
                    'smtp_user' => @$this->input->post('smtp_user'),
                    'smtp_pass' => @$this->input->post('smtp_pass'),
                    'smtp_port' => @$this->input->post('smtp_port'),
                    'smtp_from' => @$this->input->post('smtp_from')


                );
                $this->admin_model->setting($smt);

            }


        } elseif ($this->input->post('sitedetail') == '1') {
            $this->form_validation->set_rules('site_name', 'site_title', 'required');
            $this->form_validation->set_rules('site_description', 'site_description', 'required');
            $this->form_validation->set_rules('meta_keywords', 'meta_keywords', 'required');
            $this->form_validation->set_rules('meta_author', 'meta_author', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/admin_setting');
            } else {
                $smt = array(

                    'site_name' => @$this->input->post('site_name'),
                    'site_description' => @$this->input->post('site_description'),
                    'meta_keywords' => @$this->input->post('meta_keywords'),
                    'meta_author' => @$this->input->post('meta_author')

                );
                $this->admin_model->setting($smt);
            }
        } elseif ($this->input->post('minpay') == '1') {
            $this->form_validation->set_rules('min_pay', 'min_pay', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/admin_setting');
            } else {
                $smt = array(
                    'min_pay' => @$this->input->post('min_pay')
                );
                $this->admin_model->setting($smt);
            }
        }
        $this->load->view('admin/admin_setting');
    }

    public function advertise()
    {
        //$this->form_validation->set_rules('ad', 'ad', 'required');
        if ($this->input->post('seg') === '1') {
            $this->form_validation->set_rules('adv', 'advertise image', 'required');
            $this->form_validation->set_rules('adv_title', 'advertise Title', 'required');
            $this->adv = "";
            if (@$_FILES['adv']['name'] != "") {
                $config['upload_path'] = './upload/ad/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '2048';
                $config['max_width'] = '900';
                $config['max_height'] = '510';
                $this->upload_file($config, 'adv');
                $this->form_validation->set_rules('adv', 'adv', 'callback_check_file[adv]');


            }

            $this->form_validation->set_error_delimiters('<br /><span class="error" style="color:red">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/advertise_view');
            } else {
                $onedata = array(

                    'ad_img' => @$this->adv,
                    'status' => 0,
                    'ad_title' => $this->input->post('adv_title'),
                    'seg' => 1

                );

                if ($this->admin_model->insertad($onedata) == TRUE) {
                    echo "<script>alert('Ad block 1 uploaded!');</script>";
                } else {
                    echo "<script>alert('Error Occured!');</script>";
                }
                $this->load->view('admin/advertise_view');
            }


        } else if ($this->input->post('seg') === '2') {
            $this->form_validation->set_rules('adv1', 'adverstise image', 'required');
            $this->form_validation->set_rules('adv2', 'advertise  image', 'required');
            $this->form_validation->set_rules('adv1_title', 'advertise Title', 'required');
            $this->form_validation->set_rules('adv2_title', 'advertise Title', 'required');

            $this->adv1 = "";
            if (@$_FILES['adv1']['name'] != "") {
                $config['upload_path'] = './upload/ad/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '2048';
                $config['max_width'] = '450';
                $config['max_height'] = '255';


                $this->upload_file($config, 'adv1');
                $this->form_validation->set_rules('adv1', 'adv1', 'callback_check_file[adv1]');


            }
            $this->adv2 = "";
            if (@$_FILES['adv2']['name'] != "") {
                $config['upload_path'] = './upload/ad/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '2048';
                $config['max_width'] = '450';
                $config['max_height'] = '255';


                $this->upload_file($config, 'adv2');
                $this->form_validation->set_rules('adv2', 'adv2', 'callback_check_file[adv2]');

            }
            $this->form_validation->set_error_delimiters('<br /><span class="error" style="color:red">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/advertise_view');
            } else {
                $threedata = array(

                    'ad_img' => @$this->adv1,
                    'status' => 0,
                    'ad_title' => $this->input->post('adv1_title'),
                    'seg' => 2

                );
                $twodata = array(

                    'ad_img' => @$this->adv2,
                    'ad_title' => $this->input->post('adv2_title'),
                    'status' => 0,
                    'seg' => 2

                );
                if ($this->admin_model->insertad($threedata) == true && $this->admin_model->insertad($twodata) == true) {
                    echo "<script>alert('Ad block 2 uploaded!');</script>";
                } else {
                    echo "<script>alert('Error Occured!');</script>";
                }
                $this->load->view('admin/advertise_view');
            }

        } else if ($this->input->post('seg') === '3') {
            $this->form_validation->set_rules('adv3', 'advertise image', 'required');
            $this->form_validation->set_rules('adv4', 'advertise image', 'required');
            $this->form_validation->set_rules('adv5', 'advertise image', 'required');
            $this->form_validation->set_rules('adv3_title', 'advertise Title', 'required');
            $this->form_validation->set_rules('adv4_title', 'advertise Title', 'required');
            $this->form_validation->set_rules('adv5_title', 'advertise Title', 'required');

            $this->adv3 = "";
            if (@$_FILES['adv3']['name'] != "") {
                $config['upload_path'] = './upload/ad/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '2048';
                $config['max_width'] = '300';
                $config['max_height'] = '170';

                $this->upload_file($config, 'adv3');
                $this->form_validation->set_rules('adv3', 'adv3', 'callback_check_file[adv3]');


            }
            $this->adv4 = "";
            if (@$_FILES['adv4']['name'] != "") {

                $config['upload_path'] = './upload/ad/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '2048';
                $config['max_width'] = '300';
                $config['max_height'] = '170';

                $this->upload_file($config, 'adv4');
                $this->form_validation->set_rules('adv4', 'adv4', 'callback_check_file[adv4]');

            }
            $this->adv5 = "";
            if (@$_FILES['adv5']['name'] != "") {
                $config['upload_path'] = './upload/ad/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '2048';
                $config['max_width'] = '300';
                $config['max_height'] = '170';


                $this->upload_file($config, 'adv5');
                $this->form_validation->set_rules('adv5', 'adv5', 'callback_check_file[adv5]');


            }
            $this->form_validation->set_error_delimiters('<br /><span class="error" style="color:red">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/advertise_view');
            } else {


                $fourdata = array(

                    'ad_img' => @$this->adv3,
                    'status' => 0,
                    'ad_title' => $this->input->post('adv3_title'),
                    'seg' => 3

                );
                $fivedata = array(

                    'ad_img' => @$this->adv4,
                    'ad_title' => $this->input->post('adv4_title'),
                    'status' => 0,
                    'seg' => 3

                );
                $sixdata = array(

                    'ad_img' => @$this->adv5,
                    'ad_title' => $this->input->post('adv5_title'),
                    'status' => 0,
                    'seg' => 3

                );
                if ($this->admin_model->insertad($fourdata) == true && $this->admin_model->insertad($fivedata) == true && $this->admin_model->insertad($sixdata) == true) {
                    echo "<script>alert('Ad block 3 uploaded!');</script>";
                } else {
                    echo "<script>alert('Error Occured!');</script>";
                }
                $this->load->view('admin/advertise_view');
            }


        } else {
            $this->load->view('admin/advertise_view');
        }


    }

    function checkblock1()
    {
        if ($this->input->post('block1') == '0') {
            $this->form_validation->set_message('checkblock1', "Please select ad to set");
            return false;
        } else {
            return true;
        }
    }

    function checkblock2()
    {
        $i = 0;
        foreach ($this->input->post('block2') as $vl) {
            $i++;
        }
        if ($i != 2) {
            $this->form_validation->set_message('checkblock2', "Please select two ads to set");
            return false;
        } else {
            return true;
        }
    }

    function checkblock3()
    {
        $i = 0;
        foreach ($this->input->post('block3') as $vl) {
            $i++;
        }
        if ($i != 3) {
            $this->form_validation->set_message('checkblock3', "Please select two ads to set");
            return false;
        } else {
            return true;
        }
    }


    function set_ad()
    {

        if ($this->input->post('segment') == '1') {
            $this->form_validation->set_rules('block1', 'Ad selection', 'required|callback_checkblock1');

            $this->form_validation->set_error_delimiters('<br /><span class="error" style="color:red">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/advertise_view');
            } else {


                $this->admin_model->upadsbyseg('1', $this->input->post('block1'));
                echo "<script>alert('Ad block1 updated!');</script>";
                $this->load->view('admin/advertise_view');
            }
        }

        if ($this->input->post('segment') == '2') {
            $this->form_validation->set_rules('block2[]', 'block2 Ads', 'required|callback_checkblock2');

            $this->form_validation->set_error_delimiters('<br /><span class="error" style="color:red">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/advertise_view');
            } else {
                $ids = $this->input->post('block2');

                $this->admin_model->upadsbyseg('2', $ids);
                echo "<script>alert('Ad block2 updated!');</script>";
                $this->load->view('admin/advertise_view');
            }
        }

        if ($this->input->post('segment') == '3') {
            $this->form_validation->set_rules('block3[]', 'block3 Ads', 'required|callback_checkblock3');

            $this->form_validation->set_error_delimiters('<br /><span class="error" style="color:red">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/advertise_view');
            } else {
                $idst = $this->input->post('block3');

                $this->admin_model->upadsbyseg('3', $idst);
                echo "<script>alert('Ad block3 updated!');</script>";
                $this->load->view('admin/advertise_view');
            }
        }


    }

    function associate_list()
    {
        $this->load->view('admin/assolist_view');
    }


    function create_package()
    {
        $this->load->view('admin/create_package');
    }


    function add_destination()
    {

        $this->form_validation->set_rules('desti_name', 'Name', 'required|max_length[255]');
        $this->form_validation->set_rules('main_image', 'Main_image', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        //$this->form_validation->set_rules('getting_there', 'Getting_there', 'required');
        $this->form_validation->set_rules('train', 'Train', 'required');
        $this->form_validation->set_rules('road', 'Road', 'required');
        $this->form_validation->set_rules('air', 'Air', 'required');
        $this->form_validation->set_rules('visit_time', 'visit_time', 'required');
        $this->form_validation->set_rules('visit_and_do', 'visit and Do', 'required');
        $this->form_validation->set_rules('accommodation', 'accommodation', 'required');
        $this->form_validation->set_rules('main_image_title', 'acco_image_title', 'required');
        $this->form_validation->set_rules('acco_image_1_title', 'acco_image_1_title', 'required');
        $this->form_validation->set_rules('acco_image_2_title', 'acco_image_2_title', 'required');
        $this->form_validation->set_rules('food_image_1_title', 'food_image_1_title', 'required');
        $this->form_validation->set_rules('food_image_2_title', 'food_image_2_title', 'required');
        $this->form_validation->set_rules('acco_image_1', 'acco_image_1', 'required');
        $this->form_validation->set_rules('acco_image_2', 'acco_image_2', 'required');
        $this->form_validation->set_rules('food', 'Food', 'required');
        $this->form_validation->set_rules('food_image_1', 'food_image_1', 'required');
        $this->form_validation->set_rules('food_image_2', 'food_image_2', 'required');
        $this->form_validation->set_rules('imp_facts', 'Imp Facts', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('nearplaces[]', 'nearplaces', 'required');
        $this->form_validation->set_rules('places_near_by', 'Places near By', 'required|max_length[500]');
        $this->main_image = "";
        if (@$_FILES['main_image']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'main_image');
            $this->form_validation->set_rules('main_image', 'main_image', 'callback_check_file[main_image]');
        }
        $this->acco_image_1 = "";
        if (@$_FILES['acco_image_1']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'acco_image_1');
            $this->form_validation->set_rules('acco_image_1', 'acco_image_1', 'callback_check_file[acco_image_1]');
        }
        $this->food_image_1 = "";
        if (@$_FILES['food_image_1']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'food_image_1');
            $this->form_validation->set_rules('food_image_1', 'food_image_1', 'callback_check_file[food_image_1]');
        }
        $this->acco_image_2 = "";
        if (@$_FILES['acco_image_2']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'acco_image_2');
            $this->form_validation->set_rules('acco_image_2', 'acco_image_2', 'callback_check_file[acco_image_2]');
        }
        $this->food_image_2 = "";
        if (@$_FILES['food_image_2']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'food_image_2');
            $this->form_validation->set_rules('food_image_2', 'food_image_2', 'callback_check_file[food_image_2]');
        }
        $this->other_image_1 = "";
        if (@$_FILES['other_image_1']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_1');
            $this->form_validation->set_rules('other_image_1', 'other_image_1', 'callback_check_file[other_image_1]');
        }
        $this->other_image_2 = "";
        if (@$_FILES['other_image_2']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_2');
            $this->form_validation->set_rules('other_image_2', 'other_image_2', 'callback_check_file[other_image_2]');
        }
        $this->other_image_3 = "";
        if (@$_FILES['other_image_3']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_3');
            $this->form_validation->set_rules('other_image_3', 'other_image_3', 'callback_check_file[other_image_3]');
        }
        if (@$this->other_image_1 != "") {
            $this->form_validation->set_rules('other_image_1_title', 'other_image_1_title', 'required');

        }
        if (@$this->other_image_2 != "") {
            $this->form_validation->set_rules('other_image_2_title', 'other_image_2_title', 'required');
        }
        if (@$this->other_image_3 != "") {

            $this->form_validation->set_rules('other_image_3_title', 'other_image_3_title', 'required');
        }

        $this->form_validation->set_error_delimiters('<br /><span class="error" ><font color="red">', '</font></span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/add_desti_view');
        } else {
            $nearplace = @$this->input->post('nearplaces');
            $nearp = implode(",", $nearplace);
            $form_data = array(
                'uid' => $this->session->userdata('auid'),
                'name' => @$this->input->post('desti_name'),
                'description' => @$this->input->post('description'),
                'getting_there' => @$this->input->post('getting_there'),
                'train' => @$this->input->post('train'),
                'road' => @$this->input->post('road'),
                'air' => @$this->input->post('air'),
                'visit_time' => @$this->input->post('visit_time'),
                'visit_do' => @$this->input->post('visit_and_do'),
                'acco' => @$this->input->post('accommodation'),
                'food' => @$this->input->post('food'),
                'imp_facts' => @$this->input->post('imp_facts'),
                'places_nearby' => @$this->input->post('places_near_by'),
                'near_places' => $nearp,
                'main_image_title' => @$this->input->post('main_image_title'),
                'acco_image_1_title' => @$this->input->post('acco_image_1_title'),
                'acco_image_2_title' => @$this->input->post('acco_image_2_title'),
                'food_image_1_title' => @$this->input->post('food_image_1_title'),
                'food_image_2_title' => @$this->input->post('food_image_2_title'),
                'other_image_1_title' => @$this->input->post('other_image_1_title'),
                'other_image_2_title' => @$this->input->post('other_image_2_title'),
                'other_image_3_title' => @$this->input->post('other_image_3_title'),
                'main_image' => @$this->main_image,
                'acco_image_1' => @$this->acco_image_1,
                'food_image_1' => @$this->food_image_1,
                'acco_image_2' => @$this->acco_image_2,
                'food_image_2' => @$this->food_image_2,
                'other_image_1' => @$this->other_image_1,
                'other_image_2' => @$this->other_image_2,
                'other_image_3' => @$this->other_image_3,
                'country' => @$this->input->post('country'),
                'state' => @$this->input->post('state'),
                'status' => '1',
                'city' => @$this->input->post('city')
            );


            if ($this->admin_model->savedesti($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                echo "<script> alert('" . @$this->input->post('desti_name') . "Destination added successfully!');</script>";

            } else {
                echo 'An error occurred saving your information. Please try again later';
            }

        }


    }

    function edit_destination()
    {
        $plce = @$this->input->post('place');
        $myid['id'] = @$this->input->get_post('id');
        $ddata = $this->admin_model->getdestibyid(@$this->input->get_post('id'));
        if ($myid['id'] != "" AND $ddata) {

            // if($ddata[0]['main_image'])
            // {

            //  }
            $mydata = $this->admin_model->getdestibyid(@$this->input->get_post('id'));
            $this->load->model('region_model');
            $city = $this->region_model->getcitybyid($mydata[0]['city']);
            $state = $this->region_model->getstatebyid($mydata[0]['state']);
            $ctry = $this->region_model->getcntbyid($mydata[0]['country']);

            if ($plce === '1') {
                $this->form_validation->set_rules('country', 'country', 'required');
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $cntry = @$this->input->post('country');
                $state = @$this->input->post('state');
                $city = @$this->input->post('city');

            } elseif (!$plce) {
                $cntry = $ctry[0]['id'];
                $state = $state[0]['id'];
                $city = $city[0]['id'];
            }


            $this->form_validation->set_rules('desti_name', 'Name', 'required|max_length[255]');
            // $this->form_validation->set_rules('main_image', 'Main_image', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('getting_there', 'Getting_there', 'required');
            $this->form_validation->set_rules('train', 'Train', 'required');
            $this->form_validation->set_rules('road', 'Road', 'required');
            $this->form_validation->set_rules('air', 'Air', 'required');
            $this->form_validation->set_rules('visit_time', 'visit_time', 'required');
            $this->form_validation->set_rules('visit_and_do', 'visit and Do', 'required');
            $this->form_validation->set_rules('accommodation', 'accommodation', 'required');
            $this->form_validation->set_rules('main_image_title', 'acco_image_title', 'required');
            $this->form_validation->set_rules('acco_image_1_title', 'acco_image_1_title', 'required');
            $this->form_validation->set_rules('acco_image_2_title', 'acco_image_2_title', 'required');
            $this->form_validation->set_rules('food_image_1_title', 'food_image_1_title', 'required');
            $this->form_validation->set_rules('food_image_2_title', 'food_image_2_title', 'required');
            //   $this->form_validation->set_rules('acco_image_1', 'acco_image_1', 'required');
            //   $this->form_validation->set_rules('acco_image_2', 'acco_image_2', 'required');
            $this->form_validation->set_rules('food', 'Food', 'required');
            //    $this->form_validation->set_rules('food_image_1', 'food_image_1', 'required');
            //  $this->form_validation->set_rules('food_image_2', 'food_image_2', 'required');
            $this->form_validation->set_rules('imp_facts', 'Imp Facts', 'required');
            // $this->form_validation->set_rules('scountry', 'scountry', 'required');
            // $this->form_validation->set_rules('sstate', 'sstate', 'required');
            // $this->form_validation->set_rules('scity', 'scity', 'required');
            $this->form_validation->set_rules('places_near_by', 'Places near By', 'required|max_length[500]');
            $this->main_image = "";
            if (@$_FILES['main_image']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'main_image');
                $this->form_validation->set_rules('main_image', 'main_image', 'callback_check_file[main_image]');
            }
            $this->acco_image_1 = "";
            if (@$_FILES['acco_image_1']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'acco_image_1');
                $this->form_validation->set_rules('acco_image_1', 'acco_image_1', 'callback_check_file[acco_image_1]');
            }
            $this->food_image_1 = "";
            if (@$_FILES['food_image_1']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'food_image_1');
                $this->form_validation->set_rules('food_image_1', 'food_image_1', 'callback_check_file[food_image_1]');
            }
            $this->acco_image_2 = "";
            if (@$_FILES['acco_image_2']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'acco_image_2');
                $this->form_validation->set_rules('acco_image_2', 'acco_image_2', 'callback_check_file[acco_image_2]');
            }
            $this->food_image_2 = "";
            if (@$_FILES['food_image_2']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'food_image_2');
                $this->form_validation->set_rules('food_image_2', 'food_image_2', 'callback_check_file[food_image_2]');
            }
            $this->other_image_1 = "";
            if (@$_FILES['other_image_1']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_1');
                $this->form_validation->set_rules('other_image_1', 'other_image_1', 'callback_check_file[other_image_1]');
            }
            $this->other_image_2 = "";
            if (@$_FILES['other_image_2']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_2');
                $this->form_validation->set_rules('other_image_2', 'other_image_2', 'callback_check_file[other_image_2]');
            }
            $this->other_image_3 = "";
            if (@$_FILES['other_image_3']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_3');
                $this->form_validation->set_rules('other_image_3', 'other_image_3', 'callback_check_file[other_image_3]');
            }

            if (@$this->other_image_1 != "") {
                $this->form_validation->set_rules('other_image_1_title', 'other_image_1_title', 'required');

            }
            if (@$this->other_image_2 != "") {
                $this->form_validation->set_rules('other_image_2_title', 'other_image_2_title', 'required');
            }
            if (@$this->other_image_3 != "") {

                $this->form_validation->set_rules('other_image_3_title', 'other_image_3_title', 'required');
            }


            $this->form_validation->set_error_delimiters('<br /><span class="error" ><font color="red">', '</font></span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                // $this->load->view('admin/add_desti_view');
                $this->load->view('admin/edit_desti_view', $myid);

            } else {

                $nearplace = @$this->input->post('nearplaces');
                $nearp = implode(",", $nearplace);


                $mainimage = @$this->main_image;
                $acco_image_1 = @$this->acco_image_1;
                $acco_image_2 = @$this->acco_image_2;
                $food_image_1 = @$this->food_image_1;
                $food_image_2 = @$this->food_image_2;
                $other_image_1 = @$this->other_image_1;
                $other_image_2 = @$this->other_image_2;
                $other_image_3 = @$this->other_image_3;


                if ($mainimage === '') {
                    $mainimage = $mydata[0]['main_image'];
                }
                if ($acco_image_1 === '') {
                    $acco_image_1 = $mydata[0]['acco_image_1'];
                }
                if ($acco_image_2 === '') {
                    $acco_image_2 = $mydata[0]['acco_image_2'];
                }
                if ($food_image_1 === '') {
                    $food_image_1 = $mydata[0]['food_image_1'];
                }
                if ($food_image_2 === '') {
                    $food_image_2 = $mydata[0]['food_image_2'];
                }
                if ($other_image_1 === '') {
                    $other_image_1 = $mydata[0]['other_image_1'];
                }
                if ($other_image_2 === '') {
                    $other_image_2 = $mydata[0]['other_image_2'];
                }
                if ($other_image_3 === '') {
                    $other_image_3 = $mydata[0]['other_image_3'];
                }


                $upid = @$this->input->get_post('id');
                $updata = array(
                    'name' => @$this->input->post('desti_name'),
                    'description' => @$this->input->post('description'),
                    'getting_there' => @$this->input->post('getting_there'),
                    'train' => @$this->input->post('train'),
                    'road' => @$this->input->post('road'),
                    'air' => @$this->input->post('air'),
                    'visit_time' => @$this->input->post('visit_time'),
                    'visit_do' => @$this->input->post('visit_and_do'),
                    'acco' => @$this->input->post('accommodation'),
                    'food' => @$this->input->post('food'),
                    'imp_facts' => @$this->input->post('imp_facts'),
                    'places_nearby' => @$this->input->post('places_near_by'),
                    'near_places' => $nearp,
                    'main_image_title' => @$this->input->post('main_image_title'),
                    'acco_image_1_title' => @$this->input->post('acco_image_1_title'),
                    'acco_image_2_title' => @$this->input->post('acco_image_2_title'),
                    'food_image_1_title' => @$this->input->post('food_image_1_title'),
                    'food_image_2_title' => @$this->input->post('food_image_2_title'),
                    'other_image_1_title' => @$this->input->post('other_image_1_title'),
                    'other_image_2_title' => @$this->input->post('other_image_2_title'),
                    'other_image_3_title' => @$this->input->post('other_image_3_title'),

                    'main_image' => $mainimage,
                    'acco_image_1' => $acco_image_1,
                    'food_image_1' => $food_image_1,
                    'acco_image_2' => $acco_image_2,
                    'food_image_2' => $food_image_2,
                    'other_image_1' => $other_image_1,
                    'other_image_2' => $other_image_2,
                    'other_image_3' => $other_image_3,
                    'country' => $cntry,
                    'state' => $state,
                    'city' => $city
                );

                $this->admin_model->updesti($upid, $updata);
                $mid['id'] = $upid;
                $this->load->view('admin/edit_desti_view', $mid);

            }

        }


    }

    function add_place()
    {
        $addcountry = $this->input->post('addcountry');
        $addstate = $this->input->post('addstate');
        $addcity = $this->input->post('addcity');
        $city = $this->input->post('city');
        $ctry = $this->input->post('country');
        $state = $this->input->post('state');

        $co = $this->input->post('co');
        $st = $this->input->post('st');
        $ct = $this->input->post('ct');
        if ($co === '1') {
            $this->form_validation->set_rules('addcountry', 'addcountry', 'required');
        }
        if ($st === '1') {
            $this->form_validation->set_rules('addstate', 'addstate', 'required');
        }
        if ($ct === '1') {
            $this->form_validation->set_rules('addcity', 'addcity', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
        }

        $this->form_validation->set_error_delimiters('<br /><span class="error" ><font color="red">', '</font></span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            // $this->load->view('admin/add_desti_view');
            $this->load->view('admin/add_place_view');

        } else {

            $codata = array(

                'country' => $addcountry

            );
            $stdata = array(
                'country_id' => $ctry,
                'state' => $addstate

            );
            $ctdata = array(

                'state_id' => $state,
                'city' => $addcity,
                'status' => '1'

            );
            if ($co === '1') {
                if ($this->admin_model->addco($codata) === true) {
                    echo "<script>alert('" . $addcountry . " Successfully added!');</script>";
                    $this->load->view('admin/add_place_view');
                } else {
                    echo "<script>alert('Error try again!');</script>";
                }

            }
            if ($ct === '1') {

                if ($this->admin_model->addct($ctdata) === true) {
                    echo "<script>alert('" . $addcity . " Successfully added!');</script>";
                    $this->load->view('admin/add_place_view');
                } else {
                    echo "<script>alert('Error try again!');</script>";
                }

            }
            if ($st === '1') {
                if ($this->admin_model->addst($stdata) === true) {
                    echo "<script>alert('" . $addstate . " Successfully added!');</script>";
                    $this->load->view('admin/add_place_view');
                } else {
                    echo "<script>alert('Error try again!');</script>";
                }

            }


        }

    }

    function manage_place()
    {
        $cid = $this->input->get_post('id');
        $cname = $this->input->get_post('cityname');

        if ($cid != "" AND $cname != "") {
            $state_id['id'] = $cid;
            $state_id['cname'] = $cname;
            $this->load->view('admin/edit_place_view', $state_id);
        } else {
            $this->load->view('admin/all_place_view');

        }

    }

    function approve_desti()
    {
        $this->load->view('admin/approval_desti_view');
    }

    function del_destination()
    {

        $this->admin_model->deldestination($this->uri->segment(3));
        redirect(base_url() . 'index.php/admin/destination');
    }

    public function destination()
    {
        $did = $this->input->post('did');
        $act = $this->input->post('activate');
        if ($did != "" AND $act != "") {
            $actcheck = $this->admin_model->getdestibyid($did);
            if ($actcheck) {
                if ($actcheck[0]['status'] === '0') {
                    $updata = array(

                        'status' => '1'
                    );
                    $this->admin_model->updesti($did, $updata);
                    echo "<script>alert('Activated');</script>";
                } else {
                    $updata = array(

                        'status' => '0'
                    );
                    $this->admin_model->updesti($did, $updata);
                    echo "<script>alert('Deactivated');</script>";
                }
            }
        }
        $this->load->view('admin/alldesti_view');
    }

    public function offers()
    {
        $act = $this->input->post('activate');
        $id = $this->input->post('did');
        $del = $this->input->post('del');
        if ($act === '1') {

            $offact = $this->admin_model->getofferbyid($id);
            if ($offact[0]['status'] === 'active') {
                $offdata = array(
                    'status' => 'inactive'

                );
                $this->admin_model->upoffer($id, $offdata);
                echo "<script>alert('Inactive " . $offact[0]['offer_name'] . " offer');</script>";

            }
            if ($offact[0]['status'] === 'inactive') {
                $offdata = array(
                    'status' => 'active'

                );
                $this->admin_model->upoffer($id, $offdata);
                echo "<script>alert('Active " . $offact[0]['offer_name'] . "offer');</script>";
            }


        }

        if ($del === '1') {
            $this->admin_model->delofferbyid($id);
            echo "<script>alert('Delete offer successfully!');</script>";
        }
        $this->load->view('admin/offers_view');
    }

    function edit_offers()
    {
        $id = $this->input->get_post('id');
        $off = $this->admin_model->getofferbyid($id);
        if ($off) {
            $oid['id'] = $id;
            $this->load->view('admin/edit_offer_view', $oid);
        }

    }

    function update_offer()
    {
        $offer = $this->input->post('offername');
        $details = $this->input->post('details');
        $discount = $this->input->post('discount');
        $package = $this->input->post('package');
        $offid = $this->input->post('off_id');


        $this->form_validation->set_rules('offername', 'offername', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $this->form_validation->set_rules('discount', 'discount', 'required');


        if ($this->form_validation->run() == FALSE) {
            $oid['id'] = $offid;
            $this->load->view('admin/edit_offer_view', $oid);
        } else {
            $offdata = array(
                'offer_name' => $offer,
                'offer_details' => $details,
                'discount' => $discount,
                'pack_id' => $package

            );
            //print_r($offdata);
            $this->admin_model->upoffer($offid, $offdata);
            echo "<script>alert('" . $offer . "successfully updated!');</script>";
            $this->load->view('admin/offers_view');
        }


    }

    public function add_offer()
    {

        $this->form_validation->set_rules('discount', 'discount', 'required|is_numeric|max_length[255]');
        $this->form_validation->set_rules('offername', 'offername', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $this->form_validation->set_rules('package', 'package', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error"><font color="red">', '</font></span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/create_offer_view');
        } else {
            $uuid = $this->session->userdata('auid');
            $fdata = array(

                'offer_name' => $this->input->post('offername'),
                'offer_details' => $this->input->post('details'),
                'discount' => $this->input->post('discount'),
                'uid' => $uuid,
                'pack_id' => $this->input->post('package'),
                'status' => 'inactive'


            );
            if ($this->admin_model->addoffer($fdata) === TRUE) {
                echo "<script>alert('" . $this->input->post('offername') . " offer created successfully!');</script>";
                $this->offers();
            } else {
                echo "<script>alert('error! try again');</script>";
                $this->load->view('admin/create_offer_view');
            }
        }

    }

    public function add_package()
    {
        $data['facilities'] = $this->pack_model->get_facilities();
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/create_pack_view');
        $this->load->view('admin/admin_footer');
    }

}
