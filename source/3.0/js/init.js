(function($){
  $(function(){
    $("#register-button").click(function(){
        $("#license").load("license.lic");
    });
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
	$(".dropdown-button").dropdown();
	$('.modal-trigger').leanModal({
		dismissible: false,
	});
	
  }); // end of document ready
})(jQuery); // end of jQuery name space