(function () {
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');

    function checkPasswords() {
        if (confirmPassword.value && password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match.');
        } else {
            confirmPassword.setCustomValidity('');
        }
    }

    password.addEventListener('input', checkPasswords);
    confirmPassword.addEventListener('input', checkPasswords);
})();