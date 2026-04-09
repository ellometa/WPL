let form = document.getElementById("registerForm");
let nameInput = document.getElementById("name");
let emailInput = document.getElementById("email");
let passwordInput = document.getElementById("password");
let ageInput = document.getElementById("age");
let msg = document.getElementById("msg");

let nameErr = document.getElementById("nameError");
let emailErr = document.getElementById("emailError");
let passErr = document.getElementById("passwordError");
let ageErr = document.getElementById("ageError");

function checkName() {
    if (nameInput.value == "") {
        nameInput.className = "red";
        nameErr.style.display = "block";
        return false;
    } else {
        nameInput.className = "green";
        nameErr.style.display = "none";
        return true;
    }
}

function checkEmail() {
    let text = emailInput.value;
    if (text == "" || text.indexOf("@") == -1 || text.indexOf(".") == -1) {
        emailInput.className = "red";
        emailErr.style.display = "block";
        return false;
    } else {
        emailInput.className = "green";
        emailErr.style.display = "none";
        return true;
    }
}

function checkPassword() {
    let text = passwordInput.value;
    let hasLetter = /[a-zA-Z]/.test(text);
    let hasNumber = /[0-9]/.test(text);
    let hasSpecial = /[^a-zA-Z0-9]/.test(text); 

    if (text.length < 8 || !hasLetter || !hasNumber || !hasSpecial) {
        passwordInput.className = "red";
        passErr.style.display = "block";

        if (text.length < 8) {
            passErr.innerHTML = "Password needs to be at least 8 characters.";
        } else if (!hasLetter) {
            passErr.innerHTML = "Password needs at least one letter.";
        } else if (!hasNumber) {
            passErr.innerHTML = "Password needs at least one number.";
        } else if (!hasSpecial) {
            passErr.innerHTML = "Password needs a special character.";
        }

        return false;
    } else {
        passwordInput.className = "green";
        passErr.style.display = "none";
        return true;
    }
}

function checkAge() {
    let num = Number(ageInput.value);
    if (ageInput.value == "" || num < 18 || num > 100) {
        ageInput.className = "red";
        ageErr.style.display = "block";
        return false;
    } else {
        ageInput.className = "green";
        ageErr.style.display = "none";
        return true;
    }
}

nameInput.onkeyup = checkName;
emailInput.onkeyup = checkEmail;
passwordInput.onkeyup = checkPassword;
ageInput.onkeyup = checkAge;

form.onsubmit = function(event) {
    let okName = checkName();
    let okEmail = checkEmail();
    let okPass = checkPassword();
    let okAge = checkAge();

    if (!okPass) {
        alert("Error: Incorrect password! Must be at least 8 chars with a letter, number, and special character.");
    }

    if (!(okName && okEmail && okPass && okAge)) {
        event.preventDefault();
        msg.innerHTML = "Fix errors!";
        msg.style.color = "red";
    }
};
