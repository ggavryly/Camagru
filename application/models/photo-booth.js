let video, canvas, context, imgCheck, meme;


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

function movePicture() {

}

function editPicture() {
	let select, meme;
	// if (imgCheck && document.querySelector("#checkbox").checked)
	// {
		meme = document.createElement("img");
		meme.src = "../public/images/" + select.options[select.selectedIndex].value + ".png";
		document.querySelector("");
		select = document.querySelector(".option");
	// }
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
	xhttp.send("img=" + image.src);
	xhttp.onload = function () {

	}
}