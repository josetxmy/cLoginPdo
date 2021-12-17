<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='controller/logout.php'>Sair</a>";
} else {
    header("location: view/login.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Criptos</title>
    </head>
    <body>
        <h1>Login - Teste de Criptografia</h1>
        <h2>Criptografias, PDO, Session, Autenticação, CRUD</h2>
        <p></p>
        <a href="view/cadUsuario.php">Cadastro de Usuário</a> |
        <a href="view/cadPesssoaF.php">Cadastro de PessoaF</a> |
        <a href="view/cadPessoaJ.php">Cadastro de PessoaJ</a>
    </body>
</html>
