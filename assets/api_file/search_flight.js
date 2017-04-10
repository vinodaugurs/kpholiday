
/* Flight Search API the method AirGetAvailability  open*/


$(document).ready(function(){
	
	
	$("#search_flight").click(function(e){
	  e.preventdefault(); 
	  var source=$("#source").val(); 
	  var dest=$("#source").val();
	  var ongoing=$("#source").val();
	});
	
	
	
	 $(".way").click(function() {
	 
    if ($("input[name=way]:checked").val() == "oneway") {
        $("#inlineRadio2").hide();     
	 }
 	

       });
	   
	   
});


