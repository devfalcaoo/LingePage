<?php
$server = 'localhost';
$user = 'root';
$password = '';
$bd = 'cadastro_linge';

if ($conn = mysqli_connect($server, $user, $password, $bd)) {
    echo ('Conectado ao banco de dados!');
}
else {
    echo 'Erro ao conectar ao banco de dados!';
}
?>