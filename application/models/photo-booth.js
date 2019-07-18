let video, canvas, context, imgCheck, overlay;

overlay =  {
	"batyka" : 		0,
	"doge" : 		0,
	"pepe" : 		0,
	"thug-life" : 	0,
	"ukraine" : 	0,
	"number" : 		0
};


imgCheck = 0;
video = document.querySelector(".Left_video");
button = document.querySelector(".Button_camera");
navigator.getMedia = ( navigator.getUserMedia ||
	navigator.webkitGetUserMedia ||
	navigator.mozGetUserMedia ||
	navigator.msGetUserMedia);

navigator.getMedia(
	{
		video: true,
		audio: false
	},
	function(stream) {
		if (navigator.mozGetUserMedia) {
			video.mozSrcObject = stream;
		} else {
			video.srcObject = stream;
		}
		video.play();
	},
	function(err) {
		console.log("error");
	});

function modeChange() {
	let camera, button, edit;
	camera = document.querySelector(".Left_video");
	button = document.querySelector(".Button_camera");
	edit = document.querySelector(".Left_edit");
	if (document.querySelector("#checkbox").checked)
	{
		document.querySelector(".camera").removeChild(button);
		camera.classList.add("hide");
		edit.classList.remove("hide");
		button = document.createElement("button");
		button.classList.add("Button_camera");
		button.innerHTML = "Upload photo";
		button.onclick = uploadPhoto;
		document.querySelector(".camera").appendChild(button);
	}
	else
	{
		edit.classList.add("hide");
		camera.classList.remove("hide");
		button.innerHTML = "Snap photo";
		button.onclick = makePicture;
	}
}

function requestData(dataArr) {
	let i = "";
	for (let key in dataArr)
	{
		i += `${key}=${dataArr[key]}&`;
	}
	return i;
}

function makePicture() {
	let picture;
	if (!document.querySelector("#checkbox").checked && navigator.mediaDevices && navigator.mediaDevices.getUserMedia )
	{
		picture = document.createElement("canvas");
		picture.classList.add("picture");
		picture.onclick = selectPicture;
		document.querySelector(".photos").appendChild(picture);
		context = picture.getContext("2d");
		video = document.querySelector(".Left_video");
		context.drawImage(video ,0,0,800,620,0,0,377,250);
	}
	else
	{

	}
}

function convertImageToCanvas(image) {
	let canvas = document.createElement("canvas");
	canvas.width = 800 + "px";
	canvas.height = 620 + "px";
	canvas.getContext("2d").drawImage(image, 0, 0);

	return canvas;
}

function convertCanvasToImage(canvas) {
	let image = new Image(800,600);
	image.src = canvas.toDataURL("image/png");
	return image;
}

function selectPicture() {
	let edit, context;
	if (document.querySelector("#checkbox").checked)
	{
		imgCheck = 1;
		edit = document.querySelector(".Left_edit");
		context = edit.getContext("2d");
		context.drawImage(this,0,0 ,800,600,0,0,800,600);
	}
}

function editPicture() {
	let select, meme, edit;
	select = document.querySelector(".option");
	if (imgCheck && document.querySelector("#checkbox").checked && !overlay[select.options[select.selectedIndex].value]) {
		edit = document.querySelector("#upload_image");
		meme = document.createElement("img");
		meme.classList.add(select.options[select.selectedIndex].value);
		meme.src = "../../../public/images/" + select.options[select.selectedIndex].value + ".png";
		edit.appendChild(meme);
		overlay["number"]++;
		overlay[select.options[select.selectedIndex].value] = 1;
		console.log(overlay);
	}
	return true;
}

function uploadPhoto() {
	let edit, image, xhttp;
	edit = document.querySelector(".Left_edit");
	if (imgCheck)
	{
		image = convertCanvasToImage(edit);
	}
	else
	{
		alert("Please select picture");
		return;
	}
	xhttp = new XMLHttpRequest();
	xhttp.open("post", "../../core/new-post.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("img=" + image.src + "&" + requestData(overlay));
	xhttp.onload = function () {

	}
}