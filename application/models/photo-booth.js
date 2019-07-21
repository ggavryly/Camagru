let video, canvas, context, imgCheck, overlay;

overlay =  {
	"batyka" : 		0,
	"doge" : 		0,
	"pepe" : 		0,
	"thug-life" : 	0,
	"ukraine" : 	0,
};

imgCheck = 0;
video = document.querySelector("#video");
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

function requestData(dataArr) {
	let i = "";
	for (let key in dataArr)
	{
		i += `${key}=${dataArr[key]}&`;
	}
	return i;
}

function getOverlay(overlay, picture,context ,width, height) {
	for (let key in overlay)
	{
		if (overlay[key])
		{
			let image = new Image(64,64);
			image.src = "../../../public/images/" + key + ".png";
			image.value = key;
			image.onload = function (){
				if (this.value === "batyka")
				{
					context.drawImage(image, 0, 0, width * 2, height * 2, width / 1.5, height / 1.5, width, height);
				}
				else if (this.value === "doge")
				{
					context.drawImage(image, 0, 0, width * 3, height * 3, width / 1.5, height / 6, width, height);
				}
				else if (this.value === "pepe")
				{
					context.drawImage(image, 0, 0, width * 6, height * 6, width / 6, height / 6, width, height);
				}
				else if (this.value === "thug-life")
				{
					context.drawImage(image, 0, 0, width * 8, height * 8, width / 4, height / 3.5, width, height);
				}
				else if (this.value === "ukraine")
				{
					context.drawImage(image, 0, 0, width * 3, height * 3, width / 6, height / 1.75, width, height);
				}
				document.querySelector("#photo").src = convertCanvasToImage(picture, width, height).src;
			};
		}
		document.querySelector("#photo").src = convertCanvasToImage(picture, width, height).src;
	}
}

function makePicture() {
	let picture, width, height;
	width = document.querySelector("#video").getBoundingClientRect().width;
	height = document.querySelector("#video").getBoundingClientRect().height;
	if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
	{
		picture = document.createElement("canvas");
		picture.width = width;
		picture.height = height;
		picture.onclick = selectPicture;
		context = picture.getContext("2d");
		video = document.querySelector("#video");
		context.drawImage(video ,0,0,width,height);
		getOverlay(overlay, picture, context, width, height);
		imgCheck = 1;
	}
	else
	{

	}
}

function convertCanvasToImage(canvas, w, h) {
	let image = new Image(w,h);
	image.src = canvas.toDataURL("image/png");
	return image;
}

function selectPicture() {
	console.log("kek");
}

function selectOverlay(img_name, top, left) {
	let edit, img;
	if (!overlay[img_name])
	{
		console.log("kek");
		img = document.createElement("img");
		img.src = "../../../public/images/" + img_name + ".png";
		img.classList.add("overlay");
		img.style.top = top + "%";
		img.style.left = left + "%";
		img.onclick = deleteOverlay;
		img.value = img_name;
		edit = document.querySelector("#box_video");
		edit.appendChild(img);
		overlay[img_name] = 1;
	}
}

function deleteOverlay() {
	this.remove();
	overlay[this.value] = 0;
}

function uploadPhoto() {
	let xhttp, data, width, height, image;

	if (imgCheck)
	{
		image = document.querySelector("#photo");
		width = image.getBoundingClientRect().width;
		height = image.getBoundingClientRect().height;
		data = {
			"width" : Math.round(width),
			"height" : Math.round(height)
		};
		xhttp = new XMLHttpRequest();
		xhttp.open("post", "../../core/new-post.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("img=" + image.src + "&" + requestData(data));
		xhttp.onload = function () {
			console.log("YRA");
		}
	}

}