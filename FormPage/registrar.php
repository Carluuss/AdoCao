<?php
$nome_cliente = $_POST['nome'];
$email_cliente = $_POST['email'];
$senha_cliente = $_POST['senha'];


include_once('head.php');

echo ("Nome: $nome_cliente<br>E-mail: $email_cliente<br>Senha: $senha_cliente<br> <a href='FormPage.html'><input type='button' value='Voltar'></a>");



$conn = new MySQli('localhost', 'root', '', 'bd_adocao');

if ($conn->connect_error) {
    die("Connection falied: " . $conn->connect_error);
} else {
    $sql = "INSERT INTO registros (nome_cliente, email_cliente, senha_cliente)
    VALUES ('$nome_cliente', '$email_cliente', '$senha_cliente')";
    mysqli_query($conn, $sql);
}
header('Location:./FormPage.html');
?>