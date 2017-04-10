<div id="wrap">
    <?php require_once 'nav.php'; ?>
    <div id="content" style="width:81%;padding-left:14px ;padding-top:25px;">
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Destinations
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Destination</th>
                                        <th>Details</th>
                                        <th style="width:170px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $user_uid = $this->session->userdata('uid');
                                    $data = $this->pack_model->all_destination();
                                    if(!empty($data)){
                                    foreach ($data as $key=>$value) { ?>
                                        <tr>
                                            <td><?=($key+1)?></td>
                                            <td><?=$value['name']?></td>
                                            <td><textarea class='form-control' rows='5' disabled='disabled' style='background-color:#faf2cc;border:0px;'><?=$value['description']?></textarea></td>
                                            <td>
                                                <a class="btn btn-primary" href='<?=base_url()?>index.php/dashboard/edit_destination?id=<?=$value['id']?>'>Update</a>
                                                <a class="btn btn-danger" href='javascript:void(0)'>Delete</a>
                                            </td>
                                        </tr>
                                       <?php } ?>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</div>