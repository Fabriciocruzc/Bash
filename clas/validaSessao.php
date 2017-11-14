<?php

session_start();
include "conexao.php";

if(isset($_SESSION['cpf_usu']))
	$cpf_usu = $_SESSION['cpf_usu'];
if(isset($_SESSION['senha_usu']))
	$senha_usu = $_SESSION['senha_usu'];
if(!(empty($cpf_usu) OR empty($senha_usu))){
		
		$pesquisa = mysqli_query($con, "SELECT * FROM usuario WHERE cpf = '$cpf_usu'");
		if(mysqli_num_rows($pesquisa) == 1){
				$dados = mysqli_fetch_array($pesquisa);
				$senha_bd = $dados['senha'];
				if($senha_bd != $senha_usu){
					unset  ($_SESSION['cpf_usu']);
					unset ($_SESSION['senha_usu']);
					$_SESSION['erro'] = " Área Restrita<br>Efetue o <b>LOGIN!</b>";
					header("Location: http://127.0.0.1:8080/Bash/index.php");
				}
		}else{
			unset ($_SESSION['cpf_usu']);
			unset ($_SESSION['senha_usu']);
			$_SESSION['erro'] = " Área Restrita<br>Efetue o <b>LOGIN!</b>";
			header("Location: http://127.0.0.1:8080/Bash/index.php");
		}
	}else{
			$_SESSION['erro'] = " Área Restrita<br>Efetue o <b>LOGIN!</b>";
			header("Location: http://127.0.0.1:8080/Bash/index.php");
	}
	mysqli_close($con);
?>