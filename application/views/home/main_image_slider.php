<div class="Header-Banner">
        
        <div class="search-box-wrapper1">
      <div class="search-box1 container" style="position:relative;">
      <div class="search-form">
      
        <ul class="search-tabs clearfix">
        	<li class="active"><a href="#flights-tab" data-toggle="tab"><span><img src="img/Flights-f.png" alt=""/></span>&nbsp;&nbsp;FLIGHTS</a></li>
          	<li><a href="#hotels-tab" data-toggle="tab"><span><img src="img/Hotels-f-2.png" alt=""/></span>&nbsp;&nbsp;HOTELS</a></li>
          
          	<li><a href="#flight-and-hotel-tab" data-toggle="tab"><span><img src="img/Hotels-f-1.png" alt=""/></span>&nbsp;&nbsp;FLIGHT &amp; HOTELS</a></li>&nbsp;
            
          	<li><a href="#Holidays" data-toggle="tab"><span><img src="img/Holidays-f.png" alt=""/></span>&nbsp;&nbsp;Holidays</a></li>
          	<li><a href="#Buses" data-toggle="tab"><span><img src="img/Buses-f.png" alt=""/></span>&nbsp;&nbsp;Buses</a></li>
            <li><a href="#Cab" data-toggle="tab"><span><img src="img/Buses-f.png" alt=""/></span>&nbsp;&nbsp;Cab</a></li>
        </ul>
        <div class="visible-mobile">
          <ul id="mobile-search-tabs" class="search-tabs clearfix">
          
          	<li class="active"><a href="#flights-tab">FLIGHTS</a></li>
            <li ><a href="#hotels-tab">HOTELS</a></li>
            <li><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>
            <li><a href="#Holidays">Holidays</a></li>
            <li><a href="#Buses">Buses</a></li>

          </ul>
        </div>
        <div class="search-tab-content container-fluid">
          <div class="tab-pane fade" id="hotels-tab">
            <form action="hotel-list-view.html" method="post">
              <div class="row">
                <div class="form-group col-sm-6 col-md-3">
                 
                  <label>Your Destination</label>
                  <input type="text" class="input-text full-width" placeholder="Select City, Area or Hotel..." />
                </div>
                <div class="form-group col-sm-6 col-md-4">
                  
                  <div class="row">
                    <div class="col-xs-6">
                      <label>Check In</label>
                      <div class="datepicker-wrap">
                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <label>Check Out</label>
                      <div class="datepicker-wrap">
                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-6 col-md-3">
                 
                  <div class="row">
                    <div class="col-xs-4">
                      <label>Rooms</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <label>Adults</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <label>Kids</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-6 col-md-2 fixheigh1t">
                  <label class="hidden-xs">&nbsp;</label>
                  <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade active in" id="flights-tab">
            <form action="flight-list-view.html" method="post">
            
            <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                One Way
              </label>
			</div>
            
          </div>
          
          
          <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Round Trip 
              </label>
			</div>
            
          </div>
            <div class=" clearfix"></div>
              <div class="row">
              
              <div class="col-sm-2">
              <div class="form-group">
               <label>Select Origin</label>
                    <input type="text" class="input-text full-width" placeholder="Select Origin" />
                  </div>
              
              </div>
               <div class="col-sm-2">
               <div class="form-group">
                    <label>Select Destination</label>
                    <input type="text" class="input-text full-width" placeholder="Select Destination" />
                  </div>
               
               
               </div>
                <div class="col-sm-3">
                	
                    <div class="col-sm-6">
                    <label>Departing On</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Departing On" />
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                    <label>Arriving On</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Arriving On" />
                      </div>
                    </div>
                    
                  
                
                
                </div>
                
                <div class="col-xs-1">
                      <label>Adults</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                <div class="col-xs-1">
                      <label>Kids</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-xs-1">
                      <label>Infants</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                
                
                
                
                
                 <div class="col-sm-2">
                 	<label>&nbsp;</label>
                 <button class="full-width icon-check">SEARCH NOW</button>
                 
                 
                 </div>

                 
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="flight-and-hotel-tab">
            
            <form action="flight-list-view.html" method="post">
            
            <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                One Way
              </label>
			</div>
            
          </div>
          
          
          <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Round Trip 
              </label>
			</div>
            
          </div>
            <div class=" clearfix"></div>
              <div class="row">
              
              <div class="col-sm-2">
              <div class="form-group">
               <label>Select Origin</label>
                    <input type="text" class="input-text full-width" placeholder="Select Origin" />
                  </div>
              
              </div>
               <div class="col-sm-2">
               <div class="form-group">
                    <label>Select Destination</label>
                    <input type="text" class="input-text full-width" placeholder="Select Destination" />
                  </div>
               
               
               </div>
                <div class="col-sm-3">
                	
                    <div class="col-sm-6">
                    <label>Depart Date</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Depart Date" />
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                    <label>Return Date</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Return Date" />
                      </div>
                    </div>
                    
                  
                
                
                </div>
                
                <div class="col-xs-1">
                      <label>Adults</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                <div class="col-xs-1">
                      <label>Kids</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-xs-1">
                      <label>Infants</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                          <option value="4">04</option>
                        </select>
                      </div>
                    </div>
                
                
                
                
                
                 <div class="col-sm-2">
                 	<label>&nbsp;</label>
                 <button class="full-width icon-check">SEARCH NOW</button>
                 
                 
                 </div>

                 
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="Holidays">
            <form action="car-list-view.html" method="post">
              <div class="row">
                  <div class="col-md-4">
                  
                   <label>Leaving from</label>
                      <input type="text" class="input-text full-width" placeholder="Leaving from" />
                  
                  </div>
                  <div class="col-md-4">
                  
                   <label>Going to</label>
                      <input type="text" class="input-text full-width" placeholder="Going to" />
                  
                  
                  </div>
                
                
                <div class="col-md-4">
                  <div class="form-group row">
                    <div class="col-xs-6">
                      <label>Month of Travel (Any)</label>
                      <div class="selector">
                        <select class="full-width">
                          <option value="">Month of Travel (Any)</option>
                          <option>September 2015</option>
                           <option>September 2015</option>
                            <option>September 2015</option>
                             <option>September 2015</option>
                              <option>September 2015</option>
                               <option>September 2015</option>
                                <option>September 2015</option>
                                 <option>September 2015</option>
                              
                                  <option>September 2015</option>
                                   <option>September 2015</option>
                                    <option>September 2015</option>
                                     <option>September 2015</option>
                                      <option>September 2015</option>
                                       <option>September 2015</option>
                                        <option>September 2015</option>
                                         <option>September 2015</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <label>&nbsp;</label>
                      <button class="icon-check full-width">SEARCH NOW</button>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              
              
              
            </form>
          </div>
          <div class="tab-pane fade" id="Buses">
            <form action="cruise-list-view.html" method="post">
              
              <form action="flight-list-view.html" method="post">
            
            <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                One Way
              </label>
			</div>
            
          </div>
          
          
          <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Round Trip 
              </label>
			</div>
            
          </div>
            <div class=" clearfix"></div>
              <div class="row">
              
              <div class="col-sm-2">
              <div class="form-group">
               <label>Select Origin</label>
                    <input type="text" class="input-text full-width" placeholder="Select Origin" />
                  </div>
              
              </div>
               <div class="col-sm-2">
               <div class="form-group">
                    <label>Select Destination</label>
                    <input type="text" class="input-text full-width" placeholder="Select Destination" />
                  </div>
               
               
               </div>
                <div class="col-sm-3">
                	
                    <div class="col-sm-6">
                    <label>Depart Date</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Depart Date" />
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                    <label>Return Date</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Return Date" />
                      </div>
                    </div>
                    
                  
                
                
                </div>
                
                
                <div class="col-xs-3">
                
                      <label>&nbsp;</label>
			<div class="input-group number-spinner">
            
				<span class="input-group-btn data-dwn">
					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
				<input type="text" class="form-control text-center" value="1 Seats" min="-10" max="40">
				<span class="input-group-btn data-up">
					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
				</span>
			</div>
	
                      
                    </div>
                    
                    
                
                
                
                
                
                 <div class="col-sm-2">
                 	<label>&nbsp;</label>
                 <button class="full-width icon-check">SEARCH NOW</button>
                 
                 
                 </div>

                 
              </div>
            </form>
              
              
            </form>
          </div>
          
          
          <div class="tab-pane fade" id="Cab">
            <form action="cruise-list-view.html" method="post">
              
              <form action="flight-list-view.html" method="post">
            
            <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                One Way
              </label>
			</div>
            
          </div>
          
          
          <div class=" col-sm-2">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Round Trip 
              </label>
			</div>
            
          </div>
            <div class=" clearfix"></div>
              <div class="row">
              
              <div class="col-sm-2">
              <div class="form-group">
               <label>Select Origin</label>
                    <input type="text" class="input-text full-width" placeholder="Select Origin" />
                  </div>
              
              </div>
               <div class="col-sm-2">
               <div class="form-group">
                    <label>Select Destination</label>
                    <input type="text" class="input-text full-width" placeholder="Select Destination" />
                  </div>
               
               
               </div>
                <div class="col-sm-3">
                	
                    <div class="col-sm-6">
                    <label>Depart Date</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Depart Date" />
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                    <label>Return Date</label>
                      <div class="datepicker-wrap">
                       
                        <input type="text" class="input-text full-width" placeholder="Return Date" />
                      </div>
                    </div>
                    
                  
                
                
                </div>
                
                
                <div class="col-xs-3">
                
                      <label>&nbsp;</label>
			<div class="input-group number-spinner">
            
				<span class="input-group-btn data-dwn">
					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
				<input type="text" class="form-control text-center" value="1 Seats" min="-10" max="40">
				<span class="input-group-btn data-up">
					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
				</span>
			</div>
	
                      
                    </div>
                    
                    
                
                
                
                
                
                 <div class="col-sm-2">
                 	<label>&nbsp;</label>
                 <button class="full-width icon-check">SEARCH NOW</button>
                 
                 
                 </div>

                 
              </div>
            </form>
              
              
            </form>
          </div>
          
          
          
          
          <div class="tab-pane fade" id="flight-status-tab">
            <form action="flight-list-view.html" method="post">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="title">Where</h4>
                  <div class="form-group row">
                    <div class="col-xs-6">
                      <label>Leaving From</label>
                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                    </div>
                    <div class="col-xs-6">
                      <label>Going To</label>
                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-md-2">
                  <h4 class="title">When</h4>
                  <div class="form-group">
                    <label>Departure Date</label>
                    <div class="datepicker-wrap">
                      <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-md-2">
                  <h4 class="title">Who</h4>
                  <div class="form-group">
                    <label>Flight Number</label>
                    <input type="text" class="input-text full-width" placeholder="enter flight number" />
                  </div>
                </div>
                <div class="form-group col-md-2 fixheight">
                  <label class="hidden-xs">&nbsp;</label>
                  <button class="icon-check full-width">SEARCH NOW</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="online-checkin-tab">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <h4 class="title">Where</h4>
                  <div class="form-group row">
                    <div class="col-xs-6">
                      <label>Leaving From</label>
                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                    </div>
                    <div class="col-xs-6">
                      <label>Going To</label>
                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-md-2">
                  <h4 class="title">When</h4>
                  <div class="form-group">
                    <label>Departure Date</label>
                    <div class="datepicker-wrap">
                      <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-md-2">
                  <h4 class="title">Who</h4>
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="input-text full-width" placeholder="enter your full name" />
                  </div>
                </div>
                <div class="form-group col-md-2 fixheight">
                  <label class="hidden-xs">&nbsp;</label>
                  <button class="icon-check full-width">SEARCH NOW</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
        
        
   </div><!--Header-Banner--> 
  
  
<script>

$(document).ready(function(e){
	e.preventDefault();
	$("#search_flight").click(function(){
		var from=$("#from").val();
		var to=$("#to").val();
		var checkin=$("#checkin").val();
		var adult=$("#adults").val();
	/*	
		$.ajax({
			type="post",
			url="<?php echo base_url('index.php/Flight/flight_list');?>",
			data:$("#flight_list"),
			beforsend:function()
			{
				
			}
			success:function()
			{
				
			}
			
		});*/
	});
	
});
</script>	
	
<script>
	$(document).ready(function(){
		//auto search city
		var div_val_arr = [];
			$("#id_div_values li").each(function() {
				div_val_arr.push($(this).text());
			});
			
	$( "#destination" ).autocomplete({
			source: div_val_arr,
			select: function( event, ui ) {
					//$('#abcd1234').css('display','block');
					
				  }
				});
			$('#destination').focusout(function(){myFunction();
			});
</script>