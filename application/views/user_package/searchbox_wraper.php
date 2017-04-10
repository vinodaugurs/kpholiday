<style>
/*.Select-Origin-Div{ width:140px;
}
.Select-Origin-Div2{ width:103px;
}
*/




</style>

<div class="Header-Banner">

        

      <div class="search-box-wrapper1">

      <div class="search-box1 container" style="position:relative;">

      <div class="search-form">

      

	  

        <ul class="search-tabs clearfix">          
			<li class="active" ><a href="#Holidays" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Holidays-f.png');?>" alt=""/></span>&nbsp;&nbsp;Holidays</a></li>
		</ul>

        <div class="visible-mobile">

          <ul id="mobile-search-tabs" class="search-tabs clearfix">

     

            <li class="active"><a href="#Holidays">Holidays</a></li>


          </ul>

        </div>

		

        <div class="search-tab-content container-fluid">

 <div class="tab-pane fade" id="Holidays">

            <form action="<?php  echo base_url('index.php/package/all_package');?>" method="post">

            <div class="row">
                  <div class="col-md-3">
                   <label>DESTINATION</label>

                      <input type="text" id="destination_place" name="destination" class="form-control" placeholder="Mumbai" required>

                      <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                      </ul>

                  </div>

<script type="text/javascript">
  $(document).ready(function(){

    $("#destination_place").autocomplete( {
    source: function(request,response) {
    console.log($('#Domestic2').is(':checked'));
    var data = $('#destination_place').val();
        $.ajax ( {
          url: "<?php echo base_url('index.php/Dashboard/get_place'); ?>",
          data:{mail:data},
          type:'post',
          dataType: "json",
       crossDomain: true,
          success: function(data) {           
      response( $.map( data.myData, function( item ) {
                return {
                    label: item.city,
                    value: item.CODE
                }
            }));
          } 
    }) }
 });



    // $('#destination_place').keyup(function(){
    //     var data = $('#destination_place').val();
    //   $.ajax({
    //     type:'post',
    //     url:'<?php echo base_url('index.php/Dashboard/get_place'); ?>',
    //     data:{mail:data},
    //     success:function(data)
    //            {     
    //       // alert(data);
          
          
    //        }
    //   });
    // });


  });  
</script> 



                  <div class="col-md-3">
                   <label>BUDGET</label>
						
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                      <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></div>
                        <input type="number" name="budget" class="form-control" placeholder="BUDGET" required>
                        
                      </div>
                    </div>
                        
                        
                        
                      

                      <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                      </ul>

                  </div>


                  <div class="col-md-3">
                   <label>FROM</label>

                      <div class="datepicker-wrap-package">
                      <input type="text" name="checkin" id="txtFromDate" class="form-control datepicker" placeholder="28 FEB 2015 WEDNESDAY"                                required>

                      
                      </div>

                  </div>


                  <div class="col-md-3">
                   <label>To</label>


                      <div class="datepicker-wrap-package">
                      <input type="text"  name="checkout" id="txtToDate" data-format="yyyy-mm-dd" class="form-control datepicker" placeholder="28 FEB 2015 WEDNESDAY" required>

                      
                      </div>

                  </div>


            </div>              

              <div class="row">

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>Rooms</label>

                      <div class="selector">

                        <select class="full-width" required="required" name="rooms">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          

                        </select><span class="custom-select full-width">01</span>

                      </div>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>Adults(12+)</label>

                      <div class="selector">

                        <select class="full-width" required="required" name="adults">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select><span class="custom-select full-width">01</span>

                      </div>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>Kids(0-11)</label>

                      <div class="selector">

                        <select class="full-width" name="kids">
            <option value="0">00</option>
                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select><span class="custom-select full-width">00</span>

                      </div>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>&nbsp;</label>

                      <button class="icon-check full-width">SEARCH NOW</button>

                    </div>

              </div>


              <!-- <div class="row">

                  <div class="col-md-4">

                  

                   <label>Leaving from</label>

                      <input type="text" class="input-text full-width"id="country" autocomplete="off" placeholder="Leaving from" name="leaving"/>

                      <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                      </ul>

                  </div>

                  <div class="col-md-4">

                  

                   <label>Going to</label>

                      <input type="text" class="input-text full-width" placeholder="Going to"  id="package_source" name="destination" />

                  

                  

                  </div>

                

                

                <div class="col-md-4">

                  <div class="form-group row">

                    <div class="col-sm-6">

                    <label>Depart Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Depart Date" readonly="true" name="date" />

                      </div>

                    </div>

                    

                    <div class="col-xs-6">

                      <label>&nbsp;</label>

                      <button class="icon-check full-width">SEARCH NOW</button>

                    </div>

                  </div>

                </div>

                <div class="clearfix"></div>

              </div> -->

              

              

              

            </form>

          </div>

        </div>
  </div>

      </div>

    </div>

        

        

   </div><!--Header-Banner--> 

  

  

  

