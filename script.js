const loginSound = new Audio("audios/button.mp3");
const errorSound = new Audio("audios/error.mp3");


const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", function (event) {
  event.preventDefault();

  const control = document.getElementById("control").value.trim();
  const nip = document.getElementById("nip").value.trim();

  // Si hay campos vacíos: sonar error y mostrar alerta
  const errorMsg = document.getElementById("errorMsg"); //busca id="errorMsg" en html
  const validoMsg = document.getElementById("validoMsg");

  if (!control || !nip) {
    errorMsg.textContent = "Completa todos los campos.";
    errorSound.play();
    return;
  }




  // Enviar datos por fetch a login.php
  fetch("php/login.php", {



    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `control=${encodeURIComponent(control)}&nip=${encodeURIComponent(nip)}`
  })
  .then(res => res.text())
  .then(response => {
    if (response.trim() === "ok") {
      loginSound.play();
      validoMsg.textContent = "Entrando";
      loginSound.onended = () => {



        window.location.href = "encuesta.html";



      };
    } else {
      errorSound.play();
      errorMsg.textContent = " No. Control o NIP incorrectos "
      //alert("No. de control o NIP incorrecto.");
    }
  })
  .catch(() => {
    errorSound.play();
    alert("Error al conectar con el servidor.");
  });
});