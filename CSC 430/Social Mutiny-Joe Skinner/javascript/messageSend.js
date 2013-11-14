$(document).ready(function(){
	$(".messageSend").submit(function() {
	// we want to store the values from the form input box, then send via ajax below
	 var postData = $(this).serializeArray();
	 var inboxThread= "includes/inboxThread.php?inboxid="+postData[2].value;
	 var thread="#thread_"+postData[2].value; 
	 $.ajax({
			type: "POST",
			url: "../sendMessage.php",
			data: postData,

			success: function(){
				//$(".thread").load("includes/inboxThread.php",{inboxid:postData[2].value}),
				$('textarea').attr('value', '');
				//alert(inboxThread);
				
			 },
                 error: function(){
                  alert("inboxID="+postData[2].value);
                 }
				 
		});
	return false;
	});
});