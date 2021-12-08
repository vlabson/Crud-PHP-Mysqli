<?php
    session_start();
    include_once("conexao.php");

    //Recebe o id do usuario que será deletado por meio do method get e armazena na variavel
    $id = $_GET["id"];
    $result_usuario = "SELECT * FROM usuarios where id = '$id'";
    $resultado_usuario = mysqli_query($conn,$result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CRUD - Deletar</title>
    </head>

    <body>

        <h1>Deletar Usuário</h1>

        <nav>

            <ul> 
                <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/index.html">HOME</a></li> 
                <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/cadastrar.php">CADASTRAR</a></li> 
                <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/listar.php">LISTAR</a></li> 
            </ul>

        </nav>
     
        <?php
           if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg'];
                unset( $_SESSION['msg']);   
            }
        ?>

        <form method="POST" action="proc_del_usuario.php">
            <input type="hidden" name="id" value = "<?php echo $row_usuario['id']; ?>" ><br><br>
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite aqui seu nome completo!" value = "<?php echo $row_usuario['nome']; ?>" ><br><br>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Digite aqui seu melhor e-mail!" value = "<?php echo $row_usuario['email']; ?>" ><br><br>
            <input type="submit" value="Deletar">
        </form>
    </body>

</html>