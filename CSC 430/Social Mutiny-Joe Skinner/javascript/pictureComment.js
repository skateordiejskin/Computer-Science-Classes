$(document).ready(function(){
	$(".pictureComments").submit(function() {
	// we want to store the values from the form input box, then send via ajax below

	 var postData = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../sendMessage.php",
			data: postData,

			success: function(){
				$(".thread").load("includes/inbox.php .thread"),
				$('textarea').attr('value', '');
				
			 },
                 error: function(){
                   
                   alert('Error: Your request could not be completed');
                 }
		});
	return false;
	});
});