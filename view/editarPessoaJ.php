<?php
require_once '../controller/cPessoaJ.php';
$idPessoa = 0;
if (isset($_POST['updateU'])) {
    $idPessoa = $_POST['id'];
}
$cadPj = new cPessoaJ();
$pessoaJ = $cadUs->getPessoaUsId($idPessoa);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Pessoa Juridica</h1>
        <br><br>
        <form action="<?php $cadUs->updateUs(); ?>" method="POST">
            <input value="<?php echo $pessoa[0]['idPessoaJ']; ?>" type="hidden" required name="idUsuario"/>
            <br><br>
            <input value="<?php echo $pessoa[0]['nome']; ?>" type="text" required name="nome"/>
            <br><br>
            <input value="<?php echo $pessoa[0]['email']; ?>" required type="text" name="email"/>
            <br><br>
            <input value="<?php echo $pessoa[0]['telefone']; ?>" required type="text" name="telefone"/>
            <br><br><!-- comment -->
            <input value="<?php echo $pessoa[0]['endereco']; ?>" required type="text" name="endereco"/>
            <br><br>
            <input value="<?php echo $pessoa[0]['cnpj']; ?>" required type="number" name="cnpj"/>
            <br><br>
            <input value="<?php echo $pessoa[0]['nomeFantasia']; ?>" required type="text" name="nomeFantasia"/>
            <br><br>
            <input type="submit" value="Salvar" required name="updateU" />
            <input type="submit" value="Cancelar" required name="cancelarUS" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>