let label = document.querySelectorAll('.register label');
let input = document.querySelectorAll('.input');

for (let i = 0; i < input.length; i++) {
    input[i].addEventListener("focus", () => {
        label[i].classList.add('floatingLabel');
        label[i].classList.add('fontColor');
    })

    input[i].addEventListener("blur", () => {
        label[i].classList.remove('fontColor');
    })
}


let labelLogin = document.querySelectorAll('.login label');

for (let i = 0; i < input.length; i++) {
    input[i].addEventListener("focus", () => {
        labelLogin[i].classList.add('floatingLabel');
        labelLogin[i].classList.add('fontColor');
    })

    input[i].addEventListener("blur", () => {
        labelLogin[i].classList.remove('fontColor');
    })
}