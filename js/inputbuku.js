$(document).ready(function()
{
	var request;
	$("#inputbuku").submit(function(event){
		event.preventDefault();
		if (request) {
        request.abort();
		}
		var $form = $(this);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		$inputs.prop("disabled", true);
		request = $.ajax({
			url: "menu/inputbuku_input.php",
			type: "post",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR){
			alert("Berhasil memasukkan data ke database");
		});
		request.fail(function (jqXHR, textStatus, errorThrown){
			alert("The following error occurred: "+textStatus, errorThrown);
		});
		request.always(function () {
			$inputs.prop("disabled", false);
		});
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