<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
    
        <!-- END HEADER SECTION -->

 <?php require_once 'nav.php'; ?>

        <!-- MENU SECTION -->
   
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content" style="width:81%;padding-left:14px ;padding-top:25px;">

                <div class="row">
                    <div class="col-lg-12">

<div class="panel panel-primary">
                        <div class="panel-heading">
                          Create Offers
                        </div>
  
 <div class="panel-body">
                           
        <fieldset><legend></legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open(base_url().'index.php/dashboard/offers', $attributes); ?>
<div class="control-group">
      <p></p>
<!--    <label for="offer_name" class="control-label"> <span class="required">*</span></label>-->
<div class="alert alert-info">Offer  name *</div>
	<div class='controls'>
       <input id="offer_name" class="form-control" type="text" name="offer_name" maxlength="255" value="<?php echo set_value('offer_name'); ?>"  />
		 <?php echo form_error('offer_name'); ?>
	</div>
</div><div class="control-group">
              <p></p>
   <div class="alert alert-info">Offer  details *</div>
<div class='controls'>
	<?php echo form_textarea( array( 'name' => 'offer_details', 'rows' => '5','class'=>'form-control', 'cols' => '80', 'value' => set_value('offer_details') ) )?>
	<?php echo form_error('offer_details'); ?>
</div>
</div>
            
<div class="control-group">
    <p></p>
   <div class="alert alert-info">Discounts *</div>
	<div class='controls'>
       <input id="discount" class="form-control" type="text" name="discount" maxlength="255" value="<?php echo set_value('discount'); ?>"  />
		 <?php echo form_error('discount'); ?>
	</div>
</div>
            <div class="control-group">
   
                  <p></p>
                 <div class="alert alert-info">Attach to Package </div>
	<div class='controls'>
       <div class="controls"><?php $options = array();          
       $packdata = $this->pack_model->getpackuid();
       // $i=1;
        $options[0]='Select Package';
        foreach($packdata as $pval)
        {
           $options[$pval['pack_id']] = $pval['pack_name']; 
        // $i++;   
        }
       ?>
 
   <?php echo form_dropdown('package', $options, $this->input->post('package'),'class=form-control');          
       
       ?>
		<?php echo form_error('package'); ?>
	</div>
	</div>
</div>
            
            
            
            
            
            
            
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit','class=" btn btn-success"'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>                  
     
     
     
     
     
     
                        </div>
                        </div>

                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


   


 
    
  <div id="footer">
        
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
<script type="text/javascript" src="<?php echo base_url();?>chat/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>chat/js/chat.js"></script>

    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
