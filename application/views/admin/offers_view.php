<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
<link href="<?php echo base_url();  ?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    
   
                                        
                                      
   
      
    
    
    
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


   <?php require_once 'nav.php';    ?>
         <!-- HEADER SECTION -->
       
        <!--PAGE CONTENT -->
       <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">

<div class="panel panel-primary">
                        <div class="panel-heading">
                         All Offers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                        <tr>
                                            <th>#</th>
                                           <th>From</th>
                                           <th>Offer Name</th>
                                           <th>Description</th>
                                           <th>Discount</th>
                                           <th>Package</th>
                                           <th>Status</th>
                                           <th></th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        
                                        
                                        <?php 
                                       // $this->output->enable_profiler(TRUE);
                                        $destidata = $this->admin_model->getalloffer();  
                                        //print_r($docdata);
                                      $c=1;
                                        foreach ($destidata as $dispval)
                                        {
                                         // $docr = $this->admin_model->getdoc($doestval['uid']);
                                         $mypack = $this->admin_model->getpackbyid($dispval['pack_id']);
                                        //$tour = $this->tour_model->tourbyid($dispval['tour_id']);
                                         $this->load->model('user_model');
                                         $nm = $this->user_model->get($dispval['uid']);
                                        ?>
                                       
                                        <tr class="warning" style="font-size:13px">
                                            <td><?php echo $c;  ?></td>
                                            <td><?php if($nm) {echo $nm[0]['user_name'];}  ?></td>
                                            <td><?php  echo $dispval['offer_name'];  ?></td>
                                            <td><textarea class="form-control" disabled="disabled" rows="5"><?php  echo $dispval['offer_details'];  ?></textarea></td>
                                        <td><?php  echo $dispval['discount']  ?></td>
                                        <td><?php  if ($mypack){echo $mypack[0]['pack_name'] ; }else{echo "none";}?></td>
                                         <td><?php if  ($dispval['status']==='inactive'){echo "  <button class='btn btn-warning btn-xs'>Inactive</button>" ;}else{echo "<button class='btn btn-success btn-xs'>Active</button>";}  ?></td>
                                         <td><form action="<?php echo base_url();   ?>index.php/admin/offers" method="post"><input type="hidden" name="activate" value="1"><input type="hidden" name="did" value="<?php echo $dispval['id']; ?>"><button class="btn btn-danger btn-xs " ><i class="icon-power-off"></i></button></form> <a href="<?php echo base_url()."index.php/admin/edit_offers?id=".$dispval['id'];  ?>" ><br><button class="btn btn-warning btn-circle"><i class="icon-pencil"></i></button></a>&nbsp;<br><br><form action="<?php echo base_url();   ?>index.php/admin/offers" method="post"><input type="hidden" name="del" value="1"><input type="hidden" name="did" value="<?php echo $dispval['id']; ?>"><button class="btn btn-danger btn-circle"><i class="icon-remove"></i></button></form></td>
                                       </tr>
                                  
                                       
<?php
  $c++;                                       
 }
?>
                                    </tbody></table></div></div></div>



                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  kpholidays.com &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();  ?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();  ?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
      
</body>
    <!-- END BODY-->
    
</html>

