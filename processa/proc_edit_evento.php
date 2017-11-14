<?php

//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
include "../clas/validaSessao.php";
include "../clas/conexao.php";
$id = $_POST['id'];
$titulo = utf8_decode($_POST['titulo']);
$dataEvento = utf8_decode($_POST['dataEvento']);
$dataModificacao = date('Y-m-d');

$erro = 0;
$msg = "";


 //VERIFICA SE O NOME ESTÁ PREENCHIDO CORRETAMENTE
 if(empty($titulo) || strlen($titulo) < 4){
	 $msg = " Titulo informado é invalido, o titulo deve conter mais de 5 caracteres";
	 $erro = 1;
 }

 //VERIFICA SE HOUVER ALGUM ERRO 
 if($erro == 1){
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=35");
	 
 }else{ 
 //SENÃO HOUVER ERRO 
	 $sql = mysqli_query($con, "UPDATE eventos SET 
	 titulo = '$titulo', 
	 data = '$dataEvento',
	 data_modificacao = '$dataModificacao'
	 WHERE id = '$id'");
	if($sql == true){
		$msg = " Evento Alterado";
		$_SESSION['confirmacao'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=35");
	}else{
		$msg =  " Erro ao alterar Evento";
		$_SESSION['erro'] = $msg;
		header("Location: http://127.0.0.1:8080/Bash/home.php?link=35");
	}
 }

mysqli_close($con);//fecha a conexão

?>