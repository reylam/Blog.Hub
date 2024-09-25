document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".carousel");
    const slides = document.querySelectorAll(".carousel-item");
    const dots = document.querySelectorAll(".dot");
    const totalSlides = slides.length;
    let currentIndex = 0;

    function updateDots() {
        dots.forEach((dot) => {
            dot.classList.add("bg-transparent", "border-gray-300");
            dot.classList.remove("bg-white");
        });
        dots[currentIndex].classList.remove(
            "bg-transparent",
            "border-gray-300"
        ); // Remove default styles
        dots[currentIndex].classList.add("bg-white");
    }

    function moveToNextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        updateDots();
    }

    setInterval(moveToNextSlide, 5000);

    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            currentIndex = index;
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            updateDots();
        });
    });

    updateDots();

    const container = document.getElementById("category-container");
    const nextBtn = document.getElementById("next-btn");

    nextBtn.addEventListener("click", () => {
        // Cek apakah sudah di akhir scroll
        const maxScrollLeft = container.scrollWidth - container.clientWidth;

        if (container.scrollLeft >= maxScrollLeft) {
            // Kembali ke awal
            container.scrollTo({ left: 0, behavior: "smooth" });
        } else {
            // Scroll ke kanan
            container.scrollBy({ left: 200, behavior: "smooth" });
        }
    });
});


