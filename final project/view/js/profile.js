function validation(pForm) {
	let err1 = document.getElementById("err1");

	err1.innerHTML = "";

	const username = pForm.uName.value;

	let flag = true;

	if (username === "") {
		err1.innerHTML = "Please enter an user name";
		flag = false;
	}

	if (flag) {

		const actionURL = pForm.action;
		const actionMethod = pForm.method;

		let xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById("msg").innerHTML = this.responseText;
		}
		xhttp.open(actionMethod, actionURL);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("uName=" + username);
	}

	//return flag;

}