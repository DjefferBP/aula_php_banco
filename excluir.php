<?php
include_once("conexao.php");
$id = $_GET['id'];
$sql = "DELETE FROM alunos WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Aluno excluído com sucesso!'); window.location.href='lista.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Erro ao excluir aluno: " . mysqli_error($conn) . "'); window.location.href='lista.php';</script>";
}