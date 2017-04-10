
<?php  include'header.php';?> 						
   <div id="page-wrapper">
	
        
        
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                <?php //print_r($user_details); ?>
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                             <?php echo $this->session->flashdata('msg');?>
                            <form class="booking-form" method="post">
                                <div class="person-information">
                                    <h2>Your Personal Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Title</label>
                                            <select name="title" class="full-width">
                                                	<option <?php echo (set_value('title')=='Mr.')?'selected':''; ?>>Mr.</option>
                                                    <option <?php echo (set_value('title')=='Mrs')?'selected':''; ?>>Mrs</option>
                                                    <option <?php echo (set_value('title')=='Miss')?'selected':''; ?>>Miss</option>
                                                    
                                                </select>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Name</label>                                            
                                            <input required type="text" name="name" class="input-text full-width" value="<?php echo (set_value('name')== false)?$user_details[0]['first_name'].' '.$user_details[0]['last_name']:set_value('name') ?>" placeholder="Name" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input type="text" readonly required class="input-text full-width"  name="email" placeholder="email address" value="<?php echo (set_value('email')== false)?$user_details[0]['email']:set_value('email'); ?>" readonly/>                                          
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Mobile</label>                                           
                                            <input type="text" required class="input-text full-width" name="mobile" value="<?php echo (set_value('mobile')== false)?$user_details[0]['phone']:set_value('mobile') ?>" placeholder="Phone number" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Address</label>
                                            <div class="selector">                                              
                                               <input type="text" required class="input-text full-width" name="address" value="<?php echo (set_value('address')== false)?$user_details[0]['address']:set_value('address') ?>" placeholder="Address" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                        
                                             <label>Country</label>
                                            <div class="selector">
                                                <select name="country" class="full-width" id="country" readonly>
                                                <option value="">-Select Country-</option>
                                                    <?php foreach($country as $value){ 
                                                        
                                                        if( $user_details[0]['country'] == $value['id']){
                                                            echo '<option value="'.$value["country"].'" selected>';
                                                        }else{echo '<option value="'.$value["country"].'">';}
                                                         
                                                         echo $value['country'].'</option>';

                                                         }?>


                                                                                                         
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">

                                            <?php 
                                            $state = $user_details[0]['state'];
                                            $stateData = $this->region_model->getStateValue($state);
                                            ?>

                                             <label>State</label>
                                            <div class="selector">
                                                <select name="state" class="full-width" id="dropGetState" readonly>
                                                    <option value="">-Select State-</option>
                                                    <?php if(isset($user_details[0]['state'])){
                                                    echo '<option value="'.$stateData["0"]["state"].'" selected>'.$stateData['0']['state'].'</option>';
                                                    } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">

                                             <label>City</label>
                                             <div class="selector">

                                           <?php 
                                            $city = $user_details[0]['city'];
                                            $cityData = $this->region_model->getCityValue($city);
                                            ?>

                                            <select  name="city" id="dropGetCity" class="form-control" readonly required>
                                            <option value="">-Select City-</option>
                                            <?php if(isset($user_details[0]['city'])){
                                                echo '<option value="'.$cityData["0"]["city"].'" selected>'.$cityData['0']['city'].'</option>';
                                                } ?>
                                            </select>

                                              </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                           <label>PostalCode</label>                                            
                                             <input required type="text" class="input-text full-width" name="post" value="<?php echo (set_value('post')== false)?$user_details[0]['PinCode']:set_value('post') ?>" placeholder="PinCode" readonly/>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    
                                    <!--<div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input  type="checkbox"> I want to receive <span class="skin-color">kpholidays</span> promotional offers in the future
                                            </label>
                                        </div>
                                    </div>-->
                                </div>
                                
                                
                                
                                
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        
                </div>
            </div>
        </section>


 </div>
  
<?php  include'footer.php';?> 
   
</body>
</html>

