/*wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})*/
// Animations init
new WOW().init();

$(document).ready(function(){
	var offset = 250;
	var duration = 500;

	$(window).scroll(function(){
		if ($(this).scrollTop() > offset) {
			$('.to-top').fadeIn(duration);
		} else {
			$('.to-top').fadeOut(duration);
		}
	});
});


	/*$(document).ready(function() {
      var delay = 1500;
      $('.log-btn').click(function(e){
        e.preventDefault();
        
        var firstname = $('#reg-firstname').val();
        if(name == ''){
          $('#reg-firstname').focus();
          return false;
        }

        var lastname = $('#reg-lastname').val();
        if(name == ''){
          $('#reg-lastname').focus();
          return false;
        }
        
        var email = $('#reg-email').val();
        if(email == ''){
          $('#reg-email').focus();
          return false;
          }
          if( $("#reg-email").val()!='' ){
            if( !isValidEmailAddress( $("#reg-email").val() ) ){
            $('#reg-email').focus();
            return false;
          }
        }
        
        var password = $('#reg-password').val();
        if(password == ''){
        	$('#reg-password').focus();
        	return false;
        }

        var phone = $('#reg-phone').val();
        if(phone == ''){
        	$('#reg-phone').focus();
        	return false;
        }
              
        $.ajax
        ({
          type: "POST",
          url: "reg-insert-data.php",
          data: "firstname="+firstname+"&lastname="+lastname+"&email="+email+"&password="+password+"&phone="+phone,
          beforeSend: function() {
            $('.spinner').html(
            '<img src="img/loader.gif" width="25" height="25"/>'
            );
          },    
          success: function(data)
          {
            setTimeout(function() {
            $('.model-popup').html(data);
            }, delay);
          }
        });
      });    
    });*/