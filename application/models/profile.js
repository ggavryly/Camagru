function ajax (url,method,dataArray) {
    let xhttp = new XMLHttpRequest();
    xhttp.open(method, url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dataArray);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
        {
            let data = JSON.parse(this.responseText);
            document.querySelector("#cur_log").innerHTML = "Your current login: " + data["login"];
            document.querySelector("#cur_em").innerHTML = "Your current email: " + data["email"];
        }
    };
}

let data = {
    "mode" : "0",
    "login": "",
    "pass": "",
    "email": ""
};

getCurrData();

function requestData(dataArr) {
    let i = "";
    for (let key in dataArr)
    {
        i += `${key}=${dataArr[key]}&`;
    }
    return i;
}

function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function editLogin() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../../core/edit-user-data.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let new_login = prompt("Please enter new login");
    if (new_login)
    {
        data["login"] = new_login;
        data["mode"] = "login";
        xhttp.send(requestData(data));
        xhttp.onload = function ()
        {
            getCurrData();
        };
    }
    else
    {
        alert("Please enter valid login");
    }
}

function editPass() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../../core/edit-user-data.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let new_pass = window.prompt("Please enter new password");
    if (new_pass)
    {
        data["pass"] = new_pass;
        data["mode"] = "pass";
        xhttp.send(requestData(data));
        xhttp.onload = function ()
        {
            getCurrData();
        };
    }
    else
    {
        alert("Please enter valid pass");
    }
}

function editEmail() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../../core/edit-user-data.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let new_email = prompt("Please enter new email");
    if (new_email && validateEmail(new_email))
    {
        data["email"] = new_email;
        data["mode"] = "email";
        xhttp.send(requestData(data));
        xhttp.onload = function ()
        {
            getCurrData();
        };
    }
    else
    {
        alert("Please enter valid email");
    }
}

function getCurrData() {
    ajax("../../core/current-data.php" ,"post", "1=1");
}