function validation(pForm) {
	let err1 = document.getElementById("err1");
	let err2 = document.getElementById("err2");
	let err3 = document.getElementById("err3");

	err1.innerHTML = err2.innerHTML = err3.innerHTML = "";

	const address = pForm.address.value;
	const poBox = pForm.poBox.value;
	const phone = pForm.phone.value;

	const phonePattern = /^[0][1][0-9]{3}[0-9]{6}/i;

	let flag = true;

	if (address === "") {
		err1.innerHTML = "Please enter your street address";
		flag = false;
	}
	if (poBox === "") {
		err2.innerHTML = "Please enter your P.O Box Number";
		flag = false;
	}
	if (phone === "") {
		err3.innerHTML = "Please enter your phone Number";
		flag = false;
	}
	else if (isNaN(phone)) {
		err3.innerHTML = "Invalid phone number";
		flag = false;
	}
	else if (phone.length!=11) {
		err3.innerHTML = "Phone number must be 11 digits only";
		flag = false;
	}
  	else if(!phone.match(phonePattern)) {
  		err3.innerHTML = "Invalid phone number pattern";
   		return false;
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
		xhttp.send("address=" + address + "&poBox=" + poBox + "&phone=" + phone);
	}

	//return flag;

}