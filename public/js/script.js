const form = document.getElementById('form');
const emailInput = document.getElementById('email');
const PasswordInput = document.getElementById('pass');
const confirmedPasswordInput = document.getElementById('confirm_pass');


function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout( function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000);
}

function validatePassword() {
    setTimeout( function () {
            const condition = arePasswordSame(
                confirmedPasswordInput.value,
                PasswordInput.value
            )
            markValidation(confirmedPasswordInput, condition);
        },
        1000);
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);