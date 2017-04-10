<?php $this->load->view("blocks/header"); ?>
<div id="page-wrapper">
    <section id="content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="javascript:void(0);">History</a></li>
                <li class="active">Packages</li>
            </ul>
            <div class="row">
                <div id="main" class="col-md-12 Runningtext">
                    <div class="Register-Page">
                        <div class="block">
                            <div class="tab-container full-width-style white-bg">
                                <div class="tab-content">
                                    <?php echo $this->session->flashdata('msg'); ?> 
                                    <!-- ------------------first tab start ------------------------ -->
                                    <div class="tab-pane fade in active" id="first-tab">
                                        <h3 class="tab-content-title">Package Booking <a style="float: right;" href="<?php echo base_url('index.php/user/index'); ?>"><button type="button" class="btn btn-success"><< Back</button></a></h3>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">Booked Package</div>
                                            <div class="panel-body grey-panel">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" id="">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Package Name</th>
                                                                <th>package Full Information</th>
                                                                <th>User Name</th>
                                                                <th>User Phone No</th>
                                                                <th>Book Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($display)) {
                                                                foreach ($display as $key => $value) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= ($key + 1) + $limit ?></td>
                                                                        <td><?php echo @$value['package_name']; ?></td>
                                                                        <td><a href="<?php echo base_url() . "index.php/home/package_detail/" . $value['package_id']; ?>" target="_blank">Package Full Detail</a></td>
                                                                        <td><?php echo $value['user_name']; ?></td>
                                                                        <td><?php echo $value['mobile']; ?></td>
                                                                        <td><?php echo $value['date']; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--Service-Search-->
                                                <?php echo $this->pagination->create_links(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 
</div>
<?php $this->load->view("blocks/footer"); ?>