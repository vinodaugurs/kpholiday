<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8"/>
    <title>Admin | Dashboard </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/MoneAdmin.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Font-Awesome/css/font-awesome.css"/>
    <!--END GLOBAL STYLES -->
    <link href="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>

    <!-- PAGE LEVEL STYLES -->

    <link href="<?php echo base_url(); ?>assets/css/layout2.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/flot/examples/examples.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timeline/timeline.css"/>
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet"/>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/plugins/uniform/themes/default/css/uniform.default.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/chosen/chosen.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tagsinput/jquery.tagsinput.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/css/datepicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/switch/static/stylesheets/bootstrap-switch.css"/>

    <!-- END PAGE LEVEL  STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>


<body class="padTop53 ">

<!-- MAIN WRAPPER -->
<div id="wrap">


    <!-- HEADER SECTION -->
    <?php require_once 'nav.php'; ?>
    <!-- HEADER SECTION -->

    <!--PAGE CONTENT -->
    <div id="content" style="width:81% ;padding-top:10px;">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Notifications
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-ass">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                //$user_uid = $this -> session ->userdata('uid');
                                //print_r($data);
                                //$data = $this ->user_model->get(['type'=>'Associate']);
                                $this->load->model('notify_model');
                                $c = 1;
                                $data = $this->notify_model->gettype($type = 'Admin');
                                foreach ($data as $noti) {
                                    echo "<tr >
                                           <td>" . $c . "</td>
                                          
                                           <td>" . $noti['from_'] . "</td>
                                          
                                             <td >" . $noti['message'] . "</td>
                                                  <td >" . $noti['date'] . "</td>
                                              <td><a  href=" . site_url('dashboard/del_notify/' . $noti['id']) . ">
											<i class='icon-remove'></i>		
											</a></td>    
															   
                                     </tr>";
                                    $c++;
                                }
                                $udata = ['seen' => 1];


                                $this->notify_model->getupdate($udata);
                                ?>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--END PAGE CONTENT -->


</div>

<!--END MAIN WRAPPER -->

<!-- FOOTER -->
<!--END FOOTER -->
<!-- GLOBAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<!-- END GLOBAL SCRIPTS -->
<!-- PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-ass').dataTable();
    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>
