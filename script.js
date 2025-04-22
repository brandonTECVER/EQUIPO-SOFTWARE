const loginSound = new Audio("audios/button.mp3");
const errorSound = new Audio("audios/error.mp3");

const loginForm = document.getElementById("loginForm");
const errorMsg = document.getElementById("errorMsg");
const validoMsg = document.getElementById("validoMsg");

//  Limpiar mensajes al cargar la página
window.addEventListener("pageshow", () => {
  errorMsg.textContent = "";
  validoMsg.textContent = "";
});

//  Evento cuando se envía el formulario
loginForm.addEventListener("submit", function (event) {
  event.preventDefault();

  //  Limpiar mensajes anteriores
  errorMsg.textContent = "";
  validoMsg.textContent = "";

  const control = document.getElementById("control").value.trim();
  const nip = document.getElementById("nip").value.trim();

  if (!control || !nip) {
    errorMsg.textContent = "Completa todos los campos";
    errorSound.play();
    return;
  }

  // 🚀 Enviar datos al servidor
  fetch("login.php", {
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
      validoMsg.textContent = "Entrando...";
      loginSound.onended = () => {
        window.location.href = "3ro/encuesta.html";
      };
    } else {
      errorSound.play();
      errorMsg.textContent = " No. Control o NIP incorrectos ";
    }
  })
  .catch(() => {
    errorSound.play();
    alert("Error al conectar con el servidor.");
  });
});
