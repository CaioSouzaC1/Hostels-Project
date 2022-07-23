<?php
session_start();
include "conexao.php";

$nome = /* mysqli_real_escape_string($conexao,*/trim($_POST['nome'])/*)*/;
$email = /*mysqli_real_escape_string($conexao,*/trim($_POST['email'])/*)*/;
$senha = /*mysqli_real_escape_string($conexao,*/trim(md5($_POST['senha']))/*)*/;
$data_entrada = /*mysqli_real_escape_string($conexao,*/($_POST['data_entrada'])/*)*/;
$data_saida = /*mysqli_real_escape_string($conexao,*/($_POST['data_saida'])/*)*/;

$query = "SELECT 'email' FROM `table_hostel_project` WHERE email = '{$email}'";
$result = mysqli_query($conexao,$query);
$row = mysqli_num_rows($result);

if ($row == 1) {
    echo "Algum erro" ;
    exit;
}

$sql = "INSERT INTO `table_hostel_project`(`nome`, `email`, `senha`, `data_entrada`, `data_saida`) VALUES ('$nome','$email','$senha','$data_entrada','$data_saida')";

    if ($conexao->query($sql) === TRUE) {
    $_SESSION = true;
    
} 
$conexao->close();
if ($row == 0) {
    echo "Tudo Certo" ;
    exit;
}
?>
?>
