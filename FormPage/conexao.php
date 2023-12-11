<?php

$conn = new MySQli('localhost', 'root', '', 'bd_adocao');

if($conn->connect_error){
    die("Connection falied: ". $conn->connect_error);
}

?>