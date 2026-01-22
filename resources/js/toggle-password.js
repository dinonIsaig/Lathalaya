document.addEventListener('DOMContentLoaded', function () {
    const passwordToggles = document.querySelectorAll('.toggle-password');

    passwordToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {

            const container = this.closest('.relative');
            const passwordInput = container.querySelector('input');
            
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
});