$(document).ready(function(){
	$("form#whiteboardPost").submit(function() {
	// we want to store the values from the form input box, then send via ajax below
	var post = $("#post").attr('value');
	var userID = $("#userID").attr('value');
	var profileUserID = $("#profileUserID").attr('value');
	var home = $(".home").attr('value');

		$.ajax({
			type: "POST",
			url: "../whiteboardPost.php",
			data: 'post='+ post + '&userID=' + userID + '&profileUserID=' + profileUserID + '&home=' + home,

			success: function(){
				//$('form#submit').hide(function(){$('div#responseContainer').fadeIn();});
				$('input[type=text]').attr('value', '');

				
			},
                 error: function(){
                   
                   alert('Error: '+profileUserID);
                 }
		});
	return false;
	});
});