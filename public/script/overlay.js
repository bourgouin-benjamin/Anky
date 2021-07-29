let publiBlocked = document.querySelectorAll('.publication.blocked');
let filtre = document.querySelectorAll('.filtre');

for (let i = 0; i < publiBlocked.length; i++) {
    publiBlocked[i].addEventListener('click', () => {
        publiBlocked[i].removeChild(filtre[i]);
        publiBlocked[i].classList.remove('blocked');
    });
}