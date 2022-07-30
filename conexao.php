<?php
$host = "localhost";
$user = "root";
$senha = "";
$db = "db_hostel_project";

$conexao = new mysqli($host,$user,$senha,$db);
if ($conexao->connect_errno){
    echo "Erro na conexao" . $connect_errno;
}
?>