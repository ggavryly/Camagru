function ajax (url,method,dataArray) {
    let xhttp = new XMLHttpRequest();
    xhttp.open(method, url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dataArray);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
        {
            let data = JSON.parse(this.responseText);
            document.querySelector("#login").value = "Your current login: " + data["login"];
            document.querySelector("#email").value = "Your current email: " + data["email"];
            if (data["notification"] === "1")
            {
                document.querySelector("#notifications").value = "Notification: On";
            }
            else
            {
                document.querySelector("#notifications").value = "Notification: Off";
            }
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

function editNotification() {
    let http = new XMLHttpRequest();
    data["id_user"] = getCookie("id_user");
    data["login"] = getCookie("login");
    http.open("post", "../../core/edit-notification.php", true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(requestData(data));
    getCurrData();
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
        let now = new Date();
        now.setMonth( now.getMonth() + 1 );
        data["new_login"] = new_login;
        data["mode"] = "login";
        data["id_user"] = getCookie("id_user");
        data["login"] = getCookie("login");
        let options = {
            "expires" : 2629743
        };
        setCookie("login", new_login, options);
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
        data["id_user"] = getCookie("id_user");
        data["login"] = getCookie("login");
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
        data["id_user"] = getCookie("id_user");
        data["login"] = getCookie("login");
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
    let data = {
        "id_user" : getCookie("id_user"),
        "login" : getCookie("login")
    };
    ajax("../../core/current-data.php" ,"post", requestData(data));
}
