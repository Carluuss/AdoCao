<?php

include_once("../PHP/conexao.php");

$idApagar = isset($_GET['idApagar']) ? $_GET['idApagar'] : "";

$sql = "DELETE FROM `registros` WHERE id_cliente = '$idApagar'";
$res = mysqli_query($conn, $sql);

header("Location: ../../index.html")


?>