// Fungsi untuk menu aktif
var url = window.location.href.split('?')[0];

var menu_items = document.getElementsByClassName("menu-item");
for (let i = 0; i < menu_items.length; i++) {
    let link = menu_items[i].children[0].href;
    if (link == url) {
        menu_items[i].classList.add("menu-active");
    }
}

// Fungsi untuk mengubah saiz teks
function ubahSaizFont(saiz) {
    txt = document.getElementsByClassName("teks");
    for (let i = 0; i < txt.length; i++) {
        style = window.getComputedStyle(txt[i], null).getPropertyValue("font-size");
        saizSekarang = parseFloat(style);
        txt[i].style.fontSize = (saizSekarang + saiz) + 'px';
    }
}


var currentSlide = 0; // Start at the first slide
var slides = document.querySelectorAll('#activity-slides .slide'); // Select all slides

function showSlide(index) {
    // Check for out of bounds and wrap the index if necessary
    if (index >= slides.length) index = 0; // Wrap to the first slide
    if (index < 0) index = slides.length - 1; // Wrap to the last slide

    // Hide all slides
    slides.forEach(slide => slide.style.display = 'none');

    // Show only the active slide
    slides[index].style.display = 'block';
    currentSlide = index; // Update the current slide index
}

function changeSlide(step) {
    showSlide(currentSlide + step); // Calculate the new slide index
}

document.getElementById('next-btn').addEventListener('click', function() {
    changeSlide(1); // Move to the next slide
});

document.getElementById('prev-btn').addEventListener('click', function() {
    changeSlide(-1); // Move to the previous slide
});

// Initialize the slideshow by showing the first slide
showSlide(currentSlide);