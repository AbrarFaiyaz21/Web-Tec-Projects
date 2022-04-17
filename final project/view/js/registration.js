function validation(pForm) {
	let err1 = document.getElementById("err1");
	let err2 = document.getElementById("err2");
	let err3 = document.getElementById("err3");
	let err4 = document.getElementById("err4");
	let err5 = document.getElementById("err5");
	let err6 = document.getElementById("err6");
	let err7 = document.getElementById("err7");
	let err8 = document.getElementById("err8");
	let err9 = document.getElementById("err9");

	err1.innerHTML = err2.innerHTML = err3.innerHTML = err4.innerHTML = err5.innerHTML = err6.innerHTML = err7.innerHTML = err8.innerHTML = err9.innerHTML = "";

	const firstname = pForm.fName.value;
	const lastname = pForm.lName.value;
	const gender = pForm.gender.value;
	const dob = pForm.dob.value;
	const phone = pForm.phone.value;
	const email = pForm.email.value;
	const username = pForm.uName.value;
	const password = pForm.pass.value;
	const confirmPass = pForm.confirmPass.value;

	const phonePattern = /^[0][1][0-9]{3}[0-9]{6}/i;
	const emailPattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

	let flag = true;

	if (firstname === "") {
		err1.innerHTML = "Please enter your first name";
		flag = false;
	}
	if (lastname === "") {
		err2.innerHTML = "Please enter your last name";
		flag = false;
	}
	if (gender === "") {
		err3.innerHTML = "Please select a gender";
		flag = false;
	}
	if (dob === "") {
		err4.innerHTML = "Please insert your birth date";
		flag = false;
	}
	else {
		var born = new Date(dob);
    	//calculate month difference from current date in time
   		 var month_diff = Date.now() - born.getTime();
    
   		 //convert the calculated difference in date format
   		 var age_dt = new Date(month_diff); 
    
   		 //extract year from date    
   		 var year = age_dt.getUTCFullYear();
    
  		  //now calculate the age of the user
  		  var age = Math.abs(year - 1970);

  		  if (age<18) {
  		  	err4.innerHTML = "You need to be 18 years of age and older";
			flag = false;
  		  }
	}

	if (phone === "") {
		err5.innerHTML = "Please insert your phone number";
		flag = false;
	}
	else if (isNaN(phone)) {
		err5.innerHTML = "Invalid phone number";
		flag = false;
	}
	else if (phone.length!=11) {
		err5.innerHTML = "Phone number must be 11 digits only";
		flag = false;
	}
  	else if(!phone.match(phonePattern)) {
  		err5.innerHTML = "Invalid phone number pattern";
   		return false;
  	}

	if (email === "") {
		err6.innerHTML = "Please enter your email address";
		flag = false;
	}
	else if (!email.match(emailPattern)) {
		err6.innerHTML = "Please enter a valid email address";
		flag = false;
	}

	if (username === "") {
		err7.innerHTML = "Please enter your user name";
		flag = false;
	}
	if (password === "") {
		err8.innerHTML = "Please enter your password";
		flag = false;
	}
	else if (password.length < 3) {
		err8.innerHTML = "Password can't be less than 3 characters";
		flag = false;
	}
	if (confirmPass === "") {
		err9.innerHTML = "Please enter your password for confirmation";
		flag = false;
	}
	if (password!==confirmPass) {
		err9.innerHTML = "Password are not matching";
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
		xhttp.send("fName=" + firstname + "&lName=" + lastname + "&gender=" + gender + "&dob=" + dob + "&phone=" + phone + "&email=" + email + "&uName=" + username + "&pass=" + password + "&confirmPass=" + confirmPass);
	}*/

	return flag;

}