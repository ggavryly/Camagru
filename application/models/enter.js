function ajax (url,method,functionName, dataArray, mode) {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataArray);

	xhttp.onload = function () {
		let response = JSON.parse(this.responseText);
		if (mode === 1)
		{
			if (response["answer"] === "1")
			{
				alert("You have successfully registered");
				backTransition();
			}
			else
			{
				alert("This data is already used by another user\nPlease type other data");
			}
		}
		else if (mode === 2) {
			if (response === 0)
			{
				alert("Wrong data\nPlease rewrite your login or password");
			}
			else if (response === 2)
			{
				alert("Please confirm your email before authorization")
			}
			else
			{
				document.location.href = "photo-list.php";
			}
		}
		else
		{

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
	form = document.querySelector("#Right_form");
	name = document.querySelector("#Right_field_login").value;
	pass = document.querySelector("#Right_field_pass").value;
	email = document.querySelector("#Right_field_email").value;
	if (name === "" || pass === "" || email === "") {
		alert("Wrong Data!");
		return false;
	}
	data = {
		"name" : name,
		"pass" : pass,
		"email" : email
	};
	ajax("../../core/new-user.php", "post", console.log, requestData(data), 1);
	return true;
}

function signIn() {
	let name, pass, data;

	name = document.querySelector("#Center_field_login").value;
	pass = document.querySelector("#Center_field_pass").value;
	if (name === "" || pass === "")
	{
		alert("Please insert your login and password!");
	}
	data = {
		"name" : name,
		"pass" : pass,
	};
	ajax("../../core/authorization.php", "post", console.log, requestData(data), 2);
}

function resetPassword() {
	let email, data;

	email = document.querySelector("#Left_field_email").value;
	if (email === "") {
		alert("Wrong Data!");
		return false;
	}
	data = {
		"email" : email
	};
	ajax("../../core/recover-pass.php", "post", console.log, requestData(data), 3);

}

function leftTransition() {
	document.querySelector(".form-slider").style.marginLeft = 0 + "px";
}

function rightTransition() {
	document.querySelector(".form-slider").style.marginLeft = "-" + 800 + "px";
}

function backTransition() {
	document.querySelector(".form-slider").style.marginLeft = "-" + 400 + "px";
}