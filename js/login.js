$(document).ready(function(){
	var request;
	var status2 = getCookie("pengguna");
	if(status2 != null)
	{
		switch(status2)
		{
			case "1":alert("Selamat Datang admin !");window.location.href="admin.php";break;
			case "2":alert("Selamat Datang anggota !");window.location.href="anggota.php";break;
			case "3":alert("Selamat Datang pimpinan !");window.location.href="pimpinan.php";break;
			case "4":alert("Selamat Datang operator !");window.location.href="operator.php";break;
		}
	}
	$("#login").submit(function(event){
		event.preventDefault();
		if (request) {
		request.abort();
		}
		var $form = $(this);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		$inputs.prop("disabled", true);
		request = $.ajax({
			url: "login.php",
			type: "post",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR){
			var status = getCookie("pengguna");
			switch(status)
			{
				case "1":alert("Selamat Datang admin !");window.location.href="admin.php";break;
				case "2":alert("Selamat Datang anggota !");window.location.href="anggota.php";break;
				case "3":alert("Selamat Datang pimpinan !");window.location.href="pimpinan.php";break;
				case "4":alert("Selamat Datang operator !");window.location.href="operator.php";break;
				default:alert("Anda bukan user terdaftar");window.location.href="index.php";break;
			}
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