<?php

session_start();

$usuario = $_POST['cpf'];
$senha = $_POST['senha'];

include "conexao.php";//inclui a conexao com o banco

$sql = mysqli_query($con, "SELECT * FROM usuario WHERE cpf = '$usuario'");//faz a pesquisa no banco
$dados = mysqli_num_rows($sql);//verica se houve algum registro inserido
//echo $dados['nome'];pega o resgistro e exibir na tela 


if($dados == 0) {//se não houver registros	
		$msg = " Usuário e senha inválidos";
		$_SESSION['erro'] = $msg;//criando uma sessão
		//setcookie("erro", "Usúario e senha inválidos");criar os cookies
		header("Location: http://localhost/Bash/index.php");//redireciona para a apagina do site
	

	}else{
		//se houver regitros mas a senha incorreta		
	$dados = mysqli_fetch_array($sql);
	
	$senha_banco = $dados["senha"]; 
	 
	 if($senha != $senha_banco){//Confere a Senha	
		$msg = " Senha incorreta";
		$_SESSION['erro'] = $msg;//criando uma sessão
		header("Location: http://localhost/Bash/index.php");//redireciona para a pagina do site
		
	}else{
		
		//se o nome e a senha estiver corretos criar as  sessões
		$cpf = utf8_encode($dados["cpf"]);
		$tipo = utf8_encode($dados["tipo"]);
		$inst = utf8_encode($dados["instituicao"]);
		$email = utf8_encode($dados["email"]);
		$nome = utf8_encode($dados["nome"]);
		//criando sessões
		$_SESSION['instituicao'] = $inst;
		$_SESSION['tipo_usu'] = $tipo;
		$_SESSION['nome_usu'] = $nome;
		$_SESSION['cpf_usu'] = $cpf;
		$_SESSION['senha_usu'] = $senha;
		
		//verifica o tipo de usuario e depois redireciona
		if($tipo == "1"){
			//administrador			
			header("Location: http://localhost/Bash/home.php?link=1");
		}elseif($tipo == "2"){
			$_SESSION['erro'] = " Pagina Diretor em manutenção ";
			header("Location: http://localhost/Bash/index.php");
			//diretor
		}elseif($tipo == "3"){
			$_SESSION['erro'] = " Pagina Professor em manutenção ";			
			header("Location: http://localhost/Bash/index.php");
			//professor
		}elseif($tipo == "4"){
			$_SESSION['erro'] = " Pagina Aluno em manutenção ";
			header("Location: http://localhost/Bash/index.php");
			//aluno
				}
			}
		}
				
	mysqli_close($con);//fecha a conexão
	
?>			