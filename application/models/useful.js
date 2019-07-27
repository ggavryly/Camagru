function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
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
