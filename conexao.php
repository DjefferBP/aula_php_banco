<?php
$servidor= 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'senai';

// criando conexão com o banco
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

// testando se deu certo

if (!$conn) {
    die("A conexão falhou: ". mysqli_connect_error());
}
