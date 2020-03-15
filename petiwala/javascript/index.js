function toggleMenu() {
    var visibility = document.getElementsByClassName("menu")[0].style.visibility;
    var menu = document.getElementsByClassName("menu")[0];
    if (visibility == "hidden" ) {
        menu.style.visibility = "visible";
        menu.style.width = "100%";
    }
}

function closeMenu() {
    var visibility = document.getElementsByClassName("menu")[0].style.visibility;
    var menu = document.getElementsByClassName("menu")[0];
    if (visibility == "visible" ) {
        menu.style.visibility = "hidden";
        menu.style.width = "0%";
    }
}

function openCallbackModal() {
    let display = document.getElementById("callback").style.display;
    let modal = document.getElementById("callback");
    if (display == "none") {
        modal.style.width = "100%";
        modal.style.height = "100%";
        modal.style.display = "block";
    }
}

function closeCallbackModal() {
    let display = document.getElementById("callback").style.display;
    let modal = document.getElementById("callback");
    if (display == "block") {
        modal.style.width = "0%";
        modal.style.height = "0%";
        modal.style.display = "none";
    }
}

if (window.innerWidth <= 1275) {
    document.getElementsByClassName("menu")[0].style.visibility = "hidden";
    document.getElementsByClassName("menu")[0].style.width = "0px";
}

document.getElementById("callback").style.display = "none";