let lastScrollTop = 0;

// Function to toggle header visibility based on scroll direction
function toggleHeader() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Scroll down
        document.getElementById("main-header").classList.add("hide-header");
    } else {
        // Scroll up
        document.getElementById("main-header").classList.remove("hide-header");
    }

    lastScrollTop = currentScroll;
}

// Event listener for scroll
window.addEventListener("scroll", toggleHeader);
