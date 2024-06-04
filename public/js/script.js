const initSlider = () => {
    const imageList = document.querySelector(".slider .image-list");
    const slideButtons = document.querySelectorAll(".slider .slide-button");
    const sliderScrollbar = document.querySelector(".content .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;

        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }

        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id == "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientHeight * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
    }

    const updateScrollThumbsPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }


    imageList.addEventListener("scroll", () => {
        handleSlideButtons();
        updateScrollThumbsPosition();
    });
}

window.addEventListener("load", initSlider);

let subMenu = document.getElementById("subMenu");

function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}

document.addEventListener('DOMContentLoaded', function () {
    var dateInput = document.getElementById('dateInput');
    var timeInput = document.getElementById('timeInput');

    dateInput.addEventListener('blur', function () {
        if (!this.value) {
            this.type = 'text';
        }
    });

    timeInput.addEventListener('blur', function () {
        if (!this.value) {
            this.type = 'text';
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var guest = document.getElementById('masih_guest');
    var customAlert = document.getElementById('customAlert');
    var customAlertButton = document.getElementById('customAlertButton');

    guest.addEventListener('click', function (event) {
        event.preventDefault();
        customAlert.style.display = 'flex';
    });

    customAlertButton.addEventListener('click', function () {
        customAlert.style.display = 'none';
        window.location.href = guest.href;
    });
});

window.addEventListener('scroll', function () {
    var sections = document.querySelectorAll('section');
    var links = document.querySelectorAll('.navigation>li>a');
    var currentSection = 'beranda';

    sections.forEach(function (section) {
        var rect = section.getBoundingClientRect();
        var link = document.querySelector('a[href="#' + section.id + '"]');
        if (rect.top >= 0 && rect.top <= window.innerHeight / 2) {
            currentSection = section.id;
        }
    });

    links.forEach(function (link) {
        if (link.getAttribute('href') === '#' + currentSection) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    if (window.scrollY === 0) {
        document.getElementById('link-beranda').classList.add('active');
    }
});

window.dispatchEvent(new Event('scroll'));

const sidebar = document.querySelector('.navigation-mobile');

document.querySelector('#hamburger').onclick = () => {
    sidebar.classList.toggle('active');
};
