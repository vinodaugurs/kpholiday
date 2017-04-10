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

    

    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />

  

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



            <div class="inner">

                <div class="row">

                    <div class="col-lg-12">

<div class="panel panel-primary">

                        <div class="panel-heading">

                          Edit Offer

                        </div>



                       

 <div class="panel-body">

     <form method="post" action ="<?php echo base_url(); ?>index.php/dashboard/update_offer">

   <div class="table-responsive">

   <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    

     <tbody>

                                   

  <?php 

    $id = $this->input->get_post('id');

                                       

           //print_r($data);

      $data = $this ->pack_model->getofferbyid($id);

     

      foreach ($data as $value) 

          {

          

       

      }

     

       echo "<tr class='odd gradeX'>

       <td><div class='form-group input-group'>

     <span class='input-group-addon'  style='background-color: #3a87ad;color: #fff;'>Name</span> <input type ='text' class='form-control' name='offer_name' value='".$value['offer_name']."'/></div></td></tr>

       <tr class='odd gradeX'>   

          <td><div class='form-group input-group'>

          <span class='input-group-addon' style='background-color: #3a87ad;color: #fff;'>Details</span> <textarea name='offer_details'class='form-control' rows='5'>".$value['offer_details']."</textarea></div></td></tr>

             <tr class='odd gradeX'>  

			 <td> <div class='form-group input-group'>

             <span class='input-group-addon'  style='background-color: #3a87ad;color: #fff;'>Discount</span><input type ='text' class='form-control' name='discount' value='".$value['discount']."'</div></td>



    </tr>

   ".form_error('discount')."                               

















<tr class='odd gradeX'>    

                                    













<td ><div class='form-group input-group'>

     <span class='input-group-addon'  style='background-color: #3a87ad;color: #fff;'>status</span><select name = 'status' class='form-control'>

            

           

         <option selected='selected'> ".$value['status']."</option></select></td></tr>

                                   



             <input type='hidden' name='id' value='".$id."'/>

     



";

    

      ?>

  <tr><td><div class='form-group input-group'>

    <span class='input-group-addon'  style='background-color: #3a87ad;color: #fff;'>Attach to package </span>

         <div class="controls"><?php $options = array();          

               

             

       $packdata = $this->pack_model->getpackuid();

       // $i=1;

        $options[0]='Please Select';

        foreach($packdata as $pval)

        {

         $options[$pval['id']] = $pval['pack_name']; 

        // $i++;   

        }

       ?>

             <input type="hidden" name="off_id" value="$id">

   <?php echo form_dropdown('package', $options, $this->input->post('package'),'class=form-control');          

       

       ?>

		<?php echo form_error('package'); ?>

	</div>                               

              </td></tr>                          

                                        

                                      

                                    </tbody>

                                </table>

                            </div>

          <input type="submit" class="btn btn-danger" value="update">

				</form>

<a href="<?php echo base_url();?>index.php/dashboard/deloffer?id=<?php echo $id;?>" class="btn btn-danger">Delete</a>        

		</div>

</div>



                    </div>

                </div>



                <hr />









            </div>









        </div>

       <!--END PAGE CONTENT -->





    </div>





 

    

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

