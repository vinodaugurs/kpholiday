<div id="wrap">
    <?php require_once 'nav.php'; ?>
    <div id="content" style="padding-top:10px;">
        <div class="inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Agent List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow:scroll;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Balance</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <?php
                                        $var = $_SERVER['PHP_SELF'];
                                        $stringValue = explode("/", $var);
                                        $condition = end($stringValue);
                                        if ($condition == '1') {
                                            ?>
                                            <th>add amount</th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $c = 1;
                                    if ($apdata) {
                                        foreach ($apdata as $apval) {
                                            $city = $this->region_model->getcitybyid($apval['city']);
                                            $state = $this->region_model->getstatebyid($apval['state']);
                                            ?>
                                            <tr class="odd gradeX">
                                            <td class="warning"><?php echo $c; ?></td>
                                            <td class="warning" readonly="readonly" id="currentBalance"><?php echo $apval['BALANCE'] ?></td>
                                            <td class="warning"><?php echo $apval['user_name'] ?></td>
                                            <td class="warning"><?php echo $apval['type'] ?></td>
                                            <td class="warning"><?php echo $apval['email'] ?></td>
                                            <td class="warning"><?php echo $apval['phone'] ?></td>
                                            <td class="warning"><textarea class="form-control" disabled="disabled">
                                                    <?php echo $apval['address'] . " ," . @$city[0]['city'] . " ," . @$state[0]['state']; ?></textarea>
                                            </td>
                                            <?php if ($condition == '1') { ?>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" onclick="setValue('<?php echo $apval['uid']; ?>',<?php echo $apval['BALANCE'] ?>);">
                                                        Add balance
                                                    </button>
                                                </td></tr>
                                            <?php } ?>
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Add Amount</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="uid" id="uid" value="1">
                                                            <label>Previous Balance :</label>
                                                            <p id="balanceOld">1</p> &nbsp;&nbsp;
                                                            <script></script>
                                                            <br>
                                                            <label>Add Amount:</label>
                                                            <input type="text" name="balance" class="form-control" id="balance" placeholder="Enter Balance Amount"><br>
                                                            <label>Reasion</label><textarea class="form-control" name="reasion" id="reasion"></textarea><br/><br/>
                                                            <button name="submit" class="form-control btn btn-primary btn-xs" id="balance-submit">Amount Add </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $c++;
                                        }
                                    }
                                    ?>
                                    <script type="text/javascript">
                                        function setValue(uid, balance) {
                                            console.log(uid);
                                            console.log(balance);
                                            $("#balanceOld").text(balance);
                                            $("#uid").val(uid);
                                        }
                                        $(document).ready(function () {
                                            $('#balance-submit').click(function () {
                                                var uid = $('#uid').val();
                                                var currentBalance = $('#currentBalance').text();
                                                var Amount = $('#balance').val();
                                                var reasion = $('#reasion').val();
                                                $.ajax({
                                                    type: 'post',
                                                    url: '<?php echo base_url('index.php/Dashboard/add_data'); ?>',
                                                    data: {
                                                        uid: uid,
                                                        amount: Amount,
                                                        currentBalance: currentBalance,
                                                        reasion: reasion
                                                    },
                                                    success: function (data) {
                                                        alert(data);
                                                        location.reload();
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>





