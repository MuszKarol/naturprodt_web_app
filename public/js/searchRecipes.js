const search= document.querySelector('input[placeholder="search products"]')
const recipesContainer= document.querySelector(".recipes__container")


search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchRecipes", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(response);
            return response.json();
        }).then(function (recipes){
            recipesContainer.innerHTML = "";
            loadRecipes(recipes);
        });
    }
});

function loadRecipes(recipes) {
    recipes.forEach(recipe => {
        console.log(recipe);
        createRecipe(recipe);
    })
}

function createRecipe(recipe) {
    const template = document.querySelector("#recipe-template");

    const clone = template.content.cloneNode(true);

    const div = clone.querySelector("div");
    div.id = recipe.id;

    const image = clone.querySelector("div>img");
    image.src = `public/uploads/${recipe.image_title}`;

    const title = clone.querySelector(".recipe__overview>h2");
    title.innerText = recipe.title;

    const description = clone.querySelector(".recipe__overview.text>p");
    description.innerText = recipe.content;

    recipesContainer.appendChild(clone);
}