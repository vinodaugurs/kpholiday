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
<link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/chosen/chosen.min.css" />

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

<?php require_once 'nav.php'; ?>
         <!-- HEADER SECTION -->
    
        <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
             <div class="panel panel-primary">
                 <div class="panel-heading">
                     Feature Setting
                  </div>
                     <div class="panel-body">
                            
                        <div class="col-md-12" >
                              <form action="<?php echo base_url()."index.php/admin/featured"   ?>" method="post">
                          <p>Featured Package</p>
 <select name="pack[]" data-placeholder="Choose a Package"  class="form-control chzn-select" multiple="multiple" tabindex="4" style="height:25px;">
<?php   
$allpack = $this->admin_model->getallpack();
//$selp = $this->admin_model->getpackfeature();
foreach($allpack as $pkval)
{
$city = $this->region_model->getcitybyid($pkval['city']);   
$state = $this->region_model->getstatebyid($pkval['state']);
$cntry = $this->region_model->getcntbyid($pkval['country']);
if($pkval['featured']==='1')
{
    $sel = 'selected="selected"';
}
else
{
    $sel='';
}
?>
                                    
<option value="<?php echo $pkval['id']   ?>" <?php echo $sel; ?>><?php echo $pkval['pack_name']." - ".$cntry[0]['country'].",".$state[0]['state'].",".$city[0]['city'] ?></option>
<?php
}

?>
</select>
                                     <br> <br>
                                <button class="btn btn-success ">
                                Set Package
                                </button>
                                </form>
                                <form action="<?php echo base_url()."index.php/admin/featured" ?>" method="post">
                                    <p class="label-control">Featured Destination</p>
                                <select name="desti[]" data-placeholder="Choose a Destination"  class="form-control chzn-select" multiple="multiple" tabindex="4" style="height:25px;">
<?php   
$alldesti = $this->admin_model->getalldesti();
foreach($alldesti as $destival)
{
$dcity = $this->region_model->getcitybyid($destival['city']);   
$dstate = $this->region_model->getstatebyid($destival['state']);
$dcntry = $this->region_model->getcntbyid($destival['country']);

if($destival['featured']==='1')
    
{
    $dsel = 'selected="selected"';
}
else
{
    $dsel='';
}
?>
<option value="<?php echo $destival['id']   ?>" <?php echo $dsel;   ?>><?php echo $destival['name']." - ".$dcntry[0]['country'].",".$dstate[0]['state'].",".$dcity[0]['city'] ?></option>

<?php
}
?>
</select>                          
<p></p>  
   <button class="btn btn-success ">
 Set Destination
                                </button>
     </form>                           
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            
                            </div>
                            
                          
                        
                        
                        
                    
                  
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>
 </div> </div>
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

<script src="<?php echo base_url();  ?>assets/js/jquery-ui.min.js"></script>
 <script src="<?php echo base_url();  ?>assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="<?php echo base_url();  ?>assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>

      
</body>
    <!-- END BODY-->
    
</html>


