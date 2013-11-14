$(document).ready(function(){
	$("form#movies").submit(function() {
	// we want to store the values from the form input box, then send via ajax below
	var movies = $("#movies").attr('value');

		$.ajax({
			type: "POST",
			url: "../moviesUpdate.php",
			data: 'movies='+ movies.value,

			success: function(){
				//$("#movies").html(data);
				 $('#movies').hide();
			}
		});
	return false;
	});
});