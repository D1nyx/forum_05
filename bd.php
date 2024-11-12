<?php

function ligarBD(){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $nomebd = "bdforum";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$nomebd", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Erro no acesso à base de dados: " . $e->getMessage();
        return null;
    }
}

    function autenticarUtilizador($username, $password){
        $conn = ligarBD();
        if($conn == null)return 0;
        $password = md5($password);
        $sql = 'SELECT idutilizador, utilizador, tipo FROM t_utilizador ';
        $sql .= ' WHERE utilizador="'.$username.'" AND senha = "'.$password.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;
        if($stmt->rowCount() == 1){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        }
        else{
            return null;
        }
    }

    function consultarBD($sql){
        $conn = ligarBD();
        if($conn == null)return null;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rs = $stmt->fetchAll();
        $conn = null;
        return $rs;
    }
?>