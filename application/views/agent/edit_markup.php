<?php $this->load->view('agent/header');?>

<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="sorting-header">
        <h3 class="sorting-title uppercase">Edit Service Charge</h3>
      </div>
      <div class="Service-Search">
        <form method="get" id="markupform">
          <div class=" col-sm-4">
            <div class="form-group">
              <div class=" col-sm-4">Type of Ttavel</div>
              <div class=" col-sm-6">
                <select name="markuptype" class="form-control" onchange="$('#markupform').submit();">
                  <option <?php echo ($markuptype=="International Flight")?'selected="selected"':''?>  value="International Flight">International Flight</option>
                  <option <?php echo ($markuptype=="Domestic Flight")?'selected="selected"':''?> value="Domestic Flight">Domestic Flight</option>
                  <option <?php echo ($markuptype=="International Hotel")?'selected="selected"':''?> value="International Hotel">International Hotel</option>
                  <option <?php echo ($markuptype=="Domestic Hotel")?'selected="selected"':''?> value="Domestic Hotel">Domestic Hotel</option>
                  <option <?php echo ($markuptype=="AC Bus")?'selected="selected"':''?> value="AC Bus">AC Bus</option>
                  <option <?php echo ($markuptype=="Non AC Bus")?'selected="selected"':''?> value="Non AC Bus">Non AC Bus</option>
                </select>
              </div>
              <div class=" clearfix"></div>
            </div>
          </div>
        </form>
      </div>
      <!--Service-Search-->
      
      <div class="Tbl2-Service">
      <?php if($markuptype=="International Flight" or $markuptype=="Domestic Flight"):;?>
        <table width="100%" border="0" class="table table-striped">
          <tr>
            <td>Airlines</td>
            <td>Airlines Code</td>  
            <td>Adult</td>
            <td>Child</td>
            <td>Infant</td>
            <td>Change Commission</td>
          </tr>
          <tr>
          <?php foreach($flights as $key=>$flight):;?>
            <td><?php echo $flight['fligt_name']?></td>
            <td><?php echo $flight['flight_code']?></td>
            <td><?php echo $flight['adult_Commission']?></td>
            <td><?php echo $flight['Child_Commission']?></td>
            <td><?php echo $flight['Infant_Commission']?></td>
            <td><a onclick="setData($(this));"  class="btn btn-primary" data-refrenceid="<?php echo $flight['fid']?>" data-forcommision="<?php echo $markuptype?>" data-adultcommission="<?php echo $flight['adult_Commission']?>" data-childcommission="<?php echo $flight['Child_Commission']?>" data-infantcommission="<?php echo $flight['Infant_Commission']?>" data-fname="<?php echo $flight['fligt_name']?>" data-markupid="<?php echo $flight['id']?>" data-toggle="modal" data-target=".bs-example-modal-lg">Modify Service Charge</a></td>
          </tr>
          <?php endforeach;?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <?php endif?>
        <div>
        <br /><br /><br />
        <?php if($markuptype!="International Flight" and $markuptype!="Domestic Flight"):;?>
        	
        <form method="post">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="gridSystemModalLabel"><?php echo $markuptype?></h4>
            </div>
            
            <div class=" clearfix"></div>
            <div class="modal-body">
              <div class="col-sm-12">
                <div class="form-group">
                 Amount(Rs) <input type="text" value="<?php echo isset($otherdata[0]['adult_Commission'])?$otherdata[0]['adult_Commission']:0?>" class="form-control" name="Adult_commision" id="Adult_commision" placeholder="Adult commision">
                  <div class=" clearfix"></div>
                </div>
              </div>              
              
            </div>
            <div class=" clearfix"></div>
            <div class="modal-footer">            	
                <input type="hidden" name="updatemarkup" value="true" />
                <input type="hidden" required="required" name="forcommision" id="forcommision" value="<?php echo $markuptype?>" />
                <input type="hidden" value="<?php echo @$otherdata[0]['id']?>" name="markupid" id="markupid" />              
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            
            <div class=" clearfix"></div>
          </div>
          </form>
          
        <?php endif?>
        </div>
      </div>
      <!--Tbl2-Service-->
      
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
        <form method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
            </div>
            
            <div class=" clearfix"></div>
            <div class="modal-body">
              <div class="col-sm-12">
                <div class="form-group">
                 Adult <input type="text" class="form-control" name="Adult_commision" id="Adult_commision" placeholder="Adult commision">
                  <div class=" clearfix"></div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                 Child <input type="text" name="Child_Commission" id="Child_Commission" class="form-control" placeholder="Child Commission">
                  <div class=" clearfix"></div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                Infant  <input name="Infant_Commission" id="Infant_Commission" type="text" class="form-control" placeholder="Infant Commission">
                  <div class=" clearfix"></div>
                </div>
              </div>
            </div>
            <div class=" clearfix"></div>
            <div class="modal-footer">
            	<input type="hidden" name="refrenceid" id="refrenceid" />
                <input type="hidden" name="updatemarkup" value="true" />
                <input type="hidden" name="forcommision" id="forcommision" />
                <input type="hidden" name="markupid" id="markupid" />
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            
            <div class=" clearfix"></div>
          </div>
          </form>
          <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
      </div>
    </div>
    <!--row--> 
    
  </div>
  <!--container--> 
  
</div>
<!--content-wrapper-->
<script>
function setData(cobj){	
	$('#gridSystemModalLabel').html(cobj.data('fname')+' Commission');
	$('#refrenceid').val(cobj.data('refrenceid'));
	$('#markupid').val(cobj.data('markupid'));
	$('#forcommision').val(cobj.data('forcommision'));
	$('#Adult_commision').val(cobj.data('adultcommission'));
	$('#Child_Commission').val(cobj.data('childcommission'));
	$('#Infant_Commission').val(cobj.data('infantcommission'));
}
</script>
<?php $this->load->view('agent/footer');?>
