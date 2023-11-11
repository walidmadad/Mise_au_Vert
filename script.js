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




let currentIndex2 = 0;
const temoignages = document.querySelectorAll('.temoignage');

function showTemoignage(index) {
            temoignages.forEach((temoignage, i) => {
                temoignage.style.display = i === index ? 'block' : 'none';
            });
        }

        function prevTemoignage() {
            currentIndex = (currentIndex - 1 + temoignages.length) % temoignages.length;
            showTemoignage(currentIndex);
        }

        function nextTemoignage() {
            currentIndex = (currentIndex + 1) % temoignages.length;
            showTemoignage(currentIndex);
        }

        // Afficher le premier témoignage au chargement de la page
        showTemoignage(currentIndex);
    
