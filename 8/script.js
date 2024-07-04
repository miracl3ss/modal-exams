let currentImage = 0;
const images = [
    "htrdbsgcbg.jfif",
    "xasxgsqx.jfif",
    "zqezdzq.jfif",
    "htrdbsgcbg.jfif",
    "xasxgsqx.jfif",
    "zqezdzq.jfif",

    // Добавьте больше изображений
];

const thumbnails = document.querySelectorAll(".thumbnail");
const mainImage = document.querySelector(".main-image");
const prevButton = document.querySelector(".prev");
const nextButton = document.querySelector(".next");

thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener("click", () => {
        currentImage = index;
        updateMainImage();
    });
});

prevButton.addEventListener("click", () => {
    currentImage--;
    if (currentImage < 0) {
        currentImage = images.length - 1;
    }
    updateMainImage();
});

nextButton.addEventListener("click", () => {
    currentImage++;
    if (currentImage >= images.length) {
        currentImage = 0;
    }
    updateMainImage();
});

function updateMainImage() {
    mainImage.src = images[currentImage];
}

updateMainImage();