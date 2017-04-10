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
<link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/bootstrap-fileupload.min.css" />
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
                     Advertisement Setting                 
                 </div>
                     <div class="panel-body">
                         
                        <div class="col-md-12" >
                            <div class="row">
                             <div class="alert alert-success">1 Blocks Ad</div>   
                            <?php
                            
                            $attributes = array('class' => '','id' => '');
echo form_open_multipart(base_url()."index.php/admin/advertise", $attributes); 

$addata = $this->admin_model->getadbyseg('1');


?>
                             <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" class="form-control" name="adv_title">
                                  <?php echo form_error('adv_title'); ?>
                             </div>     
                            
                                    <div class="form-group">
                        <label class="control-label ">Advertise(Width:900px ,Height:510px)<span class="required">*</span></label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($addata){echo base_url()."upload/ad/".$addata[0]['ad_img'];}else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" style="height:150px"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="adv" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                     
                        <?php echo form_error('adv'); ?>
                        <input type="hidden" name="seg" value="1">
                    </div>  
                                <?php echo form_submit( 'submit', 'Submit','class="btn btn-success"'); ?>
                        
                               
                                
                                <?php echo form_close(); ?>
                              
                             </div> 
                            </div> 
                         <hr>
                                <div class="col-md-12" >
                                    <div class="row">
                                      
                                      <div class="alert alert-success">2 Blocks Ad</div>           
                            <?php
                            
                            $attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open_multipart(base_url()."index.php/admin/advertise", $attributes); 

$twaddata = $this->admin_model->getadbyseg('2');

?>
                            
                              <div class="col-md-6">
                                   <div class="form-group">
                                       <label>title</label>
                                 <input type="text" class="form-control" name="adv1_title">
                                   <?php echo form_error('adv1_title'); ?>
                             </div>     
                                    <div class="form-group">
                        <label class="control-label ">Advertise(Width:450px ,Height:255px)<span class="required">*</span></label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if (isset($twaddata[0]['ad_img'])){echo base_url()."upload/ad/".$twaddata[0]['ad_img'];}else{ echo base_url()."assets/img/demoUpload.jpg";}?>" alt="" style="height:150px"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="adv1" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                     
                        <?php echo form_error('adv1'); ?>
                        <input type="hidden" name="seg" value="2">
                        </div> 
                                            </div>
                                          <div class="col-md-6">
                                          <div class="form-group">
                                       <label>title</label>
                                   <input type="text" class="form-control" name="adv2_title">
                                   <?php echo form_error('adv2_title');?>
                             </div>  
                                              <div class="form-group">
                        <label class="control-label ">Advertise(Width:450px ,Height:255px)<span class="required">*</span></label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if (isset($twaddata[1]['ad_img'])){echo base_url()."upload/ad/".$twaddata[1]['ad_img'];}else{ echo base_url()."assets/img/demoUpload.jpg";}?>" alt="" style="height:150px" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="adv2" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                     
                        <?php echo form_error('adv2'); ?>
                        
                                              </div>  </div>
                                <?php echo form_submit( 'submit', 'Submit','class="btn btn-success"'); ?>
                        
                               
                                
                                <?php echo form_close(); ?>
                              
                            
                            </div>
                    </div>
                <hr>
                  <div class="col-md-12" >
                                    <div class="row">
                                      
                                        <div class="alert alert-success">3 Blocks Ad</div>           
                            <?php
                            
                            $attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open_multipart(base_url()."index.php/admin/advertise", $attributes); 
