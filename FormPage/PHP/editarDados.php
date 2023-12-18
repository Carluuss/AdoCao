<?php

include_once("../PHP/conexao.php");

$idCliente = $_POST['idCliente'];

$nomeLogin = $_POST['nomeLogin'];
$antigaSenhaLogin = $_POST['antigaSenhaLogin'];
$novaSenhaLogin = $_POST['novaSenhaLogin'];

$sqlUpdateName = "UPDATE `registros` SET `nome_cliente` = '$nomeLogin' WHERE `registros`.`id_cliente` = $idCliente";
$resUpdateName = mysqli_query($conn, $sqlUpdateName);

if(isset($antigaSenhaLogin) && isset($novaSenhaLogin)) {
    $sqlUpdatePassword = "SELECT * FROM `registros` WHERE id_cliente = $idCliente";
    $resUpdatePassword = mysqli_query($conn, $sqlUpdatePassword);
    $linhaUpdatePassword = mysqli_fetch_array($resUpdatePassword);

    session_start();
    if($linhaUpdatePassword['senha_cliente'] == $antigaSenhaLogin) {
        $_SESSION['updatePassword'] ="1";
        $sqlUpdatePassword = "UPDATE `registros` SET `senha_cliente` = '$novaSenhaLogin' WHERE `registros`.`id_cliente` = $idCliente";
        $resUpdatePassword = mysqli_query($conn, $sqlUpdatePassword);
        header("location: ../../IndexLogin.php");
    } else {
        $_SESSION['updatePassword'] = "2";
        header("location: ../../IndexLogin.php");
    }

}
?>