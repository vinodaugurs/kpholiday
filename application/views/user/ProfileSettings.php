<?php include(APPPATH.'views/home/header.php');?>
<div class="container">
    <h1 class="page-title">Account Settings</h1>
</div>
<?php 
    $userInfo = $user[0];
 ?>
<div class="container">
  <div class="row">
    <?php include(APPPATH.'views/user/user-profile-sidebar.php'); ?>
    <div class="col-md-9">
        <?=$this->session->flashdata('msg')?>
        <div class="row">
            <div class="col-md-5">
                <!-- <form action="#"> -->
                <?= form_open('user/update_user_info') ?>
                    <h4>Personal Information</h4>
                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                        <label>First Name</label>
                        <input class="form-control" name="fName" value="<?=$userInfo['first_name'] ? $userInfo['first_name'] : ''?>" type="text" />
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                        <label>Last Name</label>
                        <input class="form-control" name="lName" value="<?=$userInfo['last_name'] ? $userInfo['last_name'] : ''?>" type="text" />
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon"></i>
                        <label>E-mail</label>
                        <input class="form-control" name="email" value="<?=$userInfo['email'] ? $userInfo['email'] : ''?>" type="text" />
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
                        <label>Phone Number</label>
                        <input class="form-control" name="phone" value="<?=$userInfo['phone'] ? $userInfo['phone'] : ''?>" type="text" />
                    </div>
                    <div class="gap gap-small"></div>                    
                    <div class="form-group">
                        <label>Street Address</label>
                        <input class="form-control" name="address" value="<?=$userInfo['address'] ? $userInfo['address'] : ''?>" type="text" />
                    </div>
                    <div class="form-group">
                        <?php
                        $countryValue = 1;
                        if(!empty($userInfo['country']) && $userInfo['country'] !==0){
                            $countryValue = $userInfo['country'];
                        }
                        $countryData = $this->region_model->getCountryValue();
                        ?>
                        <label>Country</label>
                        <select name="country" class="form-control" id="country">
                            <option value="">-Select Country-</option>
                            <?php if (!empty($countryData)) {
                                foreach ($countryData as $value) {
                                    if ($countryValue == $value['id']) {
                                        echo '<option value="' . $value["id"] . '" selected>' . $value['country'] . '</option>';
                                    } else {
                                        echo '<option value="' . $value["id"] . '">' . $value['country'] . '</option>';
                                    }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <?php
                        $state = (!empty($userInfo['state'])) ? $userInfo['state'] : 1;
                        $stateData = $this->region_model->getStateList($countryValue);
                        ?>
                        <select name="state" class="form-control" id="dropGetState">
                            <option value="">-Select State-</option>
                            <?php if (!empty($stateData)) {
                                foreach ($stateData as $value) {
                                    if ($userInfo['state'] == $value['id']) {
                                        echo '<option value="' . $value["id"] . '" selected>' . $value['state'] . '</option>';
                                    } else {
                                        echo '<option value="' . $value["id"] . '">' . $value['state'] . '</option>';
                                    }
                                }
                            } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <?php
                        $city = (!empty($userInfo['city'])) ? $userInfo['city'] : '';
                        $cityData = $this->region_model->getCityList($state);
                        ?>

                        <select name="city" id="dropGetCity" class="form-control" required>
                            <option value="">-Select City-</option>
                            <?php if (!empty($cityData)) {
                                foreach ($cityData as $value) {
                                    if ($userInfo['city'] == $value['id']) {
                                        echo '<option value="' . $value["id"] . '" selected>' . $value['city'] . '</option>';
                                    } else {
                                        echo '<option value="' . $value["id"] . '">' . $value['city'] . '</option>';
                                    }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ZIP code/Postal code</label>
                        <input class="form-control" name="pincode" value="<?=$userInfo['PinCode'] ? $userInfo['PinCode'] : ''?>" type="text" />
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                </form>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <h4>Change Password</h4>
                <?=form_open('user/update_password') ?>
                    <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                        <label>Current Password</label>
                        <input class="form-control" name="currentPass" type="password" />
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                        <label>New Password</label>
                        <input class="form-control" name="newPass" type="password" />
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                        <label>New Password Again</label>
                        <input class="form-control" name="newPass2" type="password" />
                    </div>
                    <hr />
                    <input class="btn btn-primary" type="submit" value="Change Password" />
                </form>
            </div>
        </div>

    </div>
  </div>
</div>
<div class="gap"></div>
<script type="text/javascript">
    $(document).ready(function () {

        //get state
        $('#country').change(function () {
            $('#dropGetState').html();
            var getCountryData = $("#country").find("option:selected").text();
            $.ajax({
                type: "get",
                url: "<?php echo base_url('index.php/user/getStateBooking/')?>/" + getCountryData,
                success: function (dataJson) {
                    data = JSON.parse(dataJson)
                    var optionss = '<option value="">-Select State-</option>';
                    $(data).each(function (index, element) {
                        optionss = optionss + '<option value="' + element.id + '">' + element.state + '</option>'
                    });

                    $('#dropGetState').html(optionss);
                    $('#dropGetState').siblings('.custom-select').remove();
                    changeTraveloElementUI();

                },
                error: function (data) {
                }
            });
        });


//get city data
        $('#dropGetState').change(function () {
            var state1 = $("#dropGetState").find("option:selected").text();
            $.ajax({
                type: "get",
                url: "<?php echo base_url('index.php/user/getcityBooking')?>/" + state1,
                success: function (dataJson) {
                    data = JSON.parse(dataJson)
                    var optionss = '<option value="">-Select City-</option>';
                    $(data).each(function (index, element) {
                        optionss = optionss + '<option value="' + element.id + '">' + element.city + '</option>'
                    });
                    $('#dropGetCity').html(optionss);
                    $('#dropGetCity').siblings('.custom-select').remove();
                    changeTraveloElementUI();
                },
                error: function (data) {
                }
            });
        });


    });
</script>
<?php include(APPPATH.'views/home/footer.php');?>
