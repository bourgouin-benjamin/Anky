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