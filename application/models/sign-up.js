function validate(form) {
    let fail = "";
    fail += validateUsername(form.login.value);
    fail += validatePassword(form.pass.value);
    fail += validateEmail(form.email.value);
    if (fail === "") {
        return true;
    }
    alert(fail);
    return false;
}

function validateUsername(login) {
    if (login === "") {
        return "Please input login.\n";
    }
    return "";
}

function validatePassword(field) {
    if (field === "") {
        return "Please input password.\n"
    } else if (field.length < 6) {
        return "The password has to contain at least 6 numbers.\n";
    } else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) ||
        !/[0-9]/.test(field)) {
        return "The password has to contain include at least one symbol from the set | {a-z} | A-Z | 0-9.\n"
    }
    return "";
}

function validateEmail(field) {
    if (field === "") {
        return "Please input email.\n";
    }
    else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)){
        return "Email has a wrong format.\n"
    }
    return "";
}