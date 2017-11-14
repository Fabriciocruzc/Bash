<?php

//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
include "../clas/validaSessao.php";
include "../clas/conexao.php";
						
$instituicao = utf8_decode($_POST['escola']);
$turma = utf8_decode($_POST['turma']);
$ano = utf8_decode($_POST['ano']);

$h1 = $_POST['h1']; $s1 = $_POST['s1']; $t1 = $_POST['t1']; $qua1 = $_POST['qua1']; $quin1 = $_POST['quin1']; $sex1 = $_POST['sex1']; 
$h2 = $_POST['h2']; $s2 = $_POST['s2']; $t2 = $_POST['t2']; $qua2 = $_POST['qua2']; $quin2 = $_POST['quin2']; $sex2 = $_POST['sex2']; 
$h3 = $_POST['h3']; $s3 = $_POST['s3']; $t3 = $_POST['t3']; $qua3 = $_POST['qua3']; $quin3 = $_POST['quin3']; $sex3 = $_POST['sex3']; 
$h4 = $_POST['h4']; $s4 = $_POST['s4']; $t4 = $_POST['t4']; $qua4 = $_POST['qua4']; $quin4 = $_POST['quin4']; $sex4 = $_POST['sex4']; 
$h5 = $_POST['h5']; $s5 = $_POST['s5']; $t5 = $_POST['t5']; $qua5 = $_POST['qua5']; $quin5 = $_POST['quin5']; $sex5 = $_POST['sex5'];
/*
echo "Instituição: ".$instituicao."  Turma: ".$turma."<br>";
echo "-----------------------------------------------------<br>";
echo "Horario - Segunda - Terça - Quarta - Quinta -  Sexta <br>";
echo $h1."---------".$s1."--------".$t1."--------".$qua1."--------".$quin1."--------".$sex1."<br>"; 
echo $h2."---------".$s2."--------".$t2."--------".$qua2."--------".$quin2."--------".$sex2."<br>"; 
echo $h3."---------".$s3."--------".$t3."--------".$qua3."--------".$quin3."--------".$sex3."<br>"; 
echo $h4."---------".$s4."--------".$t4."--------".$qua4."--------".$quin4."--------".$sex4."<br>"; 
echo $h5."---------".$s5."--------".$t5."--------".$qua5."--------".$quin5."--------".$sex5."<br>"; 
*/

$erro = 0;
$msg = "";
$verifica = mysqli_query($con, "SELECT * FROM horario WHERE turma = '$turma'");
$result = mysqli_num_rows($verifica);
if($result > 0){
	$msg = " Turma selecionada já possui horário";
	$_SESSION['erro'] = $msg;
	header("Location: http://127.0.0.1:8080/Bash/home.php?link=30");
}else{

$sql = mysqli_query($con, "INSERT INTO horario(instituicao, turma, ano, horario, segunda, terca, quarta, quinta, sexta)
VALUES ('$instituicao', '$turma', '$ano', '$h1', '$s1', '$t1', '$qua1', '$quin1', '$sex1'),
('$instituicao', '$turma', '$ano', '$h2', '$s2', '$t2', '$qua2', '$quin2', '$sex2'),
('$instituicao', '$turma', '$ano', '$h3', '$s3', '$t3', '$qua3', '$quin4', '$sex3'),
('$instituicao', '$turma', '$ano', '$h4', '$s4', '$t4', '$qua4', '$quin4', '$sex4'),
('$instituicao', '$turma', '$ano', '$h5', '$s5', '$t5', '$qua5', '$quin5', '$sex5')");

if($sql == true){
	$msg = " Horario Adicionado com sucesso";
	$_SESSION['confirmacao'] = $msg;
	header("Location: http://127.0.0.1:8080/Bash/home.php?link=30");
}else{
	$msg = " Erro ao Adcionar horario";
	$_SESSION['erro'] = $msg;
	header("Location: http://127.0.0.1:8080/Bash/home.php?link=30");
}
}

mysqli_close($con);//fecha a conexão

?>