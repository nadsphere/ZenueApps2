document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    const namaEoInput = document.getElementById('inputNamaEo');
    const emailEoInput = document.getElementById('inputEmailEo');
    const alamatInput = document.getElementById('inputAlamat');
    const kontakInput = document.getElementById('inputKontak');
    const linkInput = document.getElementById('inputLink');

    // Validation messages
    const messages = {
        namaEo: {
            required: 'Nama Event Organizer harus diisi',
            minlength: 'Nama EO minimal 3 karakter'
        },
        emailEo: {
            required: 'Email EO harus diisi',
            email: 'Format email tidak valid'
        },
        alamat: {
            required: 'Alamat harus diisi',
            minlength: 'Alamat minimal 5 karakter'
        },
        kontak: {
            required: 'Kontak harus diisi',
            minlength: 'Kontak minimal 10 digit',
            numeric: 'Kontak hanya boleh angka'
        },
        link: {
            url: 'Format URL tidak valid (contoh: https://example.com)'
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

    // Validate URL format
    function isValidUrl(url) {
        if (url === '') return true; // optional field
        return /^https?:\/\/[^\s]+$/.test(url);
    }

    // Nama EO validation
    function validateNamaEo() {
        const value = namaEoInput.value.trim();
        if (value === '') {
            showError(namaEoInput, 'namaEoError', messages.namaEo.required);
            return false;
        } else if (value.length > 0 && value.length < 3) {
            showError(namaEoInput, 'namaEoError', messages.namaEo.minlength);
            return false;
        }
        clearError(namaEoInput, 'namaEoError');
        return true;
    }

    // Email EO validation
    function validateEmailEo() {
        const value = emailEoInput.value.trim();
        if (value === '') {
            showError(emailEoInput, 'emailEoError', messages.emailEo.required);
            return false;
        } else if (!isValidEmail(value)) {
            showError(emailEoInput, 'emailEoError', messages.emailEo.email);
            return false;
        }
        clearError(emailEoInput, 'emailEoError');
        return true;
    }

    // Alamat validation
    function validateAlamat() {
        const value = alamatInput.value.trim();
        if (value === '') {
            showError(alamatInput, 'alamatError', messages.alamat.required);
            return false;
        } else if (value.length > 0 && value.length < 5) {
            showError(alamatInput, 'alamatError', messages.alamat.minlength);
            return false;
        }
        clearError(alamatInput, 'alamatError');
        return true;
    }

    // Kontak validation
    function validateKontak() {
        const value = kontakInput.value.trim();
        if (value === '') {
            showError(kontakInput, 'kontakError', messages.kontak.required);
            return false;
        } else if (!isValidPhone(value)) {
            showError(kontakInput, 'kontakError', messages.kontak.numeric);
            return false;
        } else if (value.length > 0 && value.length < 10) {
            showError(kontakInput, 'kontakError', messages.kontak.minlength);
            return false;
        }
        clearError(kontakInput, 'kontakError');
        return true;
    }

    // Link validation (optional)
    function validateLink() {
        const value = linkInput.value.trim();
        if (value !== '' && !isValidUrl(value)) {
            showError(linkInput, 'linkError', messages.link.url);
            return false;
        }
        clearError(linkInput, 'linkError');
        return true;
    }

    // Auto-validate on input (real-time)
    namaEoInput.addEventListener('input', validateNamaEo);
    emailEoInput.addEventListener('input', validateEmailEo);
    alamatInput.addEventListener('input', validateAlamat);
    kontakInput.addEventListener('input', validateKontak);
    linkInput.addEventListener('input', validateLink);

    // Form submission
    form.addEventListener('submit', function(e) {
        const isValid = validateNamaEo() && validateEmailEo() && validateAlamat() &&
                       validateKontak() && validateLink();

        if (!isValid) {
            e.preventDefault();
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    });
});
