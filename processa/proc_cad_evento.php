<?php

//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
include "../clas/validaSessao.php";
include "../clas/conexao.php";
$titulo = utf8_decode($_POST['titulo']);
$dataEvento = utf8_decode($_POST['dataEvento']);
$instituicao = $_SESSION['instituicao'];
$dataCriacao = date('Y-m-d');
$usuario = utf8_decode($_SESSION['nome_usu']);

$erro = 0;
$msg = "";

 //VERIFICA SE O NOME ESTÁ PREENCHIDO CORRETAMENTE
 if(empty($titulo) || strlen($titulo) < 4){
	 $msg = " Titulo informado é invalido, o titulo deve conter mais de 5 caracteres";
	 $erro = 1;
 }
 //VERIFICA SE FOI SELECIONA A INSTITUIÇÃO
 elseif($dataEvento < $dataCriacao){
	 $msg = " Data invalida, a data do evento não pode ser de datas passadas!";
	 $erro = 1;
 }

 //VERIFICA SE HOUVER ALGUM ERRO 
 if($erro == 1){
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=35");
	 
 }else{ 
 //SENÃO HOUVER ERRO 
	 $sql = mysqli_query($con, "INSERT INTO eventos(titulo, data, instituicao, usuario, data_criacao)
	 VALUES ('$titulo', '$dataEvento', '$instituicao', '$usuario', '$dataCriacao')");
	if($sql == true){
		$msg = " Evento adicionado com sucesso";
		$_SESSION['confirmacao'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=35");
	}else{
		$msg =  " Erro ao adiconar Evento";
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=35");
	}
 }

mysqli_close($con);//fecha a conexão

?>