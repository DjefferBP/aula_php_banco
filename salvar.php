<?php

include_once("conexao.php");

//Pegando os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$materia = $_POST['materia'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];

// comando para mandar para o banco
$sql = "insert into alunos (nome, email) values ('$nome', '$email')";

if (mysqli_query($conn, $sql)){
    $novo_id = mysqli_insert_id($conn);
    $data_atual = new DateTime();
    $sql = "INSERT INTO  notas (aluno_id, materia, nota, nota2, nota3, data_avaliacao) 
            VALUES ($novo_id, '$materia', $nota1, $nota2, $nota3, '".$data_atual->format('Y-m-d H:i:s')."')";
    if (mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('Aluno cadastrado com sucesso!'); window.location.href='lista.php';</script>";
    } else {
        echo "Erro ao cadastrar notas: " . mysqli_error($conn);
        echo "<a href='index.html'>Voltar</a>";
    }
}
else  {
    echo "Erro ao cadastrar";
    echo "<a href='index.html'>Voltar</a>";
}