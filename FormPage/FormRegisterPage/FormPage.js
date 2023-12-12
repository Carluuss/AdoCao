

function resetStyles() {
  let nomeError = document.getElementById("nameError");
  let senhaError = document.getElementById("senhaError");
  let senhaRepetirError = document.getElementById("senhaRepetirError");

  nomeError.style.opacity = "0";
  senhaError.style.opacity = "0";
  senhaRepetirError.style.opacity = "0";
}

document.getElementById("botao").addEventListener("click", function (event) {
    event.defaultPrevented();
    let formulario = document.getElementById("formRegister");

  let nomeError = document.getElementById("nameError");
  let senhaError = document.getElementById("senhaError");
  let senhaRepetirError = document.getElementById("senhaRepetirError");

  let nomeInput = document.getElementById("nameInput");
  let senhaInput = document.getElementById("senhaInput");
  let senhaRepetirInput = document.getElementById("senhaRepetirInput");

  resetStyles();

  if (nomeInput.value.trim() == "") {
    nomeError.style.opacity = "1";
  }else if  (senhaInput.value.trim() == "" || senhaInput.value.trim() <= 8) {
    senhaError.style.opacity = "1";
  }else if (
    senhaRepetirInput.value.trim() == "" ||
    senhaRepetirInput.value !== senhaInput.value
  ) {
    senhaRepetirError.style.opacity = "1";
  }else if (senhaRepetirInput.value === senhaInput.value) {
    alert('error');
  }
});