$thddata = $this->admin_model->getadbyseg('3');
?>
                            
                                         <div class="col-md-4">
                                   <div class="form-group">
                                       <label>title</label>
                                 <input type="text" class="form-control" name="adv3_title">
                                  <?php echo form_error('adv3_title'); ?>
                             </div>     
                                    <div class="form-group">
                        <label class="control-label ">Advertise(Width:300px ,Height:170px)<span class="required">*</span></label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if(isset($thddata[0]['ad_img'])){echo base_url()."upload/ad/".$thddata[0]['ad_img'];}else{ echo base_url()."assets/img/demoUpload.jpg";}?>" alt="" style="height:150px"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="adv3" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                     
                        <?php echo form_error('adv3'); ?>
                        <input type="hidden" name="seg" value="3">
                    </div> 
                                            </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                       <label>title</label>
                                 <input type="text" class="form-control" name="adv4_title">
                                  <?php echo form_error('adv4_title'); ?>
                             </div>    
                                              <div class="form-group">
                        <label class="control-label ">Advertise(Width:300px ,Height:170px)<span class="required">*</span></label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  if(isset($thddata[1]['ad_img'])){echo base_url()."upload/ad/".$thddata[1]['ad_img'];}else{echo base_url()."assets/img/demoUpload.jpg";  }?>" alt="" style="height:150px;"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="adv4" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                     
                        <?php echo form_error('adv4'); ?>
                        
                                              </div>  </div>
                                         <div class="col-md-4">
                                              <div class="form-group">
                                       <label>title</label>
                                 <input type="text" class="form-control" name="adv5_title">
                                  <?php echo form_error('adv5_title'); ?>
                             </div>    
                                              <div class="form-group">
                        <label class="control-label ">Advertise(Width:300px ,Height:170px)<span class="required">*</span></label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if(isset($thddata[2]['ad_img'])){echo base_url()."upload/ad/".$thddata[2]['ad_img'];}else{ echo base_url()."assets/img/demoUpload.jpg";}?>" alt="" style="height:150px"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="adv5" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                     
                        <?php echo form_error('adv5'); ?>
                        
                                              </div>  </div>
                          <?php echo form_submit( 'submit', 'Submit','class="btn btn-success"'); ?>
                        
                               
                                
                                <?php echo form_close(); ?>
                              
                            
                            </div>
                    </div>
               

                <hr />
             
                <form action="<?php echo base_url();?>index.php/admin/set_ad" method="post">
                    <label>Block1 Ad</label>
                   <?php 
                   $data = $this->admin_model->getalladbyseg('1');
                  // $i=0;
                   $options[0]="Please Select";
                  foreach($data as $vl)
                  {
                       $options[$vl['id']]=$vl['ad_title'];
                       //$i++;
                  }
                  $seldt = $this->admin_model->getadbyseg('1'); 
                  $sel="0";
                  if($seldt)
                  {
                  $sel = $seldt[0]['id'];
                  }
 else 
     {
     
       $options[0]="Please Select";
     }
                   $js = 'class="form-control"';
                    echo form_dropdown('block1', $options,$sel,$js);
                    
                    echo form_error('block1');
                    ?>
                    <input type="hidden" name="segment" value="1">
                    <br>
                    <button class="btn btn-success btn-sm">
                        Set Ad
                    </button>
                </form>

              <form action="<?php echo base_url();?>index.php/admin/set_ad" method="post">
                    <label>Block2 Ad</label>
           
                    <select name="block2[]" data-placeholder="Choose a ad for block2"  id="two" class="form-control chzn-select" multiple="multiple" tabindex="4" style="height:25px;">

                      <?php
                      $segdata = $this->admin_model->getalladbyseg(2);
                    //  $options[0]="Please Select";
                  foreach($segdata as $svl)
                  {
                    
                 
                  if($svl['status']==='1')
                  {
                  $seltwo = 'selected="selected"';
                  }
 else 
     {
     
       $seltwo="";
     }   //[$svl['id']]=;
                ?> 
                        <option value="<?php echo $svl['id']; ?>" <?php echo $seltwo;?> ><?php echo $svl['ad_title']; ?></option>
                  <?php     
//$i++;
            
                  }
                
                      ?>
<!--                        <option value="United States" selected="selected">United States</option>-->


</select>
                    <?php
                      echo form_error('block2[]');
                    
                    ?>
                     <p></p>
                     <input type="hidden" name="segment" value="2">
                    <button class="btn btn-success btn-sm">
                        Set Ad block2
                    </button>
                </form>
   
                 <form action="<?php echo base_url();?>index.php/admin/set_ad" method="post">
                    <label>Block3 Ad</label>
           
                    <select name="block3[]" data-placeholder="Choose a ad for block3" id="three" class="form-control chzn-select" multiple="multiple" tabindex="4" style="height:25px;">

                      <?php
                      $segtdata = $this->admin_model->getalladbyseg(3);
                    //  $options[0]="Please Select";
                  foreach($segtdata as $stvl)
                  {
                       //[$svl['id']]=;
                       if($stvl['status']==='1')
                  {
                  $selthree = 'selected="selected"';
                  }
 else 
     {
     
       $selthree="";
     }
                ?> 
                        <option value="<?php echo $stvl['id']; ?>" <?php  echo $selthree;   ?>><?php echo $stvl['ad_title']; ?></option>
                  <?php     
//$i++;
            
                  }
                      ?>
<!--                        <option value="United States" selected="selected">United States</option>-->


</select>                    <p></p>
   <?php
                      echo form_error('block3[]');
                    
                    ?>
 <input type="hidden" name="segment" value="3">
 <p> </p> 
                    <button class="btn btn-success btn-sm">
                        Set Ad
                    </button>
                </form>
                    </div>
            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>
 </div> </div></div>
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

   <script src="<?php echo base_url();  ?>assets/plugins/jasny/js/bootstrap-fileupload.js"></script> 
      
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
            $("#two").chosen({
            max_selected_options:2
                  });
                   $("#three").chosen({
            max_selected_options:3
                  });
        </script>  

      
</body>
    <!-- END BODY-->
    
</html>


