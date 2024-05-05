
<?php
	session_start();
	include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	
	$objUsuarios = new cliente();
	$objUsuarios->setEmail($email);
	$objUsuarios->setSenha($senha);
	
	$objUsuariosDAO = new clienteDAO();
	$retorno = $objUsuariosDAO->login($objUsuarios);
	
	if($retorno==0){
		header("location: login.php?email");
	}
	else if($retorno==1){
		header("location: login.php?senha");
	}
	else{
		$_SESSION["logadoAdm"]=true;
		header("location: adm/indexadm.php");
	}
?>