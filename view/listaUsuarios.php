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
    echo " | <a href='../controller/logout.php'>Sair</a>";
} else {
    header("location: login.php");
}
require_once '../controller/cUsario.php';
$cadUser = new cUsuario();
$listUsers = $cadUser->getUsuarios();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista de Usuários</h1>
        <table><!-- Cria Tabela -->
            <thead><!-- Cria Cabeçalho da Tabela -->
                <tr><!-- Cria linha da Tabela -->
                    <th>id</th><th>Usuário</th><th>e-mail</th><th>Funções</th> <!-- Cria cabeçalho de coluna da Tabela -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsers as $user): ?>
                <tr>
                    <td><?php echo $user['idUser']; ?></td> <!-- Cria colunas/células da Tabela -->
                    <td><?php echo $user['nome']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>Sem Função</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="location.href='cadUsuario.php'">Voltar</button>
    </body>
</html>
