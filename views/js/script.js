let loginBox = document.getElementById("loginBox");
let registerBox = document.getElementById("registerBox");


loginBox.style.display = "block";
registerBox.style.display = "none";

function showRegister() {
    loginBox.style.display = "none";
    registerBox.style.display = "block";
}

function showLogin() {
    registerBox.style.display = "none";
    loginBox.style.display = "block";
}
