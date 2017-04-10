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

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/bootstrap-wysihtml5-hack.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>

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


         <!-- HEADER SECTION -->
   <?php require_once 'nav.php';    ?>
         <!-- HEADER SECTION -->
       
        <!--PAGE CONTENT -->
       <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">

<div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-pencil"></i> Edit Announcement
                        </div>
                        <div class="panel-body">
                           
                        
                        
                        
                            <form action="<?php echo base_url() ;?>index.php/admin/upanno" method="post">
                             <div class="form-group">
                                            <label>Select Recipient</label>
                                            <select name="upannorecipient" class="form-control">
                                               
                                                <option value="1">Traveler</option>
                                                <option value="2">Associate</option>
                                                <option value="12">Both(Traveler/Associate)</option>
                                               
                                            </select>
                                            
                                            
                                        </div>
                                 <?php echo form_error('upannorecipient'); ?>
                                <div class="form-group">
                                            <label>Email Body</label>
                                 <?php  
                                $data = $this->admin_model->getannobyid($editid);
                                
                                ?>
                                            <textarea name="upannomessage" id="wysihtml5" class="form-control" rows="10"><?php echo $data[0]['details'] ?></textarea>
                                            <input type="hidden" name="editid" value="<?php  echo $editid   ?>">
                                <?php echo form_error('annomessage'); ?>
                                </div>
                                
                             

                                
                                
                                
                                
                                
                                
                                
                                <button class="btn btn-success btn-sm" > <i class="icon-volume-down"></i> Update Announce</button>
                            
                            
                            
                            
                            
                            
                            </form>
                       
                       
    
                            
                            
                            
                            
                    
                        
                        
                        
                        
                        
                      
                        
                        
                        
                        
                        
                        </div></div>



                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
     <script src="<?php echo base_url();  ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="<?php echo base_url();  ?>assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="<?php echo base_url();  ?>assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>


      
</body>
    <!-- END BODY-->
    
</html>

