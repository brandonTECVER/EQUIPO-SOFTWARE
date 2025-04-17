// script.js

// Espera a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Obtiene una referencia al formulario de inicio de sesión
    const loginForm = document.getElementById('loginForm');
  
    // Agrega un evento de escucha para el envío del formulario
    loginForm.addEventListener('submit', function (e) {
      e.preventDefault(); // Previene el envío del formulario por defecto
  
      // Obtiene los valores ingresados por el usuario
      const control = document.getElementById('control').value.trim();
      const nip = document.getElementById('nip').value.trim();
  
      // Verifica las credenciales
      if (control === '22020839' && nip === '1234') {
        // Redirige al usuario a la página principal
        window.location.href = 'validacion.html';
      } else {
        // Muestra un mensaje de error
        alert('Número de control o NIP incorrecto.');
      }
    });
  });
  