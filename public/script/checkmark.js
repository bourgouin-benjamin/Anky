let check = document.querySelector('.check');
let checkmark = document.querySelector('.checkmark');
let i = document.querySelector('.checkmark i');

check.addEventListener('click', () => {
    checkmark.classList.toggle('isChecked');
    i.classList.toggle('isChecked');
});