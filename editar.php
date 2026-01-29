<?php
include_once("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM alunos WHERE id = $id";
$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar</title>
</head>
<body>
    <div class="container">
        <h1>Editar aluno</h1>
        <form action="atualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
            <label for="">Nome:</label>
            <input type="text" class="text" name="nome" required placeholder="Digite o nome" value="<?php echo $linha['nome']; ?>">

            <label for="">Email:</label>
            <input type="email" class="name" name="email" required placeholder="Digite seu email" value="<?php echo $linha['email']; ?>">
            
            <button class="submit-button" type="submit">Atualizar aluno</button>
        </form>

        <a href="lista.php" class="link-button">Voltar para a lista</a>
    </div>
</body>
</html>