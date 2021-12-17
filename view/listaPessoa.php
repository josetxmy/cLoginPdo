<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
} else {
    header("location: login.php");
}
require_once '../controller/cPessoa.php';
$cadUser = new cUsuario();
$listUsers = $cadUser->getUsuarios();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista de Pessoa Fisica</h1>
        <table><!-- Cria Tabela -->
            <thead><!-- Cria Cabeçalho da Tabela -->
                <tr><!-- Cria linha da Tabela -->
                    <th>nome</th><th>email</th><th>senha</th><th>Funções</th> <!-- Cria cabeçalho de coluna da Tabela -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsers as $user): ?>
                <tr>
                    <td><?php echo $user['nome']; ?></td> <!-- Cria colunas/células da Tabela -->
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['cpf']; ?></td>
                    <td>Sem Função</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="location.href='cadPessoa.php'">Voltar</button>
    </body>
</html>

