<style>
    .form-data {
        display: inline-block;
        max-width: 210px;
        max-height: 160px;
        overflow-y: auto;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
</style>
<div id="wrap">
    <?php require_once 'nav.php'; ?>
    <div id="content" style="width:81%;padding-left:14px ;padding-top:25px;">
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            My Packages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Details</th>
                                            <th>Price</th>
                                            <th>transport</th>
                                            <th>stay info</th>
                                            <th>tour highlight</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_uid = $this->session->userdata('uid');
                                        $data = $this->pack_model->get();
                                        $i = 1;
                                        foreach ($data as $value) {
                                            echo "<tr class='warning'> 
                                                <td>" . $i . "</td>
                                                <td>" . $value['pack_name'] . "</td>
                                                <td style='padding: 0 3px'>
                                                  <div class='form-data'>" . $value['details'] . "</div>
                                                </td>
                                                <td>&nbsp;" . $value['price'] . "</td>
                                                <td style='padding: 0 3px' >
                                                  <div class='form-data'>" . $value['transport'] . "</div>
                                                </td>     
                                                <td style='padding: 0 3px' >
                                                  <div class='form-data'>" . $value['tour_highlight'] . "</div>
                                                </td>    
                                                <td style='padding: 0 3px' >
                                                  <div class='form-data'>" . $value['tour_highlight'] . "</div>
                                                </td>
                                                <td>
                                                  <a href='" . base_url() . "index.php/dashboard/package?id=" . $value['pack_id'] . "'>Update</a>
                                                </td>                                    
                                              </tr>";
                                            $i++;
                                        }
                                        ?>
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
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>