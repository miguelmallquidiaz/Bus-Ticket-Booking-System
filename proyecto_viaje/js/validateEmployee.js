const nombreInput = document.getElementById('inputNombre');
const apePaInput = document.getElementById('inputApePa');
const apeMaInput = document.getElementById('inputApeMa');
const celularInput = document.getElementById('inputCelular');
const emailInput = document.getElementById('inputEmail');
const errorSpans = document.querySelectorAll('.error-'); // Select all error spans

function validateInput(input, type, errorMsg) {
    const value = input.value.trim(); // Trim leading/trailing spaces

    if (type === 'text') {
      input.value = value.toLowerCase(); // Convert to lowercase for name validation
        if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(value)) {
            showError(input, errorMsg);
            return false;
        }
    } else if (type === 'number') {
        // const regex = /^\d+(?:[TRWAGMYFPDXBNJZSQVHLCKET])?$/;
        const regex = /^\d+$/; 
        if (!regex.test(value) || value.length !== parseInt(input.maxLength) || /e/.test(value)) {
            showError(input, errorMsg);
            return false;
        }
    } else if (type === 'email') {
        input.value = value.toLowerCase();
        if (!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(value)) {
            showError(input, errorMsg);
            return false;
        }
    }
    hideError(input);
    return true;
}

function showError(input, message) {
    const errorSpan = input.nextElementSibling; // Get the error span next to the input
    errorSpan.textContent = message;
    errorSpan.classList.add('error-active'); // Add an active class for styling
}

function hideError(input) {
    const errorSpan = input.nextElementSibling;
    errorSpan.textContent = '';
    errorSpan.classList.remove('error-active');
}

nombreInput.addEventListener('keyup', () => validateInput(nombreInput, 'text', 'Solo letras'));
apePaInput.addEventListener('keyup', () => validateInput(apePaInput, 'text', 'Solo letras'));
apeMaInput.addEventListener('keyup', () => validateInput(apeMaInput, 'text', 'Solo letras'));
celularInput.addEventListener('keyup', () => validateInput(celularInput, 'number', 'Solo 9 dígitos'));
emailInput.addEventListener('keyup', () => validateInput(emailInput, 'email', 'Correo electrónico inválido')); 

// Add form submission validation (optional)
const form = document.forms['fr'];
form.addEventListener('submit', (event) => {
    let isValid = true;
    for (const input of form.elements) {
        if (input.tagName === 'INPUT' && !validateInput(input, input.type === 'email' ? 'email' : (input.type === 'number' ? 'number' : 'text'), 'Error')) {
            isValid = false;
        }
    }
    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});