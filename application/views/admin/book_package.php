<div id="wrap" style="padding-top:30px;">
<?php require_once 'nav.php'; ?>
    <div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Booked Package</div>
                    <div class="panel-body grey-panel">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>package Full Information</th>
                                        <th>User Name</th>
                                        <th>User Phone No</th>
                                        <th>User Full Information</th>
                                        <th>Book Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($display)){
                                    foreach ($display as $key=>$value) {
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?=($key+1)+$limit?></td>
                                        <td><?php echo @$value['package_name']; ?></td>
                                        <td><a href="<?php echo base_url() . "index.php/home/package_detail/" . $value['package_id']; ?>" target="_blank">Package Full Detail</a></td>
                                        <td><?php echo $value['user_name']; ?></td>
                                        <td><?php echo $value['mobile']; ?></td>
                                        <td><a href="<?php echo base_url() . "index.php/package/user_detail/" . $value['user_id']; ?>" target="_blank">User Full Detail</a></td>
                                        <td><?php echo $value['date']; ?></td>
                                        <td>
                                            <?php
                                            if ($value['action'] == 0) {
                                            ?>
                                            <form action="<?php echo base_url() ?>">
                                                    <input type="hidden" name="action" value="1">
                                                    <button class="btn btn-success" type="submit" name="submit">Check It </button>
                                            </form>
                                            <?php } else {
                                            ?>
                                            <button disabled="disabled" class="btn-primary">Check It </button><?php } ?>
                                        </td>
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
                <hr/>
            </div>
        </div>
    </div>