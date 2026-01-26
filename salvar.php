<?php

include_once("conexao.php");

//Pegando os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

// comando para mandar para o banco
$sql = "insert into alunos (nome, email) values ('$nome', '$email')";

if (mysqli_query($conn, $sql)){
    echo "<h1>Aluno cadastrado com sucesso!</h1>";
    echo "<a href='index.html'>Voltar</a>";
}
else  {
    echo "Erro ao cadastrar";
    echo "<a href='index.html'>Voltar</a>";
}