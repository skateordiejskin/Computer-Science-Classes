$(document).ready(function(){
	$("form#aboutMe").submit(function() {
	// we want to store the values from the form input box, then send via ajax below
	var post = $("#about").attr('value');

		$.ajax({
			type: "POST",
			url: "../aboutMeUpdate.php",
			data: 'about='+ about.value,

			success: function(){
				//$("#about").html(data);
				 $('#aboutMe').hide();
			}
		});
	return false;
	});
});