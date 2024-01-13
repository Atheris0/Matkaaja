const userCardTemplate = document.querySelector('[data-user-template]')
const userCardContainer = document.querySelector('[data-user-cards-container]')
const searchForm = document.getElementById('searchForm');
const searchInput = document.querySelector('[data-search]');

let users = [];

function performSearch() {
    const value = searchInput.value.toLowerCase();
    console.log('Search Value:', value);

    users.forEach(user => {
        const isVisible = user.text.toLowerCase().includes(value);

        if (isVisible) {
            user.element.classList.remove("hide");
        } else {
            user.element.classList.add("hide");
        }
    });
}

// Event listener of the form for submit event
searchForm.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission behavior
    performSearch();
});

// Fetching the data from jsonplaceholder
fetch('https://jsonplaceholder.typicode.com/albums/1/photos')
    .then(response => response.json())
    .then(data => {
        // Mapping the data for the search bar
        users = data.map(user => {
            const card = userCardTemplate.content.cloneNode(true).children[0];
            const header = card.querySelector('[data-header]');
            header.textContent = user.title;
            const imageUrl = card.querySelector('[data-image-url]');
            imageUrl.src = user.url;
            userCardContainer.append(card);
            return { image: user.url, text: user.title, element: card };
        });
    })
    .catch(error => console.error('Error fetching data:', error));
