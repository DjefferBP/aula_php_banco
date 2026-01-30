<?php
include_once("conexao.php");

$usuarios = [];

$sql = "select * from alunos";
$result = mysqli_query($conn, $sql);
            
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alunos</title>
    <link rel="stylesheet" href="stylelist.css">
</head>
<body>
    <div class="container" style="margin-top: 60px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); background-color: #f9f9f9; max-width: 800px; margin-left: auto; margin-right: auto;">
        <h2>Alunos cadastrados</h2>
        <form method="get" action="lista.php" class="form-pesquisa">
            <input type="text" name="pesquisar" placeholder="Pesquisar por nome"><br>
            <div class="botoes-pesquisa">
                <input type="submit" value="Pesquisar" class="btn-pesquisar">
                <?php
                if (isset($_GET['pesquisar']) && $_GET['pesquisar'] != '') {
                    echo '<a href="lista.php" class="btn-limpar">Limpar pesquisa</a>';
                }
                ?>
            </div>
        </form>
        <a href="index.html" class="btn-voltar">Cadastrar novo aluno</a>
        <table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
                if (isset($_GET['pesquisar'])){
                    $pesquisar = $_GET['pesquisar'];
                    $sql = "select * from alunos where nome like '%$pesquisar%'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) == 0){
                        echo "<tr><td colspan='4'>Nenhum resultado encontrado para '$pesquisar'</td></tr>";
                    }
                    else {
                        while ($linha = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>". $linha["nome"]. "</td>";
                            echo "<td>". $linha["email"]. "</td>";
                            echo "<td><a href='editar.php?id=" . $linha['id'] . "' class='btn-editar'>Editar</a></td>";
                            echo "<td><a href='excluir.php?id=" . $linha['id'] . "' class='btn-excluir'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    while ($linha = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>". $linha["nome"]. "</td>";
                        echo "<td>". $linha["email"]. "</td>";
                        echo "<td><a href='editar.php?id=" . $linha['id'] . "' class='btn-editar'>Editar</a></td>";
                        echo "<td><a href='excluir.php?id=" . $linha['id'] . "' class='btn-excluir'>Excluir</a></td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
        

    </div>
</body>
</html>