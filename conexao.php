<!-- Conexão com o Banco de Dados -->
<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "cadastro_linge";

$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) {
    echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
    exit();
}

function mensagem($texto, $tipo)
{
    echo "<div class='alert alert-$tipo' role='alert'>
                $texto
              </div>";
}

///Mostra a data no formato br:
    
///function mostra_data($data)
///{
 ///   $d = explode('-', $data);
 ///   $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
 ///   return $escreve;
///}
