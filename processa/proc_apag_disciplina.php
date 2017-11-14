<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$id = $_GET['id'];
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "
					DELETE FROM  disciplina WHERE cod_disciplina = '$id'"); 

					if($sql == true){
						$msg = " Discilina removida com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=20");	
					}else{
						$msg =  " Erro ao remover disciplina";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=20");
					}	
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>