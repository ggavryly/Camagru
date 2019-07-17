let rules = document.querySelector(".read-rules");
rules.onclick = function () {
	document.querySelector(".form-slider").style.marginLeft = '-250px';
};

let back = document.querySelector(".read-rules-back");
back.onclick = function () {
	document.querySelector(".form-slider").style.marginLeft = '0';
};
