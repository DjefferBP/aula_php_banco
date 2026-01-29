<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];

$id = $_POST['id'];

$sql = "UPDATE alunos SET nome='$nome', email='$email' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Aluno atualizado com sucesso!'); window.location.href='lista.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Erro ao atualizar aluno: " . mysqli_error($conn) . "'); window.location.href='lista.php';</script>";
}