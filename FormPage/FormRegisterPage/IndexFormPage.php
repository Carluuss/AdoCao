<?php

session_start();
if (isset($_SESSION['cadastrado'])) {
    if ($_SESSION['cadastrado'] == "1") {
        unset($_SESSION['cadastrado']);
        echo "<script>alert('Email Ja Cadastrado!')</script>";
    }
}

session_destroy();

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdoCão</title>
    <link rel="stylesheet" href="./FormRegistrarPage.css">
    <link rel="shortcut icon" href="https://img.freepik.com/vetores-gratis/um-modelo-de-adesivo-de-personagem-de-desenho-animado-de-cachorro_1308-75254.jpg?w=740&t=st=1699276934~exp=1699277534~hmac=bd0606629695c49a70fb9ce700d88d13a25dc6709fbde747e28c6b687dc9b02e" type="image/x-icon">
    <script src="FormPage.js" type="text/javascript"></script>
</head>
<body id="body">
    <div class="boxForm">
        <div class="imgContent" id="imgContainer">
        </div>
        <div class="formContent">
            <form action="../PHP/registrar.php" method="POST" id="formRegister">
                <div>
                    <div>
                        <label for="">Nome </label>
                        <input type="text" id="nameInput" placeholder="Digie um nome" required name="nome">
                        <p id="nameError">Digite um nome válido!</p>
                    </div>
                    <div>
                        <label for="">E-mail </label>
                        <input type="email" id="emailInput" placeholder="Digite seu email" required name="email">
                        <p id="emailError">Digite um email válido!</p>
                    </div>
                    <div>
                        <label for="">Senha </label>
                        <input type="password" id="senhaInput" placeholder="mínimo 8 caracteres" required name="senha">
                        <p id="senhaError">Digite uma senha válida!</p>
                    </div>
                    <div>
                        <label for="">Repita a senha </label>
                        <input type="password" id="senhaRepetirInput" placeholder="repita sua senha" required>
                        <p id="senhaRepetirError">Digite uma senha válida!</p>
                    </div>
                    <hr>
                    <div class="linkRegister">
                        <button class="googleLink">
                            <img src="../formImg/googleLogo.png" alt="">
                            <p>Registrar com o google</p>
                        </button>
                        <button class="facebookLink">
                            <img src="../formImg/facebookLogo.png" alt="">
                            <p>Registrar com o facebook</p>
                        </button>
                    </div>
                </div>
                <div class="btnContent">
                    <button type="button" onclick="submitForm()">Registrar</button>
                </div>
            </form>
            <hr>
            <a href="../FormLoginPage/login.html">Já tem uma conta? faça o login!</a>
        </div>
    </div>

    <script>
            (function() {
        let imgList = [
            ["../formImg/sideImg1.jpg", '#8ec5da', '#85C0D5'], 
            ['../formImg/sideImg2.jpg', '#D48651', '#D69362'], 
            ['../formImg/sideImg3.jpg', '#F7E5BD', '#F5E6CC'], 
            ['../formImg/sideImg4.jpg', '#F0B4D5', '#EFC9E1']
        ]

        let randomNumber = Math.floor(Math.random() * imgList.length);
        let randomColor =  randomNumber;

        document.getElementById("imgContainer").innerHTML = "<img id=img src='" + imgList[randomNumber][0] + "'>"

        document.documentElement.style.setProperty("--background-color", imgList[randomNumber][1])
        document.documentElement.style.setProperty("--primary-color", imgList[randomNumber][2])

    })()

    function resetStyles() {
        let nomeError = document.getElementById("nameError");
        let senhaError = document.getElementById("senhaError");
        let emailError = document.getElementById("emailError");
        let senhaRepetirError = document.getElementById("senhaRepetirError");

        nomeError.style.opacity = "0";
        senhaError.style.opacity = "0";
        emailError.style.opacity = "0";
        senhaRepetirError.style.opacity = "0";
    }


    function submitForm() {
        let formulario = document.getElementById("formRegister");

        let nomeError = document.getElementById("nameError");
        let senhaError = document.getElementById("senhaError");
        let emailError = document.getElementById("emailError")
        let senhaRepetirError = document.getElementById("senhaRepetirError");

        let nomeInput = document.getElementById("nameInput");
        let senhaInput = document.getElementById("senhaInput");
        let emailInput = document.getElementById("emailInput");
        let senhaRepetirInput = document.getElementById("senhaRepetirInput");

        resetStyles();

        if(nomeInput.value.trim() == "") {
            nomeError.style.opacity = "1"
        }
        if(emailInput.value.trim() == "") {
            emailError.style.opacity = "1"
        }
        if(senhaInput.value.trim() == "") {
            senhaError.style.opacity = "1"
        }
        if(senhaRepetirInput.value.trim() == "") {
            senhaRepetirError.style.opacity = "1"
        }
        if (senhaInput.value.trim() !== senhaRepetirInput.value.trim()) {
            senhaError.style.opacity = "1"
            senhaRepetirError.style.opacity = "1"
        }

        if (!nomeInput.value.trim() == "" && !emailInput.value.trim() == "" && !senhaInput.value.trim() == "" && !senhaRepetirInput.value.trim() == "" && senhaInput.value.trim() == senhaRepetirInput.value.trim()) {
            formulario.submit()
        }


    };
    
    </script>
</body>
</html>
