function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : 0;
}
function requestData(dataArr) {
	let i = "";
	for (let key in dataArr)
	{
		i += `${key}=${dataArr[key]}&`;
	}
	return i;
}

function hideNotification(id) {
	document.querySelector("#" + id).style.display = "none";
}

function setCookie(name, value, options) {
	options = options || {};

	let expires = options.expires;

	if (typeof expires == "number" && expires) {
		let d = new Date();
		d.setTime(d.getTime() + expires * 1000);
		expires = options.expires = d;
	}
	if (expires && expires.toUTCString) {
		options.expires = expires.toUTCString();
	}

	value = encodeURIComponent(value);

	let updatedCookie = name + "=" + value;

	for (let propName in options) {
		updatedCookie += "; " + propName;
		let propValue = options[propName];
		if (propValue !== true) {
			updatedCookie += "=" + propValue;
		}
	}

	document.cookie = updatedCookie;
}

function deleteCookie() {
	let data = {
		"id_user": getCookie("id_user"),
		"login": getCookie("login")
	};
	setCookie("login", "", {
		expires: -1
	});
	setCookie("id_user", "", {
		expires: -1
	});
	setCookie("forgot", "", {
		expires: -1
	});
	let xhttp = new XMLHttpRequest();
	xhttp.open("post", "../../core/logout.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(data));
	xhttp.onload = function () {
		document.location.href = "login.php";
	}
}

function convertCanvasToImage(canvas, w, h) {
	let image = new Image(w,h);
	image.src = canvas.toDataURL("image/png");
	return image;
}

function createUuid(){
	let dt = new Date().getTime();
	let uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
		let r = (dt + Math.random()*16)%16 | 0;
		dt = Math.floor(dt/16);
		return (c=='x' ? r :(r&0x3|0x8)).toString(16);
	});
	return uuid;
}

function createNotification(enter, type)
{
	let	notification;
	let button;
	let hero;

	hero = document.querySelector(".body-e");
	button = document.createElement("button");
	button.classList.add("delete");
	notification = document.createElement("div");
	notification.classList.add("notification");
	notification.id = createUuid();
	button.dataset.div_id = notification.id;
	notification.innerHTML = enter;
	button.onclick = deleteNotification;
	notification.appendChild(button);
	if (type === 1)
		notification.classList.add("is-success");
	else if (type === 2)
		notification.classList.add("is-warning");
	else if (type === 3)
		notification.classList.add("is-danger");
	hero.insertBefore(notification, hero.firstChild);
}

function deleteNotification() {
	document.getElementById(this.dataset.div_id).remove();
}
