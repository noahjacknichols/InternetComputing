function hover(img) {
    document.getElementById(img).style.transform = "scale(1.2, 1.2)";
}

function unhover(img) {
    document.getElementById(img).style.transform = "scale(1,1)";
}

function submission() {

}

const s = document.getElementById("submit");
s.addEventListener("click", submission, false);