$(document).ready(function(){
	$("form#email").submit(function() {
	// we want to store the values from the form input box, then send via ajax below
	var email = $("#email2").attr('value');

		$.ajax({
			type: "POST",
			url: "../emailUpdate.php",
			data: 'email='+ email,

			success: function(){
				//$("#email").html(data);
				 $('#email').hide();
			}
		});
	return false;
	});
});