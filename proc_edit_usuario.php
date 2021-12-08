<?php 
session_start();//inicializa uma secao 
include_once("conexao.php"); //inclue apenas uma vez ( include_once ) dentro desta linha de codigo a conexao.php


//Recebe o id, nome e email digitado pelo usuario por meio do method post e armazena nas variaveis
$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];

/*
echo "ID : $id <br>";
echo "Nome : $nome <br>";
echo "Email : $email <br>";
*/

//Cria uma query UPDATE ( para editar ) a mesma ja recebe os valores e armazena a query na variavel assim de otmizar codigos

$result_usuario = "UPDATE usuarios SET nome='$nome' , email ='$email', data_de_modificacao = NOW() where id = '$id'";

//executa a query ja criada acima e armazenada na variavel 
//como parametro é passado a variavel CONN para criar a conexao e a query para armazenar no banco.

$resultado_usuario = mysqli_query($conn, $result_usuario);


// para verificar se o UPDATE foi realizado com sucesso utilizasse o mysqli_affected_rows
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com Sucesso!!</p>";
    header("location: listar.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com Sucesso!!</p>";
    header("location: edit_usuario.php?id=$id");
}

?>