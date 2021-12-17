<?php
require_once '../controller/cPessoaF.php';
$cadPessoa = new cPessoa();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Cadastro de Pessoa</h1>
        <form action="<?php $cadPessoa->inserir(); ?>" method="POST">
            <input type="text" name="nome" required placeholder="Nome aqui ..."/>
            <br><br>
            <input type="email" name="email" required placeholder="E-mail aqui ..."/>
            <br><br>
            <input type="email" name="endereco" required placeholder="E-mail aqui ..."/>
            <br><br>
            <input type="email" name="cpf" required placeholder="E-mail aqui ..."/>
            <br><br>
            <input type="radio" required type="M" name="sexo" id="sexo"/>Masculino
            <input type="radio"  required type="F" name="sexo" id="sexo"/>Feminino
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
            <input type="button" value="Voltar" onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="button" value="Listar Users" onclick="location.href = 'listaPessoa.php'"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>