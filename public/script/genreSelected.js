let option = document.querySelectorAll('option');

for (let i = 0; i < option.length; i++) {
    option[i].addEventListener('click', () => {
        if (option[i].hasAttribute('selected')) {
            option[i].removeAttribute('selected');
            option[i].removeAttribute('required');
        }
        else {
            option[i].setAttribute('selected', 'selected');
            option[i].setAttribute('required', 'required');
        }
    });

}