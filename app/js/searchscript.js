const userCardTemplate = document.querySelector('[data-user-template]')
const userCardContainer = document.querySelector('[data-user-cards-container]')
const searchInput = document.querySelector('[data-search]')

searchInput.addEventListener('input', )


fetch('https://jsonplaceholder.typicode.com/albums/1/photos')
    .then(response => response.json())
    .then(data => {
        data.forEach(user => {
            const card = userCardTemplate.content.cloneNode(true).children[0]
            const header = card.querySelector('[data-header]')
            //const body = card.querySelector('[data-body]')
            header.textContent = user.title
            const imageUrl = card.querySelector('[data-image-url]')
            imageUrl.src = user.url
            userCardContainer.append(card)
        })
    })
.catch(error => console.error('Error fetching data:', error));