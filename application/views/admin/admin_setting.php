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

<?php require_once 'nav.php'; ?>
         <!-- HEADER SECTION -->
    
        <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
<div class="panel panel-primary">
                        <div class="panel-heading">
                         Site Setting
                        </div>
                        <div class="panel-body">
                            
                            <div class="col-md-4" >
                            
                                <form action="<?php  echo base_url();?>index.php/admin/setting" onsubmit="return confirm('Do you really want to proceed?');" method="post">                           
                               
                                <div class="form-group">
                                            <label>Site Offline</label>
                                            <div class="checkbox">
                                                <?php  
                                               $set =  $this->admin_model->getsetting(); 
                                             if ($set[0]['site_off'])
                                             {
                                                 $c = "checked";
                                             }
                                             else
                                                 {
                                                 $c="";
                                             }
                                               ?>
                                                <label>
                                                    <input id="off" type="checkbox"  name="siteoff" <?php echo $c;  ?> value="">Offline Mode
                                                </label>
                                            </div>
                                          
                                        </div>
                             
                                    <input type="hidden" id="checkme" name="checkme"  value=""> 
                             
                          <br>
                                <button class="btn-success btn-sm">Save</button>
                               
                           </form>
                            
                            </div>
                            
                            <div class="col-md-4">
                                
                                <form action="<?php  echo base_url();?>index.php/admin/setting" onsubmit="return confirm('Do you really want to change?');"method="post">    
                                      <div class="form-group">
                                            <label>Service charge</label>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon">%</span>
                                    <input type="text" name="comission" value="<?php  echo $set[0]['commision'];   ?>" class="form-control">
                                  
                                            
                                            </div>
                                    <br>
                                       <button class="btn-success btn-sm">Save</button></div>
                                </form>
                            </div>
                            
                           <div class="col-md-4">
                                
                                   <form action="<?php  echo base_url();?>index.php/admin/setting" onsubmit="return confirm('Do you really want to chamge?');"method="post">          
                                      <div class="form-group">
                                            <label>Point(5 Star)</label>
                                   <div class="form-group input-group">
                                       <span class="input-group-addon"><i class="icon-trophy"></i></span>
                                            <input type="text" name="points" value="<?php  echo $set[0]['point'];   ?>" class="form-control">
                                    </div>
                                            <br>
                                       <button class="btn-success btn-sm">Save</button></div>
                                </form>
                            </div>
                            
                            
                            <div class="col-md-4" >
                                
                                
                                 <form action="<?php  echo base_url();?>index.php/admin/setting" onsubmit="return confirm('Do you really want to chamge?');"method="post">          
                                      <div class="form-group">
                                            <label>Min Payout</label>
                                   <div class="form-group input-group">
                                       <span class="input-group-addon"><i class="icon-credit-card"></i></span>
                                            <input type="text" name="min_pay" value="<?php  echo $set[0]['min_pay'];   ?>" class="form-control">
                                   <input type="hidden" name = "minpay" value="1">
                                   </div>
                                            <br>
                                       <button class="btn-success btn-sm">Save</button></div>
                                </form>
                                
                                
                                
                            </div>
                            
                            
                            
                            
                            
                            
                            </div>
    </div>
               
                        
                        
                        
                    
                  <div class="panel panel-primary">
                        <div class="panel-heading">
                         Setting
                        </div>
                        <div class="panel-body">
                            
                            <div class="col-md-6">
                                
                                <div class="panel panel-default">
                                     <div class="panel-heading">
                       Site Details
                        </div>
                                     <div class="panel-body">
                                  <form action="<?php  echo base_url();?>index.php/admin/setting" method="post">
                                <label> Site title</label>
                                <input type="text" name="site_name" value="<?php  echo $set[0]['site_name'];   ?>" class="form-control">  
                                <label> Site Description</label>
                                <input type="text" name="site_description" value="<?php  echo $set[0]['site_description'];   ?>" class="form-control">  
                                <label> Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="<?php  echo $set[0]['meta_keywords'];   ?>" class="form-control"> 
                                 <label> Meta Author</label>
                                <input type="text" name="meta_author" value="<?php  echo $set[0]['meta_author'];   ?>" class="form-control"> 
                                <br>
                                <input type="hidden" name="sitedetail" value="1">
                                  <button class="btn btn-success">SET</button>
                                  </form>
                                    </div></div>
                            </div>
                            
                            
                            <div class="col-md-6">
                               <div class="panel panel-default">
                                     <div class="panel-heading">
                                      SMTP Details
                                      </div>
                                     <div class="panel-body">
                                <form action="<?php  echo base_url();?>index.php/admin/setting" method="post">
                                <label> Host</label>
                                <input type="text" name="smtp_host" value="<?php  echo $set[0]['smtp_host'];   ?>" class="form-control"> 
                             		<?php echo form_error('smtp_host') ."<br>"; ?>

                                <label> user</label>
                                  <input type="text" name="smtp_user" value="<?php  echo $set[0]['smtp_user'];   ?>" class="form-control">  
                                <?php echo form_error('smtp_user')."<br>"; ?>
                                  
                                  
                                  <label> Password</label>
                                  <input type="text" name="smtp_pass" value="<?php  echo $set[0]['smtp_pass'];   ?>" class="form-control"> 
                                  <?php echo form_error('smtp_pass')."<br>"; ?>
                                  <label> Port</label>
                                  <input type="text" name="smtp_port" value="<?php  echo $set[0]['smtp_port'];   ?>" class="form-control">
                                  <?php echo form_error('smtp_port')."<br>"; ?>
                                  <label> From</label>
                                  <input type="text" name="smtp_from" value="<?php  echo $set[0]['smtp_from'];   ?>" class="form-control">
                                  <?php echo form_error('smtp_from')."<br>"; ?>
                                  <input type="hidden" name="smtp" value="1">
                                  <br>
                                  <button class="btn btn-success btn-default">SET</button>
                            </form></div></div>
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
         
   $( "input[type=checkbox]" ).change(function() {
   $('#off').val('0'); 
   
   if ($('#off').is(":checked"))
{
    $('#off').val('1');
    //alert("checked");
  // it is checked
}
else
{
   $('#checkme').val('1'); 
 //alert("not checked");  
}
   
   //'unchecked' event code
});
    
    
    });
    </script>
      
</body>
    <!-- END BODY-->
    
</html>


