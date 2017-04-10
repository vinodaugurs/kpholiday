<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="UTF-8" />
<title></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
<!-- GLOBAL STYLES -->
<!-- GLOBAL STYLES -->

<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/validationEngine.jquery.css" />
  

<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/main.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/theme.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/MoneAdmin.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/plugins/Font-Awesome/css/font-awesome.css" />

<!--END GLOBAL STYLES -->

<!-- PAGE LEVEL STYLES -->
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/bootstrap-fileupload.min.css" />
<!-- END PAGE LEVEL  STYLES -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--<script src="<?php echo base_url();?>assets/js/jquery-1.3.2.min.js"></script>-->
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style>
body {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
}
div#container {
	height: 300px;
	position: relative;
	width: 100%;
}
</style>

<!-- END HEAD -->
</head>
	<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


 <?php require_once 'nav.php'; ?>

        

        <!--PAGE CONTENT -->
       <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-primary">
                        <div class="panel-heading">
                       Customize form Details:
                          <p class="pull-right" style="margin-top:-10px;">  </p>
                        </div>
                      
                      

                 <div class="panel-body">
                    
                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
											<th>Contact</th>
											<th>Email</th>
											
                                            <th>Detail</th>
                                            <th>update<br/>icon</th>
                                              
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                        $i=1;
                                        $htdata = $this->associate_model->getuserbyuid();
                                       foreach($htdata as $trans)
                                       {
                                           
                                      
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td ><?php echo $i;  ?></td>
                                           
                                            <td ><?php echo $trans['fullname'];  ?></td>
                                            
											<td><?php echo $trans['contact'];  ?></td>
											<td ><?php echo $trans['email'];  ?></td>
                                           <td>
										     <a href="<?php echo  site_url('dashboard/c_detail/'.$trans['id']);?>">View Detail</a>
										   </td>  
                                        
										<td>
																			
																		
											<a  href="<?php echo site_url('dashboard/del_customize/'.$trans['id']);?>">
											<i class="icon-remove"></i>		
											</a>
										
										</td>
                                        </tr>
                                        
		
										
										<?php
                                        $i++;
                                        }                                      
                                        ?>
   </tbody>
                                </table>
                            </div>

                     
                     
                     
                     
                     
        </div>
</div>
                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     
       <!-- Large modal -->

  <div id="footer">
       <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validationEngine.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validationEngine-en.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validationInit.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>


<script  type="text/javascript" src="<?php echo base_url();  ?>assets/js/jquery-1.9.1.min.js"></script>
<script  type="text/javascript" src="<?php echo base_url();  ?>assets/js/bootstrap.min.js"></script> 
<!--<script src="<?php // echo base_url();  ?>assets/plugins/jquery-2.0.3.min.js"></script>--> 
<script src="<?php echo base_url();  ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
<script src="<?php echo base_url();  ?>assets/js/bootstrap-fileupload.js"></script> 

</body>
<!-- END BODY -->
</html>