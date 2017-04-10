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
                           Approval Request
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th>#</th>
                                            <th>Uid</th>
                                            <th>name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>city</th>
                                            <th>state</th>
                                            <th>status</th>
                                            <th>Activate</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php 
                                        
                                        $apdata = $this->admin_model->getpendasso();  
                                        
                                        foreach ($apdata as $apval)
                                        {
                                           $city = $this->region_model->getcitybyid($apval['city']);
                                           $state = $this->region_model->getstatebyid($apval['state']);
                                           //$cntry = $this->region_model->getcntbyid($apval['country']);
                                        ?>
                                        <tr class="odd gradeX">
                                             <td class="warning"><?php echo $apval['id']?></td>
                                            <td class="warning"><?php echo $apval['uid']?></td>
                                            <td class="warning" ><?php echo $apval['user_name']?></td>
                                            <td class="warning"><?php echo $apval['email']?></td>
                                            <td class="warning"><?php echo $apval['phone']?></td>
                                            <td class="warning"><textarea class ="form-control" disabled="disabled"><?php echo $apval['address']?></textarea></td>
                                            <td class="warning"><?php echo $city[0]['city'];?></td>
                                            <td class="warning"><?php echo $state[0]['state']?></td>
                                              <td class="success"><?php echo $apval['status']?></td>
                                            <td class="success"><?php echo $apval['active']?></td>
                                            <td><form method="post" action ="asso_approval" onsubmit="return confirm('Do you really want to Approve?');" > <input type="hidden" name="upuid" value="<?php echo $apval['uid'];?>"><button  id="<?php echo $apval['uid'];?>" class="btn btn-success btn-xs"  ><i class="icon-ok"></i></button></form></br><form method="post" action="asso_approval"  onsubmit="return confirm('Do you really want to Delete?');"><input type="hidden" name="deluid" value="<?php echo $apval['uid'];?>"><button class="btn btn-danger btn-xs" id="decline"><i class="icon-remove"></i></button></form></td>
                                        </tr>
<?php

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

