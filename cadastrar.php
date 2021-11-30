<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CRUD - cadastrar</title>
    </head>
    <body>

    <h1>Cadastrar Usuário</h1>

        <nav>

        <ul> 
            <li><a href="http://localhost/CursoCelke/CRUD_PHP_MYSQLI/index.html">HOME</a></li> 
            <li><a href="http://localhost/CursoCelke/CRUD_PHP_MYSQLI/cadastrar.php">CADASTRAR</a></li> 
            <li><a href="http://localhost/CursoCelke/CRUD_PHP_MYSQLI/listar.php">LISTAR</a></li> 
            <li><a href="http://localhost/CursoCelke/CRUD_PHP_MYSQLI/deletar.php">DELETAR</a></li>

        </ul>

    </nav>
     
        <?php
           if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg'];
                unset( $_SESSION['msg']);   
            }
        ?>

        <form method="POST" action="processa.php">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite aqui seu nome completo!"><br><br>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Digite aqui seu melhor e-mail!"><br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>

</html>