const search= document.querySelector('input[placeholder="search products"]')
const productContainer= document.querySelector(".products__container")


search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchProducts", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(response);
            return response.json();
        }).then(function (products){
            productContainer.innerHTML = "";
            loadProducts(products);
        });
    }
});


function loadProducts(products) {
    products.forEach(product => {
        console.log(product);
        createProduct(product);
    })
}

function createProduct(product) {
    const template = document.querySelector("#product-template");

    const clone = template.content.cloneNode(true);

    const div = clone.querySelector("div");
    div.id = product.id;

    const image = clone.querySelector("img");
    image.src = `public/uploads/${product.image_title}`;

    const title = clone.querySelector("h2");
    title.innerHTML = product.title;

    const description = clone.querySelector("p");
    description.innerHTML = product.description;

    const like = clone.querySelector(".fa-heart");
    like.innerText = product.likes;

    const dislike = clone.querySelector(".fa-minus-square");
    dislike.innerText = product.dislikes;

    const link = clone.querySelector("#shop")
    link.addEventListener('click', function() {
        window.open(product.link)
    }, false);

    productContainer.appendChild(clone);
}