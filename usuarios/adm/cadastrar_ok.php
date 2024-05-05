<?php
session_start();
if (!isset($_SESSION['logadoAdm'])) {
    header("Location: ../login.php");
    exit();
}

include_once "../../class/cliente.class.php";
include_once "../../class/cliente.DAO.class.php";

function detectSQL($input) {
    $keywords = ['OR', 'AND', 'IF', 'THEN', 'ELSE', 'WHEN', 'SELECT', 'INSERT', 'UPDATE', 'DELETE', 'DROP', 'EXEC', 'UNION', 'WHERE', 'JOIN'];
    $upperInput = strtoupper($input);

    foreach ($keywords as $keyword) {
        if (strpos($upperInput, $keyword) !== false) {
            return true;
        }
    }
    return false;
}

function senhaCharEsp($password) {
    if(preg_match('/[\/;:\(\)\*]/', $password)){
        return true;
    }
    return false;
}

function senhaCurto($password) {
    if(strlen($password) < 8){
        return true;
    }
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (senhaCharEsp($senha)) {
    header('Location: cadastro.php?errochar');
    exit();
}

if (detectSQL($senha)) {
    header('Location: cadastro.php?errosql');
    exit();
}

if (senhaCurto($senha)) {
    header('Location: cadastro.php?errocurto');
    exit();
}

$objCliente = new cliente();
$objCliente->setNome($nome);
$objCliente->setEmail($email);
$objCliente->setSenha($senha);
$objCliente->setAdm(true);

$objClienteDao = new clienteDAO();
$retorno = $objClienteDao->inserir($objCliente);

if ($retorno) {
    header("Location: indexadm.php?ok");
    exit();
} else {
    header("Location: cadastro.php?errodb");
    exit();
}
?>
