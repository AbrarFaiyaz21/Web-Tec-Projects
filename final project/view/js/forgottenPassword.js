function validation(pForm) {
	let err1 = document.getElementById("err1");

	err1.innerHTML = "";

	const email = pForm.email.value;

	const emailPattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

	let flag = true;

	if (email === "") {
		err1.innerHTML = "Please enter your email";
		flag = false;
	}
	else if (!email.match(emailPattern)) {
		err1.innerHTML = "Please enter a valid email address";
		flag = false;
	}

	/*if (flag) {

		const actionURL = pForm.action;
		const actionMethod = pForm.method;

		let xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById("msg").innerHTML = this.responseText;
		}
		xhttp.open(actionMethod, actionURL);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("email=" + email);
	}*/

	return flag;

}