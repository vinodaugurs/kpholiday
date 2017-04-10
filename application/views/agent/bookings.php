<?php $this->load->view('blocks/header'); ?>
<div class="container">
    <h1 class="page-title" style="font-size: 30px;">Your Profile</h1>
    <h4>Please update your details so that we can share the best deals with you.</h4>
    <div class="gap"></div>
</div>
<div class="container">
    <div class="row">
        <div id="main" class="col-md-12 Runningtext">
            <div class="Runningtext-Box">
                <form action="javascript:void(0)" method="post">
                    <div class="YourProfile">
                        <div class="col-sm-8 YourProfileHeader">
                            <div class="col-sm-2">
                                <img src="https://d22r54gnmuhwmk.cloudfront.net/app-assets/global/default_user_icon-7a95ec473c1c41f6d020d32c0504a0ef.jpg" width="62" alt=""/>
                            </div>
                            <div class="col-sm-10">
                                <div class="YourProfile Row">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="YourProfile Row">
                                    <div class="col-sm-4 text-right">Full Name*:</div>
                                    <div class="col-sm-8 ">
                                        <div class="col-sm-6" style="padding-left:0 !important;"><input type="text" class="form-control" placeholder="First Name" id="txtFirstname" value="<?php
                                            if (isset($profile['0']['first_name'])) {
                                                echo $profile['0']['first_name'];
                                            }
                                            ?>" required></div>

                                        <div class="col-sm-6" style="padding-right:0 !important;"><input type="text" class="form-control" placeholder="Last Name" id="txtLastName" value="<?php
                                            if (isset($profile['0']['last_name'])) {
                                                echo $profile['0']['last_name'];
                                            }
                                            ?>" required>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div style="margin-top: 4px; ">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10 ">
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right">Email ID:</div>
                                        <div class="col-sm-8 ">
                                            <input type="email" class="form-control" required id="textEmail" placeholder="jane.doe@example.com" value="<?php
                                            if (isset($profile['0']['email'])) {
                                                echo $profile['0']['email'];
                                            }
                                            ?>">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right">Password:</div>
                                        <div class="col-sm-8 ">
                                            <input type="password" class="form-control" id="txtpassword" placeholder="Change Your Password">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right">Mobile Number*:</div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" required id="numPhone1" placeholder="Enter phone Number" value="<?php
                                            if (isset($profile['0']['phone'])) {
                                                echo $profile['0']['phone'];
                                            }
                                            ?>">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right">Address:</div>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="3" required placeholder="Enter Your Address" id="textAddress" ><?php
                                                if (isset($profile['0']['address'])) {
                                                    echo $profile['0']['address'];
                                                }
                                                ?>
                                            </textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right"> Country :</div>
                                        <div class="col-sm-8 ">
                                            <div>
                                                <?php $country = $this->region_model->getcountry(); ?>
                                                <select id="dropGetCountry" class="form-control" required>
                                                    <option value="">-Select Country-</option>
                                                    <?php
                                                    foreach ($country as $value) {
                                                        if ($profile['0']['country'] == $value['id']) {
                                                            echo '<option value=' . $value['id'] . ' selected>';
                                                        } else {
                                                            echo '<option value=' . $value['id'] . '>';
                                                        }
                                                        echo $value['country'] . '</option>';
                                                    }
                                                    ?>
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right"> State :</div>
                                        <div class="col-sm-8 ">
                                            <div>
                                                <?php
                                                $state = $profile['0']['state'];
                                                $stateData = $this->region_model->getStateValue($state);
                                                ?>
                                                <select name="state" id="dropGetState" class="form-control" required>
                                                    <option value="">-Select State-</option>
                                                    <?php
                                                    if (isset($profile['0']['state'])) {
                                                        echo '<option value=' . $profile['0']['state'] . ' selected>' . $stateData['0']['state'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right">City :</div>
                                        <div class="col-sm-8 ">
                                            <div>
                                                <?php
                                                $city = $profile['0']['city'];
                                                $cityData = $this->region_model->getCityValue($city);
                                                ?>
                                                <select  name="city" id="dropGetCity" class="form-control" required>
                                                    <option value="">-Select City-</option>
                                                    <?php
                                                    if (isset($profile['0']['city'])) {
                                                        echo '<option value=' . $profile['0']['city'] . ' selected>' . $cityData['0']['city'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right"> Pin code :</div>
                                        <div class="col-sm-8">
                                            <div>
                                                <input type="text" class="form-control" id="numPincode1" placeholder="Pincode" value="<?php
                                                if (isset($profile['0']['PinCode'])) {
                                                    echo $profile['0']['PinCode'];
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group form-group-icon-left">
                                        <div class="col-sm-4 text-right"></div>
                                        <div class="col-sm-8 ">
                                            <button class="full-width icon-check btn btn-primary" id="editSubmit" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Save Updates</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" lang="JavaScript">
    $(document).ready(function () {
        //get state data
        $('#dropGetCountry').change(function () {
            var country = $('#dropGetCountry').val();
            $.ajax({
                type: "get",
                url: "<?php echo base_url('index.php/Home/getState/') ?>/" + country,
                success: function (dataJson) {
                    data = JSON.parse(dataJson)
                    var optionss = '<option value="">-Select State-</option>';
                    $(data).each(function (index, element) {
                        optionss = optionss + '<option value="' + element.id + '">' + element.state + '</option>'
                    });
                    $('#dropGetState').html(optionss);
                },
                error: function (data) {
                }
            });
        });

        //get city data
        $('#dropGetState').change(function () {
            var state1 = $('#dropGetState').val();
            $.ajax({
                type: "get",
                url: "<?php echo base_url('index.php/Home/getcity') ?>/" + state1,
                success: function (dataJson) {
                    data = JSON.parse(dataJson)
                    var optionss = '<option value="">-Select City-</option>';
                    $(data).each(function (index, element) {
                        optionss = optionss + '<option value="' + element.id + '">' + element.city + '</option>'
                    });
                    $('#dropGetCity').html(optionss);
                },
                error: function (data) {
                }
            });
        });


        $('#editSubmit').click(function () {
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
            var sesssionEmail = '<?php echo $this->session->userdata('aemail'); ?>';
            $.ajax({
                type: "post",
                url: "<?php echo base_url('index.php/agent/updateFrom') ?>",
                data: {uid: uid, fName: firstName, lName: lastName, password: password, phone: phone, email: email, country: country, state: state, city: city, pincode: pincode, adddress: address, sesssionEmail: sesssionEmail},
                success: function (success) {
                    data = JSON.parse(success);
                    if (data.error) {
                        console.log(data.msg);
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                    window.location = "<?php echo base_url('index.php/agent/setting/'); ?>";
                },
                error: function (success) {}
            });
        });
    });
</script>
<?php $this->load->view('blocks/footer'); ?>