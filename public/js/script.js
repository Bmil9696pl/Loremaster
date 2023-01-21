const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function martValidation(element, condition){
    !condition ? element.classList.add('-no-valid') : element.classList.remove('-no-valid');
}

emailInput.addEventListener('keyup', function (){
    function markValidation(element, condition) {
        console.log(condition);
        !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
    }

    setTimeout(function (){
            console.log("dupa");
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
})