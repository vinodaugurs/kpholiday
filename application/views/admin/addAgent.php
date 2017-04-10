<?php $this->load->view('admin/header');?>
 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.js"></script>
     <!-- MAIN WRAPPER -->

    <div id="wrap" style="padding-top:30px;">

   <?php require_once 'nav.php';    ?>

         <!-- HEADER SECTION -->

        <!--PAGE CONTENT -->

       <div id="content" style="padding-top:30px;">

            <div class="inner" style="min-height:1200px;">

                <div class="row">

                    <div class="col-lg-12">

<div class="panel panel-primary">

                        <div class="panel-heading">

                          Add New Agent

                        </div>

                        <div class="panel-body">

                            <div class="" >
                            <div style="color:red;"><?php echo validation_errors(); ?></div>
      
								<form action="<?php echo base_url('index.php/dashboard/agentForm');?>" method="post" role="form">
  <table>
    <!--<div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">user_name:</label></div>
      <div class="col-sm-10">
        <input type="text" name="user_name" class="form-control" id="email" placeholder="Enter User Name" required>
      </div>
       <div class=" clearfix"></div>
    </div>-->
    <div class="form-group">
      <div class="col-sm-2"><label class="control-label col-sm-2" for="email">First Name:</label></div>
      <div class="col-sm-10">
        <input type="text" name="first_name" class="form-control" id="email" placeholder="Enter First Name" required>
      </div>
       <div class=" clearfix"></div>
    </div>
    <div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">Last Name</label></div>
      <div class="col-sm-10">
        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name"  required>
      </div>
       <div class=" clearfix"></div>
    </div>
   <!-- <div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">password</label></div>
      <div class="col-sm-10">
        <input type="text" name="password" class="form-control" required>
      </div>
           <div class=" clearfix"></div>

    </div>-->
    <div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">E-mail</label></div>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="email_id" placeholder="Enter E-Mail Address"  required>
      </div>
      <div class=" clearfix"></div>
    </div>
    
<script>
$(document).ready(function(){
$('#email_id').change(function(){
var mail = 	$('#email_id').val();
$.ajax ( {
          url: "<?php echo base_url();?>index.php/dashboard/check_mail",
          data:{email:mail},
          type:'post',
          dataType: "json",
       crossDomain: true,
          success: function(data) {           
      	alert(data);
          } 
    });
});
});

</script>    

    <div class="form-group">
      <div class="col-sm-2"><label class="control-label col-sm-2" for="email">Phone No.</label></div>
      <div class="col-sm-10">
        <input type="number" name="phone"  class="form-control" placeholder="Enter Phone No"  required>
      </div>
       <div class=" clearfix"></div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"><label class="control-label col-sm-2" for="email">Address</label></div>
      <div class="col-sm-10">
        <input type="text" name="address" class="form-control" placeholder="Enter Adress "  required>
      </div>
           <div class=" clearfix"></div>

    </div>

    <div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">Country</label></div>
      <div class="col-sm-10">
        <input type="text" name="country" class="form-control" id="country" placeholder="Enter Country "  required>
      </div>
           <div class=" clearfix"></div>

    </div>
    <div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">State</label></div>
      <div class="col-sm-10">
        <input type="text" name="state" class="form-control" id="state" placeholder="Enter State"  required>
      </div>
       <div class=" clearfix"></div>
    </div>
    <div class="form-group">
     <div class="col-sm-2"><label class="control-label col-sm-2" for="email">City</label></div>
      <div class="col-sm-10">
        <input type="text" name="city" class="form-control" id="city" placeholder="Enter City"  required> 
      </div>
      
       <div class=" clearfix"></div>
    </div>
    <div class="form-group">
     <div class="col-sm-2"> <label class="control-label col-sm-2" for="email">Pincode</label></div>
      <div class="col-sm-10">
        <input type="text" name="pincode" class="form-control"  placeholder="Enter Pincode "  required>
      </div>
       <div class=" clearfix"></div>
    </div>
    <tr>
      <td></td>
      <td><input type="submit" class="btn btn-primary btn-lg active" name="submit"></td>
    </tr>
  </table>
</form>
                    </div></div></div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>

    <!--END FOOTER -->
<script type="text/javascript">
  $(document).ready(function(){
	  
	  $("#country").autocomplete( {
    source: function(request,response) {
    console.log($('#Domestic2').is(':checked'));
    var data = $('#country').val();
        $.ajax ( {
          url: "<?php echo base_url();?>index.php/dashboard/get_country",
          data:{data:data},
          type:'post',
          dataType: "json",
       crossDomain: true,
          success: function(data) {           
      response( $.map( data.myData, function( item ) {
                return {
                    label: item.city,
                    value: item.CODE
                }
            }));
          } 
    }) }
 });
 
 
  $("#state").autocomplete( {
    source: function(request,response) {
    console.log($('#Domestic2').is(':checked'));
    var data = $('#state').val();
        $.ajax ( {
          url: "<?php echo base_url();?>index.php/dashboard/get_state",
          data:{data:data},
          type:'post',
          dataType: "json",
       crossDomain: true,
          success: function(data) {           
      response( $.map( data.myData, function( item ) {
                return {
                    label: item.city,
                    value: item.CODE
                }
            }));
          } 
    }) }
 });
 
 
 $("#city").autocomplete( {
    source: function(request,response) {
    console.log($('#Domestic2').is(':checked'));
    var data = $('#city').val();
        $.ajax ( {
          url: "<?php echo base_url();?>index.php/dashboard/get_city",
          data:{data:data},
          type:'post',
          dataType: "json",
       crossDomain: true,
          success: function(data) {           
      response( $.map( data.myData, function( item ) {
                return {
                    label: item.city,
                    value: item.CODE
                }
            }));
          } 
    }) }
 });

  });
</script>    

<?php $this->load->view('admin/footer');?>


