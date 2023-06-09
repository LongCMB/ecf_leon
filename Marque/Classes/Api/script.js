
let url = 'http://http://localhost:8080/marques/api';//le lien pour APIm pour le moment, je sais pas on le met où

fetch(url)
    .then(response => response.json())
    .then(data => {

        const container = document.getElementById('brandContainer');


        container.innerHTML = '';


        data.forEach(brand => {
            const brandElement = document.createElement('div');
            brandElement.innerText = brand.marque;

            container.appendChild(brandElement);
        });
    })
    .catch(error => {
        console.log('An error occurred while fetching the brands:', error);
    });
