$(document).ready(function() {
$("#profileResponseContainer").load("includes/profileWhiteboardPosts.php");
var refreshId = setInterval(function() {
$("#profileResponseContainer").load('includes/profileWhiteboardPosts.php');
}, 1000);
});
