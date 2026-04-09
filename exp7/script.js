document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');

    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            let isValid = true;

            let name = document.getElementById('name');
            let email = document.getElementById('email');
            let password = document.getElementById('password');
            let age = document.getElementById('age');

            if(name && name.value.trim() === '') {
                name.classList.add('red');
                name.classList.remove('green');
                document.getElementById('nameError').style.display = 'block';
                isValid = false;
            } else if (name) {
                name.classList.add('green');
                name.classList.remove('red');
                document.getElementById('nameError').style.display = 'none';
            }

            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(email && !emailRegex.test(email.value)) {
                email.classList.add('red');
                email.classList.remove('green');
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
            } else if (email) {
                email.classList.add('green');
                email.classList.remove('red');
                document.getElementById('emailError').style.display = 'none';
            }

            if(password && password.value.length < 6) {
                password.classList.add('red');
                password.classList.remove('green');
                document.getElementById('passwordError').style.display = 'block';
                isValid = false;
            } else if (password) {
                password.classList.add('green');
                password.classList.remove('red');
                document.getElementById('passwordError').style.display = 'none';
            }

            if(age && age.value && (age.value < 18 || age.value > 100)) {
                age.classList.add('red');
                age.classList.remove('green');
                if (document.getElementById('ageError')) document.getElementById('ageError').style.display = 'block';
                isValid = false;
            } else if(age && age.value) {
                age.classList.add('green');
                age.classList.remove('red');
                if (document.getElementById('ageError')) document.getElementById('ageError').style.display = 'none';
            }

            if(!isValid) {
                e.preventDefault();
            }
        });
    }
});
