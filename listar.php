<?php
    session_start();
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CRUD - Listar</title>
    </head>
    <body>

    <nav>

<ul> 
    <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/index.html">HOME</a></li> 
    <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/cadastrar.php">CADASTRAR</a></li> 
    <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/listar.php">LISTAR</a></li> 
    <li><a href="http://localhost/MeusProjetos/CursoCelke/Crud-PHP-Mysqli/deletar.php">DELETAR</a></li>

</ul>

</nav>

        <h1>Listar Usuário</h1>
        <?php
           if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg'];
                unset( $_SESSION['msg']);   
            }

            // receber da URL a informação a pagina atual se for o primeiro acesso define como primeira pagina

            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //setar a quantidade de itens por pagina
            $qnt_result_pg = 2;

            //realiza um calculo para identificar quais item seram mostrados na pagina 
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
           
            // query para consulta banco a pegar informaçoes 
            $result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);

            // mostra o resultado na tela
            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "Id : " . $row_usuario['id'] . "</br>";
                echo "Nome : " . $row_usuario['nome'] . "</br>";
                echo "E-mail : " . $row_usuario['email'] . "</br><hr>";
            }

            //realiza o calculo da paginação ( somar a quantidade de usuarios e registros de linha no banco )
            $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];

            //calcula com base nas linhas e na definicao max de exibição a quantidade de paginas 
            //utiliza o ceil para arredondar o resultado
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

            // limitar qauntidades de links antes e depois da pagina atual 
            $max_links = 2;

            //exibe na tela paginação 
            echo "<a href = 'listar.php?pagina=1'> Primeira </a>";

            
            for($pag_ant = $pagina - $max_links;$pag_ant <= $pagina - 1; $pag_ant ++){
                if($pag_ant >= 1){
                    echo "<a href = 'listar.php?pagina=$pag_ant'> $pag_ant </a>";
                }
            }

            echo $pagina;

           
            for($pag_dep = $pagina + 1;$pag_dep <= $pagina + $max_links; $pag_dep ++){
                if($pag_dep <= $quantidade_pg){
                    echo "<a href = 'listar.php?pagina=$pag_dep'> $pag_dep </a>";
                }
            }

            echo "<a href = 'listar.php?pagina=$quantidade_pg'> Ultima </a>"

        ?>
       
    </body>

</html>