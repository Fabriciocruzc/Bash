<?php

//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
include "../clas/validaSessao.php";
include "../clas/conexao.php";
			
session_start();
			
$nome = utf8_decode($_POST['nome']);
$instituicao = utf8_decode($_POST['escola']);
$turno = utf8_decode($_POST['turno']);

$erro = 0;
$msg = "";


 //VERIFICA SE O NOME ESTÁ PREENCHIDO CORRETAMENTE
 if(empty($nome) || strlen($nome) < 4){
	 $msg = " Nome Inválido, o nome deve conter no minímo 4 caracteres";
	 $erro = 1;
 }
 //VERIFICA SE FOI SELECIONA A INSTITUIÇÃO
 elseif($instituicao == "Selecione a Instituição"){
	 $msg = " Selecione Uma Instituição";
	 $erro = 1;
 }
 //VERIFICA SE FOI SELECIONADO O TURNO
 elseif($turno == "Selecione o Turno"){
	 $msg = " Selecione Seu Turno";
	 $erro = 1;
 }
 //VERIFICA SE HOUVER ALGUM ERRO 
 if($erro == 1){
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=7");
	 
 }else{ 
 //SENÃO HOUVER ERRO 
	 $sql = mysqli_query($con, "INSERT INTO turma(nome_turma, instituicao_turma, turno_turma)
	 VALUES ('$nome', '$instituicao', '$turno')");
	if($sql == true){
		$msg = " Turma cadastrada com sucesso";
		$_SESSION['confirmacao'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=7");
	}else{
		$msg =  " Erro ao processar cadastro";
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=7");
	}
 }

mysqli_close($con);//fecha a conexão

?>