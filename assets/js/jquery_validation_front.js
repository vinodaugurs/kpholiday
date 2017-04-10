/*  Registration Form Start */
$("#own_packages").validate({
	
	rules: {
		start_city:{required:true},
		source : {required:true},
		rooms:{required:true},
		adult:{required:true},
		child : {required:true},
		infants : {required:true},
		emails : {required:true, email: true},
		contact : {required:true, number: true,minlength:10}	
	},
	messages: {
		start_city: { required: "This field is required."},
		source:  { required: "This field is required."},
		rooms: { required: "This field is required."},
		adult: { required: "This field is required."},
		child:  { required: "This field is required."},
		infants:  { required: "This field is required."},
		emails:  { required: "This field is required.", email: "Please enter a valid email address."},
		contact:  { required: "This field is required.", number: "Only number are allowed.",minlength:"Contact number must be of minimum 10 digits."}		
	},
	highlight: function(element) {
		$(element).closest('.form-group').removeClass('has-success1').addClass('has-error1');
	},
})

$('#package_btn').click(function() {
	
	if($("#own_packages").valid())
	{
		packagess();
	}
});
/*  Registration Form End */