<script>
var domestic_citys= new Array();
 var international_citys= new Array();
  $(document).ready(function () {
	

$("#add").click(function(){
  var data = parseInt($("#value").val());
  if(data<=9){
  
  var data = data+1;
  $("#value").val(data);

  }else{
    alert("Not More Then 10");
  }

});

$("#sub").click(function(){
  var data = $("#value").val();
  if(data>1){
  
  var data = data-1;
  $("#value").val(data);

  }else{
    alert("Must Greater Then Zero");
  }

});



    $("#country").keyup(function () {

        $.ajax({

            type: "POST",

            url: "<?php echo base_url('index.php/package/city_search');?>",

            data: {

                keyword: $("#country").val()

            },

            dataType: "json",

            success: function (data) {

                if (data.length > 0) {

                    $('#DropdownCountry').empty();

                    $('#country').attr("data-toggle", "dropdown");

                    $('#DropdownCountry').dropdown('toggle');

                }

                else if (data.length == 0) {

                    $('#country').attr("data-toggle", "");

                }

                $.each(data, function (key,value) {

                    if (data.length >= 0)

                        $('#DropdownCountry').append('<li role="presentation" >' + value['name'] + '</li>');

                });

            }

        });

    });

    $('ul.txtcountry').on('click', 'li a', function () {

        $('#country').val($(this).text());

    });
	
	
	//add city in hotels 
	
	
 
/* $.ajax({
   type: "GET",
   url: "<?php echo base_url('index.php/hotel/get_city');?>", // change to full path of file on server   
   success: function (xmlDoc) {
	   			var myArr = [];
				  xml = $( xmlDoc ),
  				  CityDetailsResult = xml.find( "CityNames" );
	   			$(xml).find("CityName").each(function()
				   {
					 myArr.push($(this).text());
				   });
				   domestic_citys=myArr;
				   if (myArr.length > 0) {
					   $("#hotel_city").autocomplete({
						 source: myArr,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
					   }
   			},
  
   failure: function(data) {
     alert("XML File could not be found");
   }
 });*/
 
 /*$.ajax({
   type: "GET",
   url: "<?php echo base_url('index.php/hotel/get_cityInternational');?>", // change to full path of file on server   
   success: function (xmlDoc) {
	   			var myArr = [];
				  xml = $( xmlDoc ),
  				  CityDetailsResult = xml.find( "CityNames" );
	   			$(xml).find("CityName").each(function()
				   {
					 myArr.push($(this).text());
				   });
				   international_citys=myArr;
				   if (myArr.length > 0) {
					   $("#hotel_city").autocomplete({
						 source: myArr,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
					 $("#hotel_city").attr("placeholder", "Select City, Area or Hotel...");
					 $("#hotel_city").removeAttr("disabled"); 
					   }
   			},
  
   failure: function(data) {
     alert("XML File could not be found");
   }
 });
*/
setTimeout(function(){
$("#arrive").parent().find('img').addClass('hidden');
},200);
});
var myArr = [];

/*function getInternationcitysHotel(){
	if(international_citys.length > 0) {
		$("#hotel_city").autocomplete({
						 source: international_citys,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
	}else{
	 $("#hotel_city").val('');	
	 $("#hotel_city").attr("placeholder", "Please wait Hotel city loading");
	// $("#hotel_city").attr("disabled", "disabled"); 
	$.ajax({
   type: "GET",
   url: "<?php echo base_url('index.php/hotel/get_cityInternational');?>", // change to full path of file on server   
   success: function (xmlDoc) {
	   			var myArr = [];
				  xml = $( xmlDoc ),
  				  CityDetailsResult = xml.find( "CityNames" );
	   			$(xml).find("CityName").each(function()
				   {
					 myArr.push($(this).text());
				   });
				   international_citys=myArr;
				   if (myArr.length > 0) {
					   $("#hotel_city").autocomplete({
						 source: myArr,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
					 $("#hotel_city").attr("placeholder", "Select City, Area or Hotel...");
					 $("#hotel_city").removeAttr("disabled"); 
					   }
   			},
  
   failure: function(data) {
     alert("XML File could not be found");
   }
 });
	}
}

function getDomesticcityHOtel(){
	$("#hotel_city").autocomplete({
						 source: domestic_citys,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
}*/
$(document).ready(function(e) {
    var x = location.hash;
	settab(x);
});
</script>


  