<?php

$emailLogin = $_POST['emailLogin'];
$senhaLogin = $_POST['senhaLogin'];

include_once("./conexao.php");

$sql = "SELECT * FROM `registros` WHERE email_cliente = '$emailLogin' AND senha_cliente = '$senhaLogin'";
$res = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($res);

session_start();
if($linha) {
    $_SESSION['logado'] = "$emailLogin";
    header("location: ../../indexLogin.php");
} else {
    $_SESSION['logado'] = "2";
    header("location: ../FormLoginPage/IndexLoginPage.php");
}


?>