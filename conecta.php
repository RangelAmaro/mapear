<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto-mapear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
$domain = $_SERVER['HTTP_HOST'].'/mapear';

$rootDirectory = "http://" . $domain;
$cssmin = $rootDirectory . '/assets/css/min.css';
$favicon = $rootDirectory . "/assets/img/favicon.png";
$jsmodocor = $rootDirectory . '/assets/js/modos-cor.js';
?>