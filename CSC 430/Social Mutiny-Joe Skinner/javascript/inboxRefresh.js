$(document).ready(function() {
$(".thread").load("includes/inboxThread.php");
var refreshId = setInterval(function() {
$(".thread").load("includes/inboxThread.php");
}, 1000);
});
