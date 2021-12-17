<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author admin
 */
class cUsuario {

    public function inserir() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $cnpj = $_POST['cnpj'];
            $nomeFantasia = $_POST['nomeFantasia'];
            
            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nome, email, endereco, telefone, cnpj, nomeFantasia) values (?,?,?,?,?,?)";
            $Statement = $pdo->prepare($sql);
//          $Statement->execute([$nome, $email,$pass]);
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $email, PDO::PARAM_STR);
            $Statement->bindParam(3, $telefone, PDO::PARAM_STR);
            $Statement->bindParam(4, $endereco, PDO::PARAM_STR);
            $Statement->bindParam(5, $cnpj, PDO::PARAM_STR);
            $Statement->bindParam(6, $nomeFantasia, PDO::PARAM_STR);
            $Statement->execute();
            header("Location: cadUsuario.php");
            unset($Statement);
            unset($pdo);
        }
    }

    public function getPessoasJ() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, email, telefone, endereco, cnpj, nomeFantasia from pessoa";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }

    public function salvarUS() {
        if (isset($_POST['salvarUS'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass);

            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }

            $getNome = $_POST['nome'];
            $getEmail = $_POST['email'];
            $getTelefone = $_POST['telefone'];
            $getEndereco = $_POST['endereco'];
            $getCpf = $_POST['cpf'];
            $getSexo = $_POST['sexo'];
            
            $sql = "insert into `pessoa´´ (`nome`,`email`,`telefone`,`endereco`,`cpf`,`sexo`) values ('$getNome','$getEmail'"
                    . ",'$getTelefone','$getEndereco','$getCpf','$getsexo')";
            mysqli_select_db($conexao, 'inf4t211');
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao inserir: ' . mysqli_error($conexao));
            }

            mysqli_close($conexao);
        }
    }

    public function getAllPessoaUS() {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {
            die('Sem conexão: ' . mysqli_error());
        }

        $sql = "select * from pessoa";
        $result = mysqli_query($conexao, $sql);
        $pfsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pfsBD, $row);
            }
            $_REQUEST['pessoaUS'] = $pfsBD;
        } else {
            $_REQUEST['pessoaUS'] = 0;
        }
        mysqli_close($conexao);
    }

    public function deletarUS() {
        if (isset($_POST['Deletar'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }
            $id = $_POST['id'];
            $sql = "delete from usuario where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die('Erro ao deletar: ' . mysql_error($conexao));
            }
            echo 'Registro deletado com sucesso!';
            mysqli_close($conexao);
            header('Refresh: 0');
        }
    }

    public function gePessoaUsId($id) {

        $bdHost = 'localhost';

        $bdUser = 'root';

        $bdPass = '';

        $schema = 'inf4t211';

        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {

            die('Sem conexão: ' . mysqli_error());
        }

        $sql = "select * from pessoa where idPessoa = $id";

        $result = mysqli_query($conexao, $sql);

        $ulpUS = [];

        if ($result) {

            while ($row = mysqli_fetch_assoc($result)) {

                array_push($ulpUS, $row);
            }

            return $ulpUS;
        }

        mysqli_close($conexao);
    }

    Public function updateUs() {
        if (isset($_POST['updateUS'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }
            $getNome = $_POST['nome'];
            $getEmail = $_POST['email'];
            $getTelefone = $_POST['telefone'];
            $getEndereco = $_POST['endereco'];
            $getCpf = $_POST['cpf'];
            $getSexo = $_POST['sexo'];

            $sql = "UPDATE `pessoa` SET `nome`='$getNome',`email`='$getEmail',`telefone`='$getTelefone',`endereco`='$getEndereco'"
                    . ",`cpf`='$getCpf',`sexo`='$getSexo',WHERE `idPessoa`='$getIdPessoa'";
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die("Erro ao atualizar. pessoa " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: cadPessoa.php');
        }
        if (isset($_POST['cancelarUP'])) {
            header('location: cadPessoa.php');
        }
    }

}