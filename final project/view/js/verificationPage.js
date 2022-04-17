function validation(pForm) {
	let err1 = document.getElementById("err1");

	err1.innerHTML = "";

	const code = pForm.code.value;

	let flag = true;

	if (code === "") {
		err1.innerHTML = "Please enter your verification code";
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
		xhttp.send("code=" + code);
	}*/

	return flag;

}