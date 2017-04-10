<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Khalid Hashmi
 * @copyright	Copyright (c) 2015, Agurus, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	PyaUMoney API
 * @author		Khalid Hashmi 
 *
 */
class PayUMoney{
   //demo
	var $MERCHANT_KEY			= 'vYASdFcA'; //upRO0C Merchant key here as provided by Payu
	var $SALT  		= 'BWD3x6eWZa'; //ZGfX9rcK Merchant Salt as provided by Payu
	var $PAYU_BASE_URL	 		= 'https://test.payu.in'; // End point - change to https://secure.payu.in for LIVE mod
	var $action			=  ''; // Number of "digit" links to show before/after the currently viewed page
	var $service_provider='payu_paisa';
	
	//live
	/*var $MERCHANT_KEY			= 'upRO0C'; //upRO0C Merchant key here as provided by Payu
	var $SALT  		= 'ZGfX9rcK'; //ZGfX9rcK Merchant Salt as provided by Payu
	var $PAYU_BASE_URL	 		= 'https://secure.payu.in'; // End point - change to https://secure.payu.in for LIVE mod
	var $action			=  ''; // Number of "digit" links to show before/after the currently viewed page
	var $service_provider='payu_paisa';*/
	
	/*function setpayUMoney($data){	
			
		$postdata=array();
		$productinfo=array();		
		$productinfo=(!empty($data['productinfo']))?$data['productinfo']:array(array('name'=>"tutionfee",
							 'description'=>'this is test',
							 'value'=>100,
							 "isRequired"=>true));	
		$postdata['productinfo'] =json_encode($productinfo);
		$postdata['amount'] =(isset($data['amount']))?$data['amount']:0;
		$postdata['firstname'] =(isset($data['firstname']))?$data['firstname']:'';
		$postdata['email'] =(isset($data['email']))?$data['email']:'';
		$postdata['phone'] =(isset($data['phone']))?$data['phone']:'';
		$postdata['surl'] =(isset($data['surl']))?$data['surl']:'';
		$postdata['furl'] =(isset($data['furl']))?$data['furl']:'';
		$postdata['udf1'] =(isset($data['udf1']))?$data['udf1']:'';
		$postdata['udf2'] =(isset($data['udf2']))?$data['udf2']:'';
		$postdata['udf3'] =(isset($data['udf3']))?$data['udf3']:'';
		$postdata['udf4'] =(isset($data['udf4']))?$data['udf4']:'';
		$postdata['udf5'] =(isset($data['udf5']))?$data['udf5']:'';
		
		echo $data=$this->postUMoney($postdata);
		//echo $data;
	}*/
	
	function setpayUMoney($data){
		
		$postdata=array();
		$productinfo=array();
		$productinfo=(!empty($data['productinfo']))?$data['productinfo']:array(array('name'=>"tutionfee",
							 'description'=>'this is test',
							 'value'=>100,
							 "isRequired"=>true));		
		$postdata['productinfo'] =json_encode($productinfo);
		$postdata['amount'] =(isset($data['amount']))?$data['amount']:0;
		$postdata['firstname'] =(isset($data['firstname']))?$data['firstname']:'';
		$postdata['email'] =(isset($data['email']))?$data['email']:'';
		$postdata['phone'] =(isset($data['phone']))?$data['phone']:'';
		$postdata['surl'] =(isset($data['surl']))?$data['surl']:'';
		$postdata['furl'] =(isset($data['surl']))?$data['surl']:'';
		$postdata['udf1'] =(isset($data['udf1']))?$data['udf1']:'';
		$postdata['udf2'] =(isset($data['udf2']))?$data['udf2']:'';
		$postdata['udf3'] =(isset($data['udf3']))?$data['udf3']:'';
		$postdata['udf4'] =(isset($data['udf4']))?$data['udf4']:'';
		$postdata['udf5'] =(isset($data['udf5']))?$data['udf5']:'';
		
		$data=$this->postUMoney($postdata);
		echo $data;
	}
	
	function validatePayment(){
		
		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$salt=$this->SALT;
		
		
       	  

        $retHashSeq = $salt."|".$status."||||||".$_POST["udf5"]."|".$_POST["udf4"]."|".$_POST["udf3"]."|".$_POST["udf2"]."|".$_POST["udf1"]."|".$_POST["email"]."|".$firstname."|".$productinfo."|".$amount."|".$txnid."|".$key;

         
		 $hash = hash("sha512", $retHashSeq);
		
		   // echo $hash_string;die;
			//echo $hash.'<br>';
			//echo $posted_hash=$_POST["hash"];
			if ($hash != $posted_hash) {
			    return false;
			   }else{
				   return true;
			   }
	}
	
	
	function postUMoney($posted) {
		
        $formError = 0;
		if(empty($posted['txnid'])) {
		  // Generate random transaction id
		  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		} else {
		  $txnid = $posted['txnid'];
		}
		$shash = '';
		// Hash Sequence
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		//if(empty($posted['hash']) && sizeof($posted) > 0) {
		if(sizeof($posted) > 0) {
			$posted['service_provider']=$this->service_provider;
			$posted['txnid']=$txnid;
			$posted['key']=$this->MERCHANT_KEY;
		  if(
				  empty($posted['key'])
				  || empty($posted['txnid'])
				  || empty($posted['amount'])
				  || empty($posted['firstname'])
				  || empty($posted['email'])
				  || empty($posted['phone'])
				  || empty($posted['productinfo'])
				  || empty($posted['surl'])
				  || empty($posted['furl'])
				  || empty($posted['service_provider'])
		  ) {
			$formError = 1;
		  } else {
			//echo $posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));die;
			$hashVarsSeq = explode('|', $hashSequence);
			$hash_string = '';	
			foreach($hashVarsSeq as $hash_var) {
			  if($hash_var=='amount'){		
			  $hash_string .= isset($posted[$hash_var]) ?($posted[$hash_var]): '';
			  }else{
				  $hash_string .= isset($posted[$hash_var]) ?$posted[$hash_var]: '';
			  }
			  $hash_string .= '|';
			}
		
			$hash_string .= $this->SALT;
		
		 // echo $hash_string;die;
			$shash = strtolower(hash('sha512', $hash_string));
			$this->action = $this->PAYU_BASE_URL . '/_payment';
		  }
		} elseif(!empty($posted['hash'])) {
		  $shash = $posted['hash'];
		  $this->action = $this->PAYU_BASE_URL . '/_payment';
		}
		
		ob_start();
		?>
        <html>
  <head>
  <script>
    var hash = '<?php echo $shash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onLoad="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
     <h2 style="color:blue">Please wait...</h2>
    <form style="display:none" action="<?php echo $this->action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $this->MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $shash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$shash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php 
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

}
// END Pagination Class
?>
