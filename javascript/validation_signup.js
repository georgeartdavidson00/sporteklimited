const register_form = document.querySelector("#register_form");
const password1 = document.querySelector("#password1");
const password2 = document.querySelector("#password2");

var mailformat = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
 // Email validation 
register_form.addEventListener("submit", e => {
    if (mailformat.test(register_form.Email.value)) {
        if (!checkPassword(password1,password2)) {
            e.preventDefault();
        }
    } else {
        alert( "Please enter a valid email");
        e.preventDefault();
    }
});