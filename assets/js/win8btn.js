$(document).ready(function() {
	// alert('hello');

	$(".win8btn").wrap("<div class='btn-container'>");
	$(".win8btn").on('click', function(e) {
		// alert('');
		$(this).removeClass().addClass('win8btn');
		var relX = e.pageX - $(this).offset().left;
        var relY = e.pageY - $(this).offset().top;
        // alert(relX +" "+ relY);
        w = $(this).innerWidth()/3;
        h = $(this).innerHeight()/3;
        if( relX < w && relY > h && relY < h*2) {
        	$(this).addClass('left');
        }
        else if( relX > w*2 && relY > h && relY < h*2) {
        	$(this).addClass('right');
        }
        else if( relX > w && relX < w*2 && relY > h && relY < h*2) {
        	$(this).addClass('center');
        }
        else if( relX > w && relX < w*2 && relY < h ) {
        	$(this).addClass('top');
        }
        else if( relX > w && relX < w*2 && relY > h*2) {
        	$(this).addClass('bottom');
        }
        else if( relX < w && relY < h ) {
        	$(this).addClass('topleft');
        }
        else if( relX < w && relY > h*2 ) {
        	$(this).addClass('bottomleft');
        }
        else if( relX > w*2 && relY < h ) {
        	$(this).addClass('topright');
        }
        else if( relX > w*2 && relY > h*2 ) {
        	$(this).addClass('bottomright');
        }
	});

 //    $('a').click(function (e) {
	//     e.preventDefault();
	//     var goTo = this.getAttribute("href");
	//     setTimeou(function(){
	//          window.location = goTo;
	//     },400);       
	// });


    $('a').click(function (e) {
	    e.preventDefault();
	    var goTo = this.getAttribute("href");
	    setTimeout(function(){
	         window.location = goTo;
	    },200);       
	});
});