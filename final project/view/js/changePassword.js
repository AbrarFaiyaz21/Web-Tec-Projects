function validation(pForm) {
	let err1 = document.getElementById("err1");
	let err2 = document.getElementById("err2");
	let err3 = document.getElementById("err3");

	err1.innerHTML = err2.innerHTML = err3.innerHTML = "";

	const currentPass = pForm.currentPass.value;
	const newPass = pForm.newPass.value;
	const confirmPass = pForm.confirmPass.value;

	let flag = true;

	if (currentPass === "") {
		err1.innerHTML = "Please enter your current Password";
		flag = false;
	}
	if (newPass === "") {
		err2.innerHTML = "Please enter your new Password";
		flag = false;
	}
	if (confirmPass === "") {
		err3.innerHTML = "Please enter your confirm password";
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
		xhttp.send("currentPass=" + currentPass + "&newPass=" + newPass + "&confirmPass=" + confirmPass);
	}

	//sreturn flag;

}