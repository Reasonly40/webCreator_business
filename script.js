let lastScrollTop = 0;

function toggleHeader() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        document.getElementById("main-header").classList.add("hide-header");
    } else {
        document.getElementById("main-header").classList.remove("hide-header");
    }

    lastScrollTop = currentScroll;
}

function submitForm(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);

    document.getElementById('spinner').style.display = 'block';

    fetch('process-order.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('spinner').style.display = 'none';
        document.getElementById('confirmation').style.display = 'block';
        form.reset();
        setTimeout(() => {
            document.getElementById('confirmation').style.display = 'none';
        }, 3000);
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('spinner').style.display = 'none';
        alert('Failed to submit the order. Please try again.');
    });
}

window.addEventListener("scroll", toggleHeader);
document.getElementById('order-form').addEventListener('submit', submitForm);
