




function resetStyles() {
    let nomeError = document.getElementById("nameError")
    let senhaError = document.getElementById("senhaError")
    let senhaRepetirError = document.getElementById("senhaRepetirError")
    let emailError = document.getElementById("emailError")
    let dataError = document.getElementById("dataError")

    nomeError.style.opacity = "0"
    senhaError.style.opacity = "0"
    senhaRepetirError.style.opacity = "0"
    emailError.style.opacity = "0"
    dataError.style.opacity = "0"

}

function submitForm() {

    let nomeError = document.getElementById("nameError")
    let senhaError = document.getElementById("senhaError")
    let senhaRepetirError = document.getElementById("senhaRepetirError")
    let emailError = document.getElementById("emailError")
    let dataError = document.getElementById("dataError")

    let nomeInput = document.getElementById("nameInput")
    let senhaInput = document.getElementById("senhaInput")
    let senhaRepetirInput = document.getElementById("senhaRepetirInput")
    let emailInput = document.getElementById("emailInput")
    let dataInput = document.getElementById("dataInput")

    resetStyles()

    if (nomeInput.value.trim() == "") {
        nomeError.style.opacity = "1"
    }
    if (senhaInput.value.trim() == "" || senhaInput.value.trim() <= 8) {
        senhaError.style.opacity = "1"
    }
    if (senhaRepetirInput.value.trim() == "" || senhaRepetirInput.value !== senhaInput.value) {
        senhaRepetirError.style.opacity = "1"
    }
    if (emailInput.value.trim() == "") {
        emailError.style.opacity = "1"
    }
    if (dataInput.value.trim() == "") {
        dataError.style.opacity = "1"
    }

    

}