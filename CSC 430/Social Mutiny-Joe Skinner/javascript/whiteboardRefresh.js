$(document).ready(function() {
$("#responseContainer").load("includes/homeWhiteboardPosts.php");
var refreshId = setInterval(function() {
$("#responseContainer").load('includes/homeWhiteboardPosts.php');
}, 1000);
});
