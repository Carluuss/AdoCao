<?php

$emailLogin = $_POST['emailLogin'];
$senhaLogin = $_POST['senhaLogin'];

include_once("./conexao.php");

$sql = "SELECT * FROM `registros` WHERE email_cliente = '$emailLogin'";
$res = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);


if($linha) {
    $_SESSION['logado'] = "1";
    header("location: ../../index.html");
} else {
    $_SESSION['logado'] = "2";
    header("location: ../FormLoginPage/IndexLoginPage.php");
}


?>