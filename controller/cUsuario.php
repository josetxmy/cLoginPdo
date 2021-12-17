<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author jairb
 */
class cUsuario {

    //put your code here

    public function inserir() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pass'];

            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nome, email, pas) values (?,?,?)";
            $Statement = $pdo->prepare($sql);
//            $Statement->execute([$nome,$email,$pass]);
//            Exemplo 2 de passar os parametros no insert
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $email, PDO::PARAM_STR);
            $Statement->bindParam(3, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $Statement->execute();
            header("Location: cadUsuario.php");
            unset($Statement);
            unset($pdo);
        }
    }
    
    public function getUsuarios() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nome, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }

}
