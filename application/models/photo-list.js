function ajax (url,method,functionName, dataArray) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("1", "../../", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dataArray);

    xhttp.onload = function () {
        let response = JSON.parse(xhttp.responseText);
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

function like() {
}

function getNickname() {
    let t;
    return "@" + "gena123";
}

function getImage() {
    return "../../../public/styles/style-images/no-photo.png"
}

function getComments() {

}

console.log("kek");
createPost();
function createPost() {
    let box, title, figure, img, span, i, button;

    box = document.createElement("box");
    title = document.createElement("h5");
    figure = document.createElement("figure");
    img = document.createElement("img");
    span = document.createElement("span");
    i = document.createElement("i");
    button = document.createElement("button");

    box.classList.add("box");
    title.classList.add("title");
    title.classList.add("is-5");
    title.style.color = "#000000";
    title.innerText = getNickname();
    figure.classList.add("image");
    figure.classList.add("is-square");
    button.classList.add("button");
    button.classList.add("is-info");
    button.innerHTML = "Comment";
    span.classList.add("icon");
    span.appendChild(i);
    span.onclick = onclick = like;
    span.style.float = "right";
    i.classList.add("far");
    i.classList.add("fa-heart");
    box.appendChild(title);
    figure.appendChild(img);
    box.appendChild(figure);
    box.appendChild(button);
    box.appendChild(span);
    title.innerHTML = getNickname();
    img.src = getImage();
    document.querySelector("#list").appendChild(box);
}
