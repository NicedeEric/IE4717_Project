function chkEmail(event) {
	var myEmail = event.currentTarget;
	var pos = myEmail.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
	if (pos != 0) {
		alert("The email you entered (" + myEmail.value + ") is not in the correct form.");
		myEmail.focus();
		myEmail.select();
	}
}

function chkPwd(event) {
	var myPwd = event.currentTarget;
	if (myPwd.value.length < 6 || myPwd.value.length > 20) {
		alert("The password length should be 6-20 characters.");
		myPwd.focus();
		myPwd.select();
	}
}

var emailNode = document.getElementById("email");
emailNode.addEventListener("change", chkEmail, false);
var pwdNode = document.getElementById("password");
pwdNode.addEventListener("change", chkPwd, false);
