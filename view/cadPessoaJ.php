<?php
require_once '../controller/cPessoaJ.php';
$cadPessoaJ = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Cadastro de Pessoa</h1>
        <form action="<?php $cadPessoaJ->inserir(); ?>" method="POST">
            <input type="text" name="nome" required placeholder="Nome aqui ..."/>
            <br><br>
            <input type="email" name="email" required placeholder="E-mail aqui ..."/>
            <br><br>
             <input type="email" name="telefone" required placeholder="telefone aqui ..."/>
            <br><br>
            <input type="email" name="endereco" required placeholder="endereco aqui ..."/>
            <br><br>
            <input type="email" name="cnpj" required placeholder="cnpj aqui ..."/>
            <br><br>
            <input type="email" name="nomeFantasia" required placeholder="Nome Fantasia aqui ..."/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
            <input type="button" value="Voltar" onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="button" value="Listar Users" onclick="location.href = 'listaPessoaJ.php'"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
