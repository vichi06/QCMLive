$(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 4000) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});


$(function() {
	// Sidebar toggle behavior
	$('#sidebarCollapse').on('click', function() {
	  $('#sidebar, #content').toggleClass('active');
	});
  });
  