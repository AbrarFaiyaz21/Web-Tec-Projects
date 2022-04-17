function validation(pForm) {
	let err1 = document.getElementById("err1");
	let err2 = document.getElementById("err2");

	err1.innerHTML = err2.innerHTML = "";

	const username = pForm.uName.value;
	const password = pForm.pass.value;

	let flag = true;

	if (username === "") {
		err1.innerHTML = "Please enter your user name";
		flag = false;
	}
	if (password === "") {
		err2.innerHTML = "Please enter your password";
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
		xhttp.send("uName=" + username + "&pass=" + password);
	}*/

	return flag;

}