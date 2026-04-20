document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    const nameInput = document.getElementById('inputNama');
    const emailInput = document.getElementById('inputEmail');
    const noTelpInput = document.getElementById('inputTelp');
    const passwordInput = document.getElementById('inputPassword');
    const passwordConfirmInput = document.getElementById('inputPasswordConfirm');

    // Validation messages
    const messages = {
        name: {
            required: 'Nama lengkap harus diisi',
            minlength: 'Nama minimal 4 karakter'
        },
        email: {
            required: 'Email harus diisi',
            email: 'Format email tidak valid'
        },
        noTelp: {
            required: 'Nomor telepon harus diisi',
            minlength: 'Nomor telepon minimal 10 digit',
            maxlength: 'Nomor telepon maksimal 15 digit',
            numeric: 'Nomor telepon hanya boleh angka'
        },
        password: {
            required: 'Password harus diisi',
            minlength: 'Password minimal 8 karakter'
        },
        passwordConfirm: {
            required: 'Konfirmasi password harus diisi',
            mismatch: 'Konfirmasi password tidak cocok'
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

    // Validate phone number (digits only)
    function isValidPhone(phone) {
        return /^[0-9]+$/.test(phone);
    }

    // Name validation
    function validateName() {
        const value = nameInput.value.trim();
        if (value === '') {
            showError(nameInput, 'nameError', messages.name.required);
            return false;
        } else if (value.length > 0 && value.length < 4) {
            showError(nameInput, 'nameError', messages.name.minlength);
            return false;
        }
        clearError(nameInput, 'nameError');
        return true;
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

    // Phone validation
    function validatePhone() {
        const value = noTelpInput.value.trim();
        if (value === '') {
            showError(noTelpInput, 'noTelpError', messages.noTelp.required);
            return false;
        } else if (!isValidPhone(value)) {
            showError(noTelpInput, 'noTelpError', messages.noTelp.numeric);
            return false;
        } else if (value.length < 10) {
            showError(noTelpInput, 'noTelpError', messages.noTelp.minlength);
            return false;
        } else if (value.length > 15) {
            showError(noTelpInput, 'noTelpError', messages.noTelp.maxlength);
            return false;
        }
        clearError(noTelpInput, 'noTelpError');
        return true;
    }

    // Password validation
    function validatePassword() {
        const value = passwordInput.value;
        if (value === '') {
            showError(passwordInput, 'passwordError', messages.password.required);
            return false;
        } else if (value.length > 0 && value.length < 8) {
            showError(passwordInput, 'passwordError', messages.password.minlength);
            return false;
        }
        clearError(passwordInput, 'passwordError');
        return true;
    }

    // Confirm Password validation
    function validatePasswordConfirm() {
        const value = passwordConfirmInput.value;
        const password = passwordInput.value;
        if (value === '') {
            showError(passwordConfirmInput, 'passwordConfirmError', messages.passwordConfirm.required);
            return false;
        } else if (value !== password) {
            showError(passwordConfirmInput, 'passwordConfirmError', messages.passwordConfirm.mismatch);
            return false;
        }
        clearError(passwordConfirmInput, 'passwordConfirmError');
        return true;
    }

    // Auto-validate on input (real-time)
    nameInput.addEventListener('input', validateName);
    emailInput.addEventListener('input', validateEmail);
    noTelpInput.addEventListener('input', validatePhone);
    passwordInput.addEventListener('input', validatePassword);
    passwordConfirmInput.addEventListener('input', validatePasswordConfirm);

    // Also validate password confirm when password changes
    passwordInput.addEventListener('input', function() {
        if (passwordConfirmInput.value !== '') {
            validatePasswordConfirm();
        }
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        const isValid = validateName() && validateEmail() && validatePhone() &&
                       validatePassword() && validatePasswordConfirm();

        if (!isValid) {
            e.preventDefault();
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    });
});
