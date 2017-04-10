<!DOCTYPE HTML>
<html>
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
      <link href="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php  echo base_url(); ?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url(); ?>uploadify/uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
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
       <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-primary">
                        <div class="panel-heading">
                        My Hotel
                          <p class="pull-right" style="margin-top:-10px;">  </p>
                        </div>
                      
                      

                 <div class="panel-body">
                    
                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>hotel Name</th>
                                            <th>No. of room</th>
                                            <th>main image</th>
                                           
                                            <th>country</th>
                                            <th>state</th>
                                             <th>city</th>
                                             <th>update hotel</th>
                                              
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                        $i=1;
                                    $htdata = $this->associate_model->gethotelbyuid();
                                       foreach($htdata as $trans)
                                       {
                                           
                                      $ctry = $this->region_model->getcntbyid($trans['country']);
                                      $state = $this->region_model->getstatebyid($trans['state']);
                                      $city = $this->region_model->getcitybyid($trans['city'] );
                                        
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="warning"><?php echo $i;  ?></td>
                                            <td class="warning"><button class="btn btn-primary btn-xs " ><?php  echo $trans['hotel_name'];?></button></td>
                                            <td class="warning"><?php $data=$this->pack_model->all_room($trans['hotel_id']);
										 
											     echo "<ol>";
										if(!empty($data))
										{	    
											foreach($data as $room)
											{    
											     echo "<li>".$room['room_type']." "."<a href='".site_url('dashboard/edit_room/'.$room['room_id'])."' align='right'>edit</a>"."</li>";						 
											     echo "<br/>";
											}
										}
										else
										{ 
									       echo "Sorry you have not created any room of this Hotel !";
									    }
											?>
										   </ol>
										</td>
                                            <td class="warning"><img class="img-thumbnail" src="<?php  echo base_url()."upload/hotel/".$trans['main_image']   ; ?>" width="100" height="100"></td>
                                            <td class="warning"><?php  echo $ctry[0]['country'] ;   ?></td>
                                            <td class="warning"><?php  echo $state[0]['state'] ;   ?></td>
                                            <td class="warning"><?php  echo $city[0]['city']   ; ?></td>
                                            <td class="warning"><a class="btn btn-primary btn-circle" href="<?php echo site_url()."/dashboard/edit_hotel?id=".$trans['id'];  ?>"><i class="icon-pencil"></i></a>&nbsp;	<a class="btn btn-primary btn-circle" href="<?php echo site_url()."/dashboard/del_hotel?id=".$trans['id'];  ?>">
											<i class="icon-remove"></i></a></td>
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


 

    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
   
               
	
        
