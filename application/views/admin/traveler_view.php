<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Business Associate | Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    
    <link href="<?php echo base_url();?>assets/css/layout2.css" rel="stylesheet" />
       <link href="<?php echo base_url();?>assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timeline/timeline.css" />
       <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />

    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
   
</head>


<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
   <?php require_once 'nav.php';    ?>
         <!-- HEADER SECTION -->
       
        <!--PAGE CONTENT -->
       <div id="content" style="padding-top:10px;">     
              <hr />

 <div class="row">

               
                <div class="col-lg-12">
                    <div class="panel panel-primary"  style="margin-top: 50px; margin-left:30px;">
                        <div class="panel-heading">
						
                            List of travelers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-ass">
                                    <thead>
                                        <tr>                                                                                      
                                            <th>Unique Id</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            
                                            <th>Activate</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Manage</th>
                                           
                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        
                                        //$user_uid = $this -> session ->userdata('uid');
           //print_r($data);
      $data = $this ->user_model->get(['type'=>'Traveler']);
      foreach ($data as $value) {
       echo "<tr >
                                           
                                            <td>".$value['uid']."</td>
                                           <td>".$value['user_name']."</td>
                                          
                                             <td >".$value['email']."</td>
                                                
                                                       <td >".$value['active']."</td>
                                                            <td >".$value['status']."</td>
                                                                 <td ><a href='".base_url()."index.php/admin/profile?id=".$value['uid']."'>view</a></td>
                                        
<td><a href=''><i class='icon-pencil'></i> </a>&nbsp;&nbsp;
                                       <a href=''><i class='icon-remove'></i> </a></td>
</tr>";
      }
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
  <div id="footer">
        <p>&copy; kpholidays.com &nbsp;2014 &nbsp;</p>
    </div>
   <!-- FOOTER -->
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-ass').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
