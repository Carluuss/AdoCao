<?php

include_once("../PHP/conexao.php");

$nomeLogin = $_POST['nomeLogin'];
$antigaSenhaLogin = $_POST['antigaSenha'];
$novaSenhaLogin = $_POST['nomeLogin'];

$sql = "SELECT * FROM `registros` WHERE email_cliente = '$emailLogin'"

?>