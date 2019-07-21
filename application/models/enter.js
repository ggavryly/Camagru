function ajax (url,method,functionName, dataArray) {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataArray);

	xhttp.onload = function () {
		let response = JSON.parse(xhttp.responseText);
		if (response === 1)
		{
			document.location.href = "photo-list.php";
		}
		else if (response === 2 || response === 0)
		{
			notification(response);
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

function	signUp() {
	let name, pass, email, form, data;
	name = document.querySelector("#sign-up-login").value;
	pass = document.querySelector("#sign-up-pass").value;
	email = document.querySelector("#sign-up-email").value;
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
		let response = JSON.parse(xhttp.responseText);
		if (response === 1)
		{
			document.querySelector("#you-sign-up").style.display = "";
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
	};
	return true;
}

function kaka() {

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
		let response = JSON.parse(xhttp.responseText);
		if (response === 0)
		{
			document.querySelector("#no-email").style.display = "";
		}
		else if (response === 1)
		{
			document.querySelector("#success-email").style.display = "";
		}
	};
}

function notification(response) {
	if (response === 2)
	{
		document.querySelector("#please-conf-email").style.display = "";
	}
	else if (response === 0)
	{
		document.querySelector("#user-not-found").style.display = "";
	}
}

function hideNotification(id) {
	document.querySelector("#" + id).style.display = "none";
}
