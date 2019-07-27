function ajax (url,method,functionName, dataArray) {
    let xhttp = new XMLHttpRequest();
    xhttp.open(method, url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dataArray);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
        {
            functionName(this);
        }
    };
}

function requestData(dataArr) {
    let i = "";
    for (let key in dataArr)
    {
        i += `${key}=${dataArr[key]}&`;
    }
    return i;
}
