var main = function() { 
	/*scrolling function (taken from w3schools tutorial) */
	$("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({scrollTop: $(hash).offset().top-100}, 500, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } 
  });

	//enable or disenable scrolling 
	setTimeout(function() { 
		$('body').removeClass('stop-scrolling');
	}, 2700)
	/*note that delays are primarily supposed to be for animations*/ 
	
	/*toggle form*/ 
	$('#mail').click(function(){ 
		$('.email').toggleClass('visible'); 
	});

	var highlighted = false;
	$('#mail').hover(function() { 
		if (highlighted === false) {
			$(this).attr('src', 'img/mailHighlighted.png'); 
			highlighted = true; 
		}

		else if (highlighted === true) { 
			$(this).attr('src', 'img/mail.png'); 
			highlighted=false; 
		}
		
	});




}

$(document).ready(main); 