<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco vulnerável</title>
    <link rel="stylesheet" href="stylelist.css">
</head>

<body>
    <div class="container">
        <form method='get'>
            <input type="text" name="busca" id="busca">
            <button>Buscar</button>
        </form>

        <?php
        include_once("conexao.php");
        if (isset($_GET['busca'])) {
            $busca = $_GET['busca'];
            $sql = "SELECT * FROM alunos WHERE nome LIKE '%$busca%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "
                    <table>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                        </tr>
                    ";
                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "
                            <tr>
                                <td>" . $linha['nome'] . "</td>
                                <td>" . $linha['email'] . "</td>
                            </tr>
                            ";
                        }
                echo "</table>";
            } elseif (mysqli_num_rows($result) == 0) {
                echo "Nenhum resultado encontrado para '$busca'";
            }
            else {
                echo "Erro na consulta: " . mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>

</html>