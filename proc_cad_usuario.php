<?php 
session_start();//inicializa uma secao 
include_once("conexao.php"); //inclue apenas uma vez ( include_once ) dentro desta linha de codigo a conexao.php


//Recebe o nome e email digitado pelo usuario por meio do method post e armazena nas variaveis
$nome = $_POST["nome"];
$email = $_POST["email"];

//Cria uma query insercao ( cadastro ) a mesma ja recebe os valores e armazena a query na variavel assim de otmizar codigos
$result_usuario = "INSERT INTO usuarios (NOME,EMAIL,DATA_DE_CRAICAO) VALUES ('$nome' , '$email' ,NOW())";

//executa a query ja criada acima e armazenada na variavel 
//como parametro é passado a variavel CONN para criar a conexao e a query para armazenar no banco.
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "Usuário cadastrado com Sucesso!!";
    header("location: cad_usuario.php");
    header("location: cad_usuario.php");
}

?>