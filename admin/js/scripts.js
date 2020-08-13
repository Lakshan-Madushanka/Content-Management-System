
// Loader

let loader = "<div id='load-screen'><div id='loading'><div></div></div></div>";

$('body').prepend(loader);

$(window).on("load",function(){
     $("#load-screen").fadeOut("slow");
});


// Ajax request to get user online count

function loadUsersOnline() {


	$.get("includes/functions.php?onlineusers=result", function(data){

		$(".usersonline").text(data);


	});

}

setInterval(function(){

	loadUsersOnline();


},500);