<?php
$nome_cliente = $_POST['nome'];
$email_cliente = $_POST['email'];
$senha_cliente = $_POST['senha'];


include_once('./head.php');
include_once('./conexao.php');

$sql = "SELECT * FROM registros WHERE email_cliente = '$email_cliente'";
$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);


if($linha) {
    $_SESSION['cadastrado'] = "1";
    header("location: ../FormRegisterPage/IndexFormPage.php");
} else {
    $sql = "INSERT INTO `registros`( `nome_cliente`, `email_cliente`, `senha_cliente`) VALUES ('$nome_cliente', '$email_cliente', '$senha_cliente')";
    $result = mysqli_query($conn, $sql);
    $_SESSION['cadastrado'] = "2";
    header("location: ../FormLoginpage/login.php");
}

?>
