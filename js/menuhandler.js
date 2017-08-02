$(document).ready(function(){
	$('#konten').load("menu/default.php");
	$(".menu").click(function(){
		var link = $(this).attr("name");
		$('#konten').load("menu/"+link+".php");
	});
});
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}