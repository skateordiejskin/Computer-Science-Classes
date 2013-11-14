$(function() {
	$(".comment_button").click(function() {
		var test = $("#whiteboardPost").val();
		var dataString = 'whiteboardPost=' + test;
		if (test == '') {
			alert("Please Enter Some Text");
		} else {
			$("#flash").show();
			$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle"> <span class="loading">Loading Comment...</span>');
			$.ajax({
				type: "POST",
				url: "whiteboardPost.php",
				data: dataString,
				cache: false,
				success: function(html) {
					$("#display").after(html);
					document.getElementById('whiteboardPost').value = '';
					document.getElementById('whiteboardPost').focus();
					$("#flash").hide();
				}
			});
		}
		return false;
	});
});
