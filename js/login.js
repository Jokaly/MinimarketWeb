// Toggle password visibility for login form
document.getElementById('togglePassword').addEventListener('click', function () {
    const password = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
});

// Toggle new password visibility in change password modal
document.getElementById('toggleNewPassword').addEventListener('click', function () {
    const password = document.getElementById('new_password');
    const icon = this.querySelector('i');
    
    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
});

// Toggle confirm password visibility in change password modal
document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    const password = document.getElementById('confirm_password');
    const icon = this.querySelector('i');
    
    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
});

// Validate password confirmation and requirements
document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    // Check if passwords match
    if (newPassword !== confirmPassword) {
        e.preventDefault();
        alert('Las contraseñas no coinciden. Por favor, verifica e intenta nuevamente.');
        return false;
    }
    
    // Check minimum length
    if (newPassword.length < 8) {
        e.preventDefault();
        alert('La contraseña debe tener al menos 8 caracteres.');
        return false;
    }
    
    // Check if password contains at least one letter and one number
    const hasLetter = /[a-zA-Z]/.test(newPassword);
    const hasNumber = /\d/.test(newPassword);
    
    if (!hasLetter || !hasNumber) {
        e.preventDefault();
        alert('La contraseña debe contener al menos una letra y un número.');
        return false;
    }
});

// Add loading animation to login button on form submit
document.querySelector('.login-form').addEventListener('submit', function(e) {
    const submitButton = document.querySelector('.btn-login');
    submitButton.classList.add('loading');
    submitButton.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Iniciando sesión...';
    
    // Remove loading state after 3 seconds if form is still on page (in case of error)
    setTimeout(function() {
        submitButton.classList.remove('loading');
        submitButton.innerHTML = '<i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión';
    }, 3000);
});

// Clear form when modal is closed
document.getElementById('changePasswordModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('changePasswordForm').reset();
    
    // Reset all password fields to type="password"
    const passwordFields = ['new_password', 'confirm_password'];
    passwordFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        const toggleButton = document.getElementById('toggle' + fieldId.split('_').map(word => 
            word.charAt(0).toUpperCase() + word.slice(1)
        ).join(''));
        
        if (field && toggleButton) {
            field.type = 'password';
            const icon = toggleButton.querySelector('i');
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });
});

// Auto-focus on username field when page loads
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('username').focus();
});
