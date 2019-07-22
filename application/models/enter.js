function ajax (url,method,functionName, dataArray) {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataArray);

	xhttp.onload = function () {
		try {
			let response = JSON.parse(xhttp.responseText);
			if (response === 1)
			{
				document.location.href = "photo-list.php";
			}
			else if (response === 2 || response === 0)
			{
				notification(response);
			}
		}
		catch (e) {

		}
		finally {

		}

	};
	return (xhttp);
}

function requestData(dataArr) {
	let i = "";
	for (let key in dataArr)
	{
		i += `${key}=${dataArr[key]}&`;
	}
	return i;
}

function validatePassword(field) {
	if (field.length < 6) {
		return "The password has to contain at least 6 numbers.\n";
	} else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) ||
		!/[0-9]/.test(field)) {
		return "The password has to contain include at least one symbol from the set | {a-z} | A-Z | 0-9.\n"
	}
	return 1;
}

function validateEmail(field) {
	if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)){
		return "Email has a wrong format.\n"
	}
	return 1;
}

function	signUp() {
	let name, pass, email, form, data;
	name = document.querySelector("#sign-up-login").value;
	pass = document.querySelector("#sign-up-pass").value;
	email = document.querySelector("#sign-up-email").value;
	if (validateEmail(email) === 1 && validatePassword(pass) === 1)
	{
		data = {
			"name" : name,
			"pass" : pass,
			"email" : email
		};
		let xhttp = new XMLHttpRequest();
		xhttp.open("post", "../../core/new-user.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(requestData(data));

		xhttp.onload = function () {
			try {
				let response = JSON.parse(xhttp.responseText);
				if (response === 1)
				{
					document.location.href = "login.php";
				}
				if (response === 2 || response === 3)
				{
					if (response === 2)
					{
						document.querySelector("#login-already").style.display = "";
					}
					else if (response === 3)
					{
						document.querySelector("#email-already").style.display = "";
					}
				}
			}
			catch (e) {
				notification("NO DATABASE");
			}
			finally {

			}

		};
	}
	else
	{
		if (validatePassword(pass) !== 1)
		{
			notification(validatePassword(pass));
		}
		else
		{
			notification(validateEmail(email));
		}
	}
	return true;
}

function signIn() {
	let name, pass, data;

	name = document.querySelector("#login-input").value;
	pass = document.querySelector("#pass-input").value;
	data = {
		"name" : name,
		"pass" : pass,
	};
	ajax("../../core/authorization.php", "post", console.log, requestData(data));
}

function resetPassword() {
	let email, data;

	email = document.querySelector("#forgot-email").value;
	if (email === "") {
		return false;
	}
	data = {
		"email" : email
	};
	let xhttp = new XMLHttpRequest();
	xhttp.open("post", "../../core/recover-pass.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(data));

	xhttp.onload = function () {
		try {
			let response = JSON.parse(xhttp.responseText);
			if (response === 0) {
				document.querySelector("#no-email").style.display = "";
			} else if (response === 1) {
				document.querySelector("#success-email").style.display = "";
			}

		} catch (e) {

		} finally {

		}
	};
}

function notification(response) {
	document.querySelector("#you-sign-up").style.display = "";
	document.querySelector("#you-sign-up").innerHTML = response + "<button  onclick=\"hideNotification('you-sign-up')\" class=\"delete\"></button>";
}

function hideNotification(id) {
	document.querySelector("#" + id).style.display = "none";
}
