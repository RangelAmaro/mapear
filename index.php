<?php
//conectar com o banco mysql
require_once 'conecta.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

?>
<!-- O HTML AQUI -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include 'blocos-html/head.html'; ?>
    <?php include 'blocos-html/head-home.html'; ?>
</head>
<body>
    <?php include 'blocos-html/header-logado.html'; ?>
    <?php include 'blocos-html/nav-header-pup-up.html'; ?>
    <?php include 'blocos-html/status-servico.html'; ?>
    <?php include 'blocos-html/listar-ferramenta.html'; ?>
    <?php include 'blocos-html/aviso-home.html'; ?>
    <?php include 'blocos-html/conteudo-txt-home.html'; ?>
    <?php include 'blocos-html/footer.html'; ?>
</body>
</html>