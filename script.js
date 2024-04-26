// JavaScript untuk mode gelap dan mode terang
const modeToggle = document.querySelector('.mode-toggle');
const body = document.body;

modeToggle.addEventListener('click', function() {
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});

// Cek tema yang disimpan di local storage saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        body.classList.add('dark-mode');
    }
});
