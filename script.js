function applyFilters() {
    // Get filter values
    const searchQuery = document.getElementById('search-bar').value.toLowerCase();
    const sizeFilter = document.getElementById('filter-size').value;

    // Get all listings
    const listings = document.querySelectorAll('.listing');

    listings.forEach(listing => {
        const title = listing.querySelector('h3').innerText.toLowerCase();
        const size = listing.querySelector('.size').innerText;

        // Apply filters
        if (title.includes(searchQuery) && (!sizeFilter || size.includes(sizeFilter))) {
            listing.style.display = 'block';
        } else {
            listing.style.display = 'none';
        }
    });
}

// Function to load sails from database (pseudo-code)
// This should be replaced with actual AJAX code
function loadSails() {
    // Fetch sails from the server and populate listings
}

document.addEventListener('DOMContentLoaded', loadSails);
