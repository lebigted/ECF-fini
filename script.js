// JavaScript pour afficher/masquer les détails des services
document.addEventListener('DOMContentLoaded', function () {
    const serviceLinks = document.querySelectorAll('.service-link');

    serviceLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const serviceDetails = document.querySelector(this.getAttribute('href'));

            // Toggle visibility
            if (serviceDetails.classList.contains('hidden')) {
                serviceDetails.classList.remove('hidden');
                serviceDetails.style.display = 'block';
            } else {
                serviceDetails.classList.add('hidden');
                serviceDetails.style.display = 'none';
            }
        });
    });
});
