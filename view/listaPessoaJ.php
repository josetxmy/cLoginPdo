<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
} else {
    header("location: login.php");
}
require_once '../controller/cPessoaJ.php';
$cadPessoaJ = new cPessoaJ();
$listPj = $cadPj->getPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista de Pessoa Juridica</h1>
        <table><!-- Cria Tabela -->
            <thead><!-- Cria Cabeçalho da Tabela -->
                <tr><!-- Cria linha da Tabela -->
                    <th>NomeFantasia</th><th>Email</th><th>Cnpj</th><th>e-mail</th><th>Funções</th> <!-- Cria cabeçalho de coluna da Tabela -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listPJ as $pj): ?>
                <tr>
                    <td><?php echo $pj['NomeFantasia']; ?></td> <!-- Cria colunas/células da Tabela -->
                    <td><?php echo $pj['email']; ?></td>
                    <td><?php echo $pj['Cnpj']; ?></td>
                    <td>Sem Função</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="location.href='cadPessoaJ.php'">Voltar</button>
    </body>
</html>
