

let loader = "<div id='load-screen'><div id='loading'><div></div></div></div>";

$('body').prepend(loader);

$(window).on("load",function(){
     $("#load-screen").fadeOut("slow");
});
