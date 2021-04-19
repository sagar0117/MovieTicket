function onsignin(googleUser){
	var profile = googleUser.getBasicProfile();
	document.getElementById("google").innerHTML = profile.getName();
	$(".google-profile").css("display","block");
	$(".google-signin").css("display","none");
	document.getElementById("email").innerHTML = profile.getEmail();
	document.getElementById("emaila").href = "mailto:" + profile.getEmail();
	// document.getElementById("confirmation").value = "Deep Sarhwara";
    // $(".bodyofQR").css("background-color","red");
}
