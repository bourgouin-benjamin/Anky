let icon = document.querySelectorAll('.publi-footer i');

for (let i = 0; i < icon.length; i++) {
    icon[i].addEventListener('click', () => {
        icon[i].classList.toggle('far');
        icon[i].classList.toggle('fas');
        icon[i].classList.toggle('actif');
    });
}