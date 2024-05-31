function validateEmail(email) {
    const regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return regex.test(email);
  }
  
  const emailInput = document.getElementById('email');
  const submitButton = document.querySelector('#loginForm input[type="submit"]'); // Get submit button
  const errorMessage = document.querySelector('.error-message'); // Get error message container
  
  emailInput.addEventListener('blur', function (event) { // Validate on blur
    const email = emailInput.value;
  
    if (validateEmail(email)) {
      errorMessage.classList.add('valid');
      errorMessage.classList.remove('invalid');
      submitButton.disabled = false;
      errorMessage.textContent = ''; // Clear error message if valid
    } else {
      errorMessage.classList.add('invalid');
      errorMessage.classList.remove('valid');
      submitButton.disabled = true;
      errorMessage.textContent = 'La dirección de correo electrónico no es válida'; // Set error message
    }
});