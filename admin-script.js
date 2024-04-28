document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mendapatkan daftar pemesanan dari local storage
    function getOrders() {
        return JSON.parse(localStorage.getItem('orders')) || [];
    }
});


