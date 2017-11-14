<?php

//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
include "../clas/validaSessao.php";
include "../clas/conexao.php";
			
session_start();
			
$id = $_POST['id'];
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
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=24&id=$id");
	 
 }else{ 
 //SENÃO HOUVER ERRO 
	 $sql = mysqli_query($con, "UPDATE turma SET 
	 nome_turma = '$nome',
	 instituicao_turma = '$instituicao',
	 turno_turma = '$turno' WHERE cod_turma = '$id'");
	if($sql == true){
		$msg = " Turma alterada com sucesso";
		$_SESSION['confirmacao'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=23");
	}else{
		$msg =  " Erro ao processar alteração";
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=24&id=$id");
	}
 }

mysqli_close($con);//fecha a conexão

?>