let epingle = document.querySelectorAll('.epingle');
let icon = document.querySelectorAll('.epingle i');

for (let i = 0; i < epingle.length; i++) {
    epingle[i].addEventListener("click", () => {
        epingle[i].classList.toggle('actif');
        icon[i].classList.toggle('fas');
        icon[i].classList.toggle('far');
    });
}