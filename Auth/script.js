document.addEventListener('DOMContentLoaded', function() {
    var usernameInput = document.getElementById('username');
    var passwordInput = document.getElementById('password');
    var loginButton = document.getElementById('login-button');
  
    function validateForm() {
      if (usernameInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
        loginButton.disabled = false;
      } else {
        loginButton.disabled = true;
      }
    }
  
    usernameInput.addEventListener('blur', validateForm);
    passwordInput.addEventListener('blur', validateForm);
  });