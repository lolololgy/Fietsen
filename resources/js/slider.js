let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const sliderWrapper = document.querySelector('.slider-wrapper');
const totalSlides = slides.length;

const slideOrder = [0, 1, 2];

function updateSlider(index) {
    currentIndex = index;
    sliderWrapper.style.transition = "transform 1s ease-in-out";
    sliderWrapper.style.transform = `translateX(-${slideOrder[index] * 100}%)`;

    dots.forEach(dot => dot.classList.remove('active'));
    dots[slideOrder[index]].classList.add('active');
}

function goToSlide(index) {
    clearInterval(autoSlide);
    updateSlider(index);
    startAutoSlide();
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slideOrder.length;
    updateSlider(currentIndex);
}

let autoSlide = setInterval(nextSlide, 5000);

function startAutoSlide() {
    clearInterval(autoSlide);
    autoSlide = setInterval(nextSlide, 5000);
}

startAutoSlide();