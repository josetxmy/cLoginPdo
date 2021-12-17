<?php
require_once '../controller/cUsuario.php';
$idUsuario = 0;
if (isset($_POST['updateU'])) {
    $idUsuario = $_POST['id'];
}
$cadUs = new cUsuario();
$usuario = $cadUs->getUsuarioUsId($idUsuario);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Usuario</h1>
        <br><br>
        <form action="<?php $cadUs->updateUs(); ?>" method="POST">
            <input value="<?php echo $pessoaF[0]['idUsuario']; ?>" type="hidden" required name="idUsuario"/>
            <br><br>
            <input value="<?php echo $pessoaF[0]['nome']; ?>" type="text" required name="nome"/>
            <br><br>
            <input value="<?php echo $pessoaF[0]['email']; ?>" required type="text" name="email"/>
            <br><br>
            <input type="submit" value="Salvar" required name="updateU" />
            <input type="submit" value="Cancelar" required name="cancelarUS" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
