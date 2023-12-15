<?php

include_once("../PHP/conexao.php");

session_start();
if (isset($_SESSION['logado'])) {
    $sql = "SELECT * FROM `registros` WHERE email_cliente = '$_SESSION[logado]'";
    $res = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($res);

}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./formEditPage.css">
</head>

<body>
    <section>
        <div class="formContent">
            <form action="../PHP/editarDados.php" method="POST" id="formLogin">
                <input type="hidden" name="idCliente" <?php echo="value='linha[]'"?>>
                <div>
                    <h1>ADO<span>C</span>ÃO</h1>
                </div>
                <div>
                    <div>
                        <input type="name" id="nomeInput" placeholder="Editar Nome!" name="nomeLogin" <?php echo "value='$linha[nome_cliente]'" ?>required>
                        <p id="nomeError">Digite um nome válido!</p>
                    </div>
                    <div>
                        <input type="password" id="antigaSenhaInput" placeholder="Digite a senha antiga" name="antigaSenhaLogin"
                            required>
                        <p id="antigaSenhaError">Digite uma senha válida!</p>
                    </div>
                    <div>
                        <input type="password" id="novaSenhaInput" placeholder="Digite a nova senha" name="novaSenhaLogin"
                            required>
                        <p id="novaSenhaError">Digite uma senha válida!</p>
                    </div>
                </div>
                <div class="btnContent">
                    <button type="button" onclick="submitForm()">Editar</button>
                </div>
            </form>
            <div class="alertButton">
                <button type="button" onclick="showModal(true)">APAGAR CONTA</button>
            </div>
        </div>
        
        <div class="modal" id="modal">
            <div class="modal-card">
                <h1>AVISO!</h1>
                <hr>
                <p>Você realmente deseja apagar sua conta? (não terá como recuperar!)</p>
                <hr>
                <div class="btn">
                    <form action="../PHP/apagardados.php">
                        <input type="hidden" name="idApagar" <?php echo"value='$linha[id_cliente]'"?>>
                        <button type="submit">APAGAR</button>
                    </form>
                    <button onclick="showModal(false)">Cancelar</button>
                </div>
            </div>
        </div>
    </section>

    <script>

        (function () {
                    let imgList = [
                        ['#8ec5da', '#85C0D5'],
                        ['#D48651', '#D69362'],
                        ['#F7E5BD', '#F5E6CC'],
                        ['#F0B4D5', '#EFC9E1']
                    ]

                    let randomNumber = Math.floor(Math.random() * imgList.length);

                    document.documentElement.style.setProperty("--background-color", imgList[randomNumber][0])
                    document.documentElement.style.setProperty("--primary-color", imgList[randomNumber][1])

                })()



        function resetStyles() {
            let novaSenhaError = document.getElementById("novaSenhaError");
            let antigaSenhaError = document.getElementById("novaSenhaError");
            let nomeError = document.getElementById("nomeError");


            novaSenhaError.style.opacity = "0";
            nomeError.style.opacity = "0";
            antigaSenhaError.style.opacity = "0"
        }

        function submitForm() {
            let formulario = document.getElementById("formLogin");

            let novaSenhaError = document.getElementById("novaSenhaError")
            let antigaSenhaError = document.getElementById("antigaSenhaError")
            let nomeError = document.getElementById("nomeError")

            let novaSenhaInput = document.getElementById("novaSenhaInput")
            let antigaSenhaInput = document.getElementById("antigaSenhaInput")
            let nomeInput = document.getElementById("nomeInput")

            resetStyles()

            if(nomeInput.value.trim() == "") {
                nomeError.style.opacity = "1"
            }
            if(novaSenhaInput.value.trim() == "") {
                novaSenhaError.style.opacity = "1"
            }
            if(antigaSenhaInput.value.trim() == "") {
                antigaSenhaError.style.opacity = "1"
            }

        };

        function showModal(isShow) {

            let modal = document.getElementById("modal")

            if(isShow) {
                modal.style.opacity = "1"
                modal.style.zIndex = "999"
            } else if (!isShow) {
                modal.style.opacity = "0"
                modal.style.zIndex = "-1"
            }
        }
    </script>
</body>

</html>