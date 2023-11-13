let currentIndex = 0;
const slides = document.querySelectorAll('.slider img');
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
}

setInterval(nextSlide, 3000);

showSlide(currentIndex);

/////////////////////////////////////////


let currentIndex2 = 0;
const temoignages = document.querySelectorAll('.temoignage');

function showTemoignage(index) {
    temoignages.forEach((temoignage, i) => {
    temoignage.style.display = i === index ? 'block' : 'none';
    });
}

function prevTemoignage() {
    currentIndex2 = (currentIndex2 - 1 + temoignages.length) % temoignages.length;
    showTemoignage(currentIndex2);
}

function nextTemoignage() {
    currentIndex2 = (currentIndex2 + 1 ) % temoignages.length;
    showTemoignage(currentIndex2);
}

showTemoignage(currentIndex2);
    
///////////////////////////////////////

function showPassword() {
    var passwordField = document.getElementById("password");
    var checkBox = document.getElementById("ShowPassword");

    if (checkBox.checked) {
      passwordField.type = "text";
    } 
    else{
      passwordField.type = "password";
    }
}
function showPassword2() {
    var passwordField = document.getElementById("password2");
    var checkBox = document.getElementById("ShowPassword2");

    if (checkBox.checked) {
      passwordField.type = "text";
    } 
    else{
      passwordField.type = "password";
    }
}