<?php  include'header.php';?>
<div id="page-wrapper">
<section id="content">
<div class="page-title-container">
  <div class="container">
    <div class="page-title pull-left">
      <h2 class="entry-title">My Booking</h2>
    </div>
    <ul class="breadcrumbs pull-right">
      <li><a href="#">HOME</a></li>
      <li><a href="#">PAGES</a></li>
      <li class="active">My Booking</li>
    </ul>
  </div>
</div>
<div class="container">
    <div class="row">
        <div id="main" class="col-md-12 Runningtext">
        <div class="Runningtext-Box">

                                <h2 class="tab-content-title">Your Profile</h2>
                                <p>Please update your details so that we can share the best deals with you.</p>
                                
                                    <div class="YourProfile">
                                    	<div class="col-sm-8 YourProfileHeader">
                                            <div class="col-sm-2">
                                            <img src="https://d22r54gnmuhwmk.cloudfront.net/app-assets/global/default_user_icon-7a95ec473c1c41f6d020d32c0504a0ef.jpg" width="62" alt=""/>
                                            </div>
                                            <div class="col-sm-10">
                                            	<div class="YourProfileRow">
                                                    <!-- <div class="col-sm-4 text-right">Title*:</div>
                                                    <div class="col-sm-8">
                                                    	<select class="form-control" id="profile_title">
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Mrs.">Mrs.</option>
                                                            <option value="Ms.">Ms.</option>
                                                        </select>
                                                    
                                                    
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                </div><!--YourProfileRow-->
                        					<div class="YourProfileRow">
                                            <form action="javascript:void(0)" method="post">
                                                <div class="col-sm-4 text-right">Full Name*:</div>
                                                <div class="col-sm-8 ">

                                                    <div class="col-sm-6" style="padding-left:0 !important;"><input type="text" class="form-control" placeholder="First Name" id="txtFirstname" value="<?php if(isset($profile['0']['first_name'])){ echo $profile['0']['first_name']; } ?>" required></div>

                                                    <div class="col-sm-6" style="padding-right:0 !important;"><input type="text" class="form-control" placeholder="Last Name" id="txtLastName" value="<?php if(isset($profile['0']['last_name'])){ echo $profile['0']['last_name']; } ?>" required></div>

                                                 	<div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div><!--YourProfileRow-->
                                                
                                                <div class=" text-center">
                                                <p><i class="soap-icon-facebook font-f"></i> &nbsp;&nbsp;&nbsp;You are not connected with Facebook.</br>Connect</p>
                                                
                                                
                                                </div>
                                                
                                                
                                                <div class="cleafix"></div>

                                            </div>
                                            <div class="cleafix"></div>
                                            
                                            
                                            <div>
                                            
                                            <div class="cleafix"></div>
                                             <h2 class="tab-content-title">Your Profile</h2>
                                           		<div class="col-sm-2 "></div>
                                            	<div class="col-sm-10 ">

                                            
                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right">Email ID:</div>
                                                        <div class="col-sm-8 ">
                                                            
                                                            <input type="email" class="form-control" required id="textEmail" placeholder="jane.doe@example.com" value="<?php if(isset($profile['0']['email'])){ echo $profile['0']['email']; } ?>">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    
                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right">Password:</div>
                                                        <div class="col-sm-8 ">
                                                            
                                                            <input type="password" class="form-control" required id="txtpassword" placeholder="Change Your Password">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    
                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right">Mobile Number*:</div>
                                                        <div class="col-sm-8 ">
                                                            
                                                        <input type="text" class="form-control" required id="numPhone1" placeholder="Enter phone Number" value="<?php if(isset($profile['0']['phone'])){ echo $profile['0']['phone']; } ?>">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    
                                                     <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right">Address:</div>
                                                        <div class="col-sm-8 ">
                                                            
                                                            <textarea class="form-control" rows="3" required placeholder="Enter Your Address" id="textAddress" ><?php if(isset($profile['0']['address'])){ echo $profile['0']['address']; } ?></textarea>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    
                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right"> Country :</div>
                                                        <div class="col-sm-8 ">

                                                            <!-- <div class="col-sm-6" style="padding-left:0 !important;"> <input type="text" class="form-control" id="" placeholder="City"></div> -->

                                                            <div class="col-sm-6" style="padding-right:0 !important;">

                                                        <?php $country = $this->region_model->getcountry(); ?>
                                                            <select id="dropGetCountry" class="form-control" required>
                                                            <option value="">-Select Country-</option>
                                                        <?php foreach($country as $value){ 
                                                            
                                                            if($profile['0']['country'] == $value['id']){
                                                                echo '<option value='.$value['id'].' selected>';
                                                            }else{echo '<option value='.$value['id'].'>';}
                                                             
                                                             echo $value['country'].'</option>';

                                                             }?>


                                                            }?>
                                                        </select>

                                                            </div>
                                                           
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    
                                                    
                                                          <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right"> State :</div>
                                                        <div class="col-sm-8 ">
                                                            
                                                            <div class="col-sm-6" style="padding-right:0 !important;">

                                                            <?php 
                                                                $state = $profile['0']['state'];
                                                                $stateData = $this->region_model->getStateValue($state);
                                                                ?>

                                                            <select name="state" id="dropGetState" class="form-control" required>
                                                                <option value="">-Select State-</option>
                                                                    <?php if(isset($profile['0']['state'])){
                                                                    echo '<option value='.$profile['0']['state'].' selected>'.$stateData['0']['state'].'</option>';
                                                                    } ?>
                                                            </select>
                                                            
                                                            
                                                            
                                                            </div>
                                                           
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->

                                                    
                                                    
                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right">City :</div>
                                                        <div class="col-sm-8 ">
                                                            <!-- <div class="col-sm-6" style="padding-left:0 !important;"> <input type="text" class="form-control" id="" placeholder="Other State"></div> -->
                                                            <div class="col-sm-6" style="padding-right:0 !important;">
                                                            <?php 
                                                            $city = $profile['0']['city'];
                                                            $cityData = $this->region_model->getCityValue($city);
                                                            ?>

                                                            <select  name="city" id="dropGetCity" class="form-control" required>
                                                            <option value="">-Select City-</option>
                                                            <?php if(isset($profile['0']['city'])){
                                                                echo '<option value='.$profile['0']['city'].' selected>'.$cityData['0']['city'].'</option>';
                                                                } ?>
                                                            </select>
                                                            
                                                            
                                                            
                                                            </div>
                                                           
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->

                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right"> Pincode :</div>
                                                        <div class="col-sm-8 ">
                                                            <div class="col-sm-6" style="padding-left:0 !important;"> <input type="text" class="form-control" id="numPincode1" placeholder="Pincode" value="<?php if(isset($profile['0']['PinCode'])){ echo $profile['0']['PinCode']; } ?>" required></div>
                                                            
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="YourProfileRow">
                                                        <!-- <div class="col-sm-4 text-right">My Subscription:</div>
                                                        <div class="col-sm-8 ">
                                                            <div class="col-sm-6" style="padding-left:0 !important;"> 
                                                                <div class="checkbox">
                                                                    <label>
                                                                      <input type="checkbox"> SMS Alerts
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right:0 !important;">
                                                             <div class="checkbox">
                                                                    <label>
                                                                      <input type="checkbox"> Low Fare Alerts
                                                                    </label>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="clearfix"></div>
                                                        </div> -->
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    
                                                    <div class="YourProfileRow">
                                                        <div class="col-sm-4 text-right"></div>
                                                        <div class="col-sm-8 ">
                                                             <!-- <div class="checkbox">
                                                                    <label>
                                                                      <input type="checkbox">I would like to be kept informed of special promotions and offers by Yatra.
                                                                    </label>
                                                                </div>
                                                             -->
                                                           
                                                           
                                                           <button class="full-width icon-check" id="editSubmit" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Save Updates</button>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div><!--YourProfileRow-->
                                                    </form>
                                                    
                                                    
                                                </div>
                                            <div class="cleafix"></div>
                                          </div>
                                            
                                        
                                        
                                        </div><!--YourProfileHeader-->
                                    
                                    
                                    
                                    <div class="clearfix"></div><!--clearfix-->
                                    
                                    
                                    </div><!--YourProfile-->
                                
                                <div class="clearfix"></div><!--clearfix-->
                                
                            </div>

                                <div class="clearfix"></div><!--clearfix-->
            
            
            
            </div><!--Register-Page-->
           
              </div>
        
        </div>
    <!--#main-->
    </div>
