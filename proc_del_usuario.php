<?php 
session_start();//inicializa uma secao 
include_once("conexao.php"); //inclue apenas uma vez ( include_once ) dentro desta linha de codigo a conexao.php

//Recebe o id pelo  method post e armazena nas variavel
$id = $_POST["id"];


/*
echo "ID : $id <br>";
echo "Nome : $nome <br>";
echo "Email : $email <br>";
*/

// aqui verifico se o ID não é NULL ou VAZIO
if(!empty($id)){
   
    //Cria uma query DELETE ( para deletar ) a mesma ja recebe os valores e armazena a query na variavel assim de otmizar codigos
    $result_usuario = "DELETE FROM usuarios where id = '$id'";

    //executa a query ja criada acima e armazenada na variavel 
    //como parametro é passado a variavel CONN para criar a conexao e a query para armazenar no banco.

    $resultado_usuario = mysqli_query($conn, $result_usuario);

    // para verificar se o DELETE foi realizado com sucesso utilizasse o mysqli_affected_rows
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário deletado com Sucesso!!</p>";
        header("location: listar.php?id=$id");
    }

}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi deletado com Sucesso!!</p>";
    header("location: del_usuario.php?id=$id");
}

?>