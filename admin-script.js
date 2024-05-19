document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch orders from database
    function fetchOrders() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_orders.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var orders = JSON.parse(xhr.responseText);
                var tableBody = document.getElementById('orders-list');
                tableBody.innerHTML = '';
                orders.forEach(function(order) {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${order.id}</td>
                        <td>${order.name}</td>
                        <td>${order.email}</td>
                        <td>${order.telephone}</td>
                        <td>${order.order_name}</td>
                        <td>${order.date}</td>
                    `;
                    tableBody.appendChild(row);
                });
            }
        };
        xhr.send();
    }

    // Fetch orders on page load
    fetchOrders();
});