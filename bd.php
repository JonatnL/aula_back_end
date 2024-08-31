<?php
$conn = new mysqli("localhost", "root", "", "meusite");
if ($conn->connect_error){
    die("Falha na conexão: " .$conn->connect_error);
}

?>