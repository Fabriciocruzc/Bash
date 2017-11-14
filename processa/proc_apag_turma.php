<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$id = $_GET['id'];
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "
					DELETE FROM  turma WHERE cod_turma = '$id'"); 

					if($sql == true){
						$msg = " Turma removida com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=23");	
					}else{
						$msg =  " Erro ao remover Turma";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=23");
					}	
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>