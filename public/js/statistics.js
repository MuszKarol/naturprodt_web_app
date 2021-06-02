const likeButton = document.querySelectorAll(".fa-heart");
const dislikeButton = document.querySelectorAll(".fa-minus-square");

function increment() {
    const element = this;
    const container = element.parentElement.parentElement.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    const like_class = document.querySelector(".fa-heart").getAttribute("class");
    let input;

    console.log(this.getAttribute("class"))
    if(this.getAttribute("class") === like_class)
        input = `/like/${id}`;

    else
        input = `/dislike/${id}`;

    fetch(input)
        .then(function (){
            element.innerHTML = parseInt(element.innerHTML) + 1;
        })
}


likeButton.forEach(button => button.addEventListener("click", increment));
dislikeButton.forEach(button => button.addEventListener("click", increment));