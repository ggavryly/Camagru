function ajax (url,method,functionName, dataArray) {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataArray);

	xhttp.onload = function () {
		try {
			let response = JSON.parse(xhttp.responseText);
			if (response["response"] === 1)
			{
				let now = new Date();
				now.setMonth( now.getMonth() + 1 );
				document.cookie = "login = " + escape(response["login"])+"; " + "expires=" + now.toUTCString() + ";";
				document.cookie = "id_user = " + escape(response["id_user"])+"; " + "expires=" + now.toUTCString() + ";";
				document.location.href = "photo-booth.php";
			}
			else if (response["response"] === 4 || response["response"] === 0)
			{
				if (response["response"] === 4)
					createNotification("Please verify your email address", 2);
				else if (response["response"] === 0)
					createNotification("No user with this login", 3);
			}
		}
		catch (e) {

		}
		finally {

		}

	};
	return (xhttp);
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
				console.log(response);
				if (response === 1)
				{
					document.location.href = "login.php";
				}
				if (response === 2 || response === 3)
				{
					if (response === 2)
					{
						createNotification("User with login already exist", 2);
					}
					else if (response === 3)
					{
						createNotification("User with email already exist", 2);
					}
				}
			}
			catch (e) {
				createNotification("Database Error");
			}
			finally {

			}

		};
	}
	else
	{
		if (validatePassword(pass) !== 1)
			createNotification(validatePassword(pass), 2);
		else
			createNotification(validateEmail(email), 2);
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
				createNotification("No user with these email", 2);
			} else if (response === 1) {
				createNotification("Recover letter was sen to your email", 1);
			}

		} catch (e) {

		} finally {

		}
	};
}

function new_pass() {

	let pass, data;

	pass = document.querySelector("#new_passe").value;
	if (pass === "") {
		return false;
	}
	data = {
		"pass" : pass,
		"id_user" : getCookie("id_user"),
		"login" : getCookie("login"),
		"mode" : "pass"
	};
	let xhttp = new XMLHttpRequest();
	xhttp.open("post", "../../core/edit-user-data.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(data));

	xhttp.onload = function () {
		try {
			document.location.href = "login.php";

		} catch (e) {

		} finally {

		}
	};
}
