<?php
$host = "localhost";
$user = "root";
$senha = "";
$db = "db_hostel_project";

$conexao = new mysqli($host,$user,$senha,$db);
if ($conexao->connect_errno){
    echo "Falha na conexão com o banco de dados" . $conexao->connect_errno;
} 
?>