<!--row-->
</div>
<!--container-->
</section>
<!--content-->
</div>
<!--page-wrapper-->


<script type="text/javascript" lang="JavaScript">
    $(document).ready(function(){
        /*$('#editButton').click(function(){
            $('#old_Profile').hide()
            $('#edit_profile').show();

            
            $('#backButton').click(function(){
                    $('#old_Profile').show()
                    $('#edit_profile').hide();

            });

           
        }); */

    //get state data
$('#dropGetCountry').change(function(){
   var country = $('#dropGetCountry').val();
    $.ajax({
    type:"get",
    url:"<?php echo base_url('index.php/Home/getState/')?>/"+country,
    success: function(dataJson){
      data = JSON.parse(dataJson)
      var optionss = '<option value="">-Select State-</option>';
      $(data).each(function(index, element){                       
      optionss=optionss+'<option value="'+element.id+'">'+element.state+'</option>'
      });
      $('#dropGetState').html(optionss);
      },
    error:function(data){
      }
    });
});


//get city data
    $('#dropGetState').change(function(){
      var state1 = $('#dropGetState').val();
   $.ajax({
     type:"get",
     url:"<?php echo base_url('index.php/Home/getcity')?>/"+state1,
    success: function(dataJson){
      data = JSON.parse(dataJson)
        var optionss = '<option value="">-Select City-</option>';
       $(data).each(function(index, element) {
             optionss = optionss+'<option value="'+element.id+'">'+element.city+'</option>'
            });
      $('#dropGetCity').html(optionss);
       },
     error: function(data){
       }
     });
    });


    $('#editSubmit').click(function(){
        var uid = '<?= $profile['0']['uid'] ?>';
        var firstName = $('#txtFirstname').val();
        var lastName = $('#txtLastName').val();
        var password = $('#txtpassword').val();
        var phone = $('#numPhone1').val();
        var email = $('#textEmail').val();
        var address = $('#textAddress').val();
        var country = $('#dropGetCountry').val();
        var state = $('#dropGetState').val();
        var city = $('#dropGetCity').val();
        var pincode = $('#numPincode1').val();
        var sesssionEmail = '<?php echo  $this->session->userdata('email'); ?>';
        $.ajax({
            type:"post",
            url:"<?php echo base_url('index.php/User/updateFrom') ?>",
            data:{uid:uid,fName:firstName,lName:lastName,password:password,phone:phone,email:email,country:country,state:state,city:city,pincode:pincode,adddress:address,sesssionEmail:sesssionEmail},
            success: function(success){
                data = JSON.parse(success)
                // alert(data);
                if(data.error){
                  console.log(data.msg);
                  alert(data.msg);
                  
                  // return false;
                  }else{
                    alert(data.msg);
                    
                  }
                  window.location="<?php echo base_url('index.php/user/index'); ?>";

            },
            error: function(success){

            }
            });
    });



    });
    </script>

<?php include'footer.php';?>