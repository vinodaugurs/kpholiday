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
                           Package List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Uid</th>
                                            <th>Package name</th>
                                            <th>Details</th>
                                            <th>Price</th>
                                            <th>city</th>
                                            <th>Offer</th>
                                            <th>Status by admin</th>
                                            <th>Enable by asso</th>
                                           <th>start date</th>
                                         
                                            <th>Inactive Reason</th>
                                              <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php 
                                        $c=1;
                                        $apdata = $this->admin_model->getallpack();  
                                       
                                        foreach ($apdata as $apval)
                                        {
                                          $city = $this->region_model->getcitybyid($apval['city']); 
                                          $state = $this->region_model->getstatebyid($apval['state']);  
                                          //$city[0]['city'];
                                          
                                         if ($apval['view'] === '0')
                                         {
                                          $v="<button class='btn btn-danger btn-xs'>Inactive</button>";    
                                         }
                                         elseif($apval['view'] === '1')
                                         {
                                           $v="<button class='btn btn-danger btn-xs'>Active</button>";
                                         }
                                         elseif($apval['view'] === '2')
                                         {
                                           $v="<button class='btn btn-danger btn-xs'>By Date</button>";  
                                         }
                                          
                                          
                                         $offername = $this->admin_model->getofferbyid($apval['offer_id']); 
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="warning"><?php echo $c;  ?></td>
                                            <td class="warning"><?php echo $apval['uid']?></td>
                                            <td class="warning" ><?php echo $apval['pack_name']?></td>
                                            <td class="warning"><textarea class ="form-control" disabled="disabled"><?php echo $apval['details']?></textarea></td>

                                            <td class="warning"><?php echo $apval['price'];?></td>
                                            <td class="warning"><?php echo $apval['city'];?></td>
                                            <td class="warning"><?php if ($offername){echo $offername[0]['offer_name'];}?></td>
                                            <td class="danger"><?php echo "<button class='btn btn-success btn-xs'>".$apval['status']."</button>";?></td>
                                             <td class="danger"><?php echo $v ;?></td>
                                            <td class="success"><?php echo $apval['start_date']?></td>
                                            <td><form method="post" action ="pack_approve?pid=<?php echo $apval['id']?>" onsubmit="return confirm('Do you really want to proceed?');" ><textarea name="<?php echo $apval['id']."reason";?>" class="form-control"><?php if ($apval['reason']===""){echo "";}else{echo $apval['reason']; } ?></textarea></td>
                                            <td> <input type="hidden" name="sus" value="<?php  if ($apval['status']==='active')
                                        {
                                        
                                         echo 1;
                                        }else{ echo 0; } ?>"><input type="hidden" name="pid" value="<?php echo $apval['id'];?>"><button  id="<?php echo $apval['uid'];?>" class="btn btn-success btn-xs"  ><i class="icon-off"></i></button></form></br><p></p><form method="post" action="<?php echo base_url(); ?>index.php/admin/pack_edit?pid=<?php echo $apval['id'];?>"><input type="hidden" name="pid" value="<?php echo $apval['id'];?>"><button class="btn btn-primary btn-xs" id="update"><i class="icon-edit"></i></button></form></td>
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
        <p>&copy; kpholidays.com &nbsp;2014 &nbsp;</p>
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
                    
             //$('#reasonbox').html("<textarea  class='form-control'></textarea>");              
             $('#dataTables-example').dataTable();
         });
    </script>
     
</body>
    <!-- END BODY-->
    
</html>

