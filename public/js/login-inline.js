document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    const emailInput = document.getElementById('inputEmail');
    const passwordInput = document.getElementById('inputPassword');

    // Validation messages
    const messages = {
        email: {
            required: 'Email harus diisi',
            email: 'Format email tidak valid'
        },
        password: {
            required: 'Password harus diisi'
        }
    };

    // Show/hide error
    function showError(input, errorId, message) {
        input.classList.add('is-invalid');
        document.getElementById(errorId).textContent = message;
    }

    function clearError(input, errorId) {
        input.classList.remove('is-invalid');
        document.getElementById(errorId).textContent = '';
    }

    // Validate email format
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Email validation
    function validateEmail() {
        const value = emailInput.value.trim();
        if (value === '') {
            showError(emailInput, 'emailError', messages.email.required);
            return false;
        } else if (!isValidEmail(value)) {
            showError(emailInput, 'emailError', messages.email.email);
            return false;
        }
        clearError(emailInput, 'emailError');
        return true;
    }

    // Password validation
    function validatePassword() {
        const value = passwordInput.value;
        if (value === '') {
            showError(passwordInput, 'passwordError', messages.password.required);
            return false;
        }
        clearError(passwordInput, 'passwordError');
        return true;
    }

    // Auto-validate on input (real-time)
    emailInput.addEventListener('input', validateEmail);
    passwordInput.addEventListener('input', validatePassword);

    // Form submission
    form.addEventListener('submit', function(e) {
        const isValid = validateEmail() && validatePassword();

        if (!isValid) {
            e.preventDefault();
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    });
});
