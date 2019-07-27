let needle = {
	"mode" : 1,
	"id_post" : 0
};

let comn = {
	"curr" : 0,
	"first" : 0
};

uploadPosts(needle);
getLikes();
function like() {
	let xhttp = new XMLHttpRequest();
	let like = {
		"id_post" : this.dataset.id_post,
		"id_user" : getCookie("id_user"),
		"login" : getCookie("login")
	};
	let spane = this;
	xhttp.open("post", "../../core/like.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(like));
	xhttp.onload = function () {
		try {
			let response = JSON.parse(xhttp.responseText);
			if (response === 1)
			{
				spane.children[0].src = "../../../public/styles/style-images/like-1.png";
			}
			else
			{
				spane.children[0].src = "../../../public/styles/style-images/like-0.png";
			}
		}
		catch (e) {

		}
		finally {

		}

	};

}

function getLikes() {
	let ajax = new XMLHttpRequest();
	let data = {
		"id_user" : getCookie("id_user"),
		"login" : getCookie("login")
	};
	ajax.open("post", "../../core/get-like.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send(requestData(data));
	ajax.onload = function () {
		try {
			let data = JSON.parse(ajax.responseText);
			for (let i in data)
			{
				if (data[i]["amount"] === "0")
				{
					document.querySelector("#span-id" + data[i]["id_post"]).children[0].src = "../../../public/styles/style-images/like-0.png";
				}
				else
				{
					document.querySelector("#span-id" + data[i]["id_post"]).children[0].src = "../../../public/styles/style-images/like-1.png";
				}

			}
		}
		catch (e) {

		}
		finally {

		}
	}
}

function getNickname(nick) {
	return "@" + nick;
}

function getImage(post) {
	return "../posts/" + post;
}

function getComments(box, data) {
	let media, media_content, p;

	for (let i in data)
	{
		media = document.querySelector("div");
		media_content = document.querySelector("div");

		media.classList.add("media-content");
		media_content.classList.add("content");
		p = document.createElement("p");
		p.innerText = data[i]["comment"];
		box.appendChild(media);
	}
}

function uploadPosts(needle, id ,post)
{
	let xhttp = new XMLHttpRequest();
	needle["id_post"] = id;
	xhttp.open("post", "../../core/get-data.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(needle));

	xhttp.onload = function () {
		let data;
		if (needle["mode"] === 1)
		{
			try {
				data = JSON.parse(xhttp.responseText);
				if (data.length === 0)
				{
					document.querySelector("#body").style.display = "none";
				}
				for (let i in data)
				{
					createPost(data[i]["post"].match(/^.*_/)[0].slice(0, -1), data[i]["post"], data[i]["id_user"], data[i]["id_post"]);
				}
			}
			catch (e) {

			}
			finally {

			}
		}
		else if (needle["mode"] === 2)
		{
			try {
				data = JSON.parse(xhttp.responseText);
				createViewPost(data, post);
			}
			catch (e) {

			}
			finally {

			}
		}
	};

}

function addComment() {
	let comment = document.querySelector("#textarea").value;

	let data = {
		"id_post" : document.querySelector("#comment_button").dataset.id_post,
		"comment" : comment,
		"id_user" : document.querySelector("#comment_button").dataset.id_user,
		"login" : getCookie("login")
	};
	let xhttp = new XMLHttpRequest();
	xhttp.open("post", "../../core/new-comment.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(data));
}

function uploadPost() {
	let button;

	button = document.querySelector("#comment_button");
	button.dataset.id_post = this.dataset.id_post;
	button.dataset.img = this.dataset.img;
	button.dataset.id_user = this.dataset.id_user;
	document.querySelector("#comment_login").innerHTML = this.dataset.login;
	needle["mode"] = 2;
	document.querySelector("#post_comment").style.display = "";
	uploadPosts(needle,this.dataset.id_post,this.dataset.img);
}

function createViewPost(data, post) {
	let box, p_box, title, x, remove;

	remove = document.querySelector("#comments").children;
	if (data[0]["id_post"] === comn["curr"])
	{
		return 0;
	}
	else if (data[0]["id_post"] !== comn["curr"])
	{
		if (comn["first"])
		{
			console.log("remove");
			let p_com = document.querySelector("#comments");
			p_com.innerHTML = "<h5 class=\"title is-5\" style=\"color:black\">Comments</h5>"
		}

		comn["first"] = 1;
	}
	comn["curr"] = data[0]["id_post"];
	document.querySelector("#comment_img").src = post;
	p_box = document.querySelector("#comments");
	for (let i in data)
	{
		box = document.createElement("div");
		title = document.createElement("h6");
		box.classList.add("box");
		box.innerText = data[i]["comment"];
		title.classList.add("title");
		title.classList.add("is-6");
		title.style.color = "#000000";
		title.id = 'kek' + data[i]["id_comment"];
		p_box.appendChild(title);
		p_box.appendChild(box);
	}
	if (data.length)
	{
		let id = {};
		for (let i in data)
		{
			id[i] = data[i]["id_user"];
		}
		x = new XMLHttpRequest();
		x.open("post", "../../core/get-login.php", true);
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		x.send(requestData(id));
		x.onload = function ()
		{
			try {
				let logins = JSON.parse(x.responseText);
				for (let i in data)
				{
					document.querySelector("#kek" + data[i]["id_comment"]).innerHTML = "@" +logins[i];
				}
			}
			catch (e) {

			}
			finally {

			}
		};
	}
}

function createPost(nick, post, id, id_post) {
	let box, title, figure, img, span, i, button, img_2;

	box = document.createElement("box");
	title = document.createElement("h5");
	figure = document.createElement("figure");
	img = document.createElement("img");
	span = document.createElement("span");
	img_2 = document.createElement("img");
	button = document.createElement("button");

	box.classList.add("box");
	title.classList.add("title");
	title.classList.add("is-5");
	title.style.color = "#000000";
	title.innerText = getNickname(nick);
	figure.classList.add("image");
	figure.classList.add("is-square");
	button.classList.add("button");
	button.classList.add("is-info");
	button.innerHTML = "Comment";
	button.dataset.id_user = id;
	button.dataset.login = getNickname(nick);
	button.dataset.img = getImage(post);
	button.dataset.id_post = id_post;
	button.style.margin = "10px 10px 10px 0";
	button.onclick = uploadPost;
	span.classList.add("icon");
	span.appendChild(img_2);
	span.onclick = like;
	span.id = "span-id" + id_post;
	span.dataset.id_post = id_post;
	span.style.float = "right";
	span.style.margin = "10px 0 10px 10px";
	img_2.classList.add("image");
	img_2.classList.add("is-24x24");
	img_2.src = "../../../public/styles/style-images/like-0.png";
	box.appendChild(title);
	figure.appendChild(img);
	box.appendChild(figure);
	box.appendChild(button);
	box.appendChild(span);
	img.src = getImage(post);
	document.querySelector("#list").appendChild(box);
}
