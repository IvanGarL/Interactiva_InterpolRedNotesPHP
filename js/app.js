$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});

	$('#sidebarCollapse_1').on('click', function () {
		$('#sidebar').toggleClass('active');
		
		var active = $('#sidebar').hasClass('active'); 
		if(active){
			$('#collapse-icon').removeClass('fas fa-angle-double-left');
			$('#collapse-icon').addClass('fas fa-angle-double-right');
			$("#collapse-icon").css("color", "white");
		}
		else{
			$('#collapse-icon').removeClass('fas fa-angle-double-right');
			$('#collapse-icon').addClass('fas fa-angle-double-left');
			$("#collapse-icon").css("color", "white");
		}

	});
});
