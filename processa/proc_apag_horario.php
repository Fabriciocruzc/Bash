<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$instituicao = $_GET['instituicao'];
			$turma = $_GET['turma'];
			$ano = $_GET['ano'];
			

					$sql = mysqli_query($con, "
					DELETE FROM horario WHERE instituicao = '$instituicao' AND turma = '$turma' AND ano = '$ano' LIMIT 5");
							

					if($sql == true){
						$msg = " horário removido com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=31");	
					}else{
						$msg =  " Erro ao remover Horário";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=31");
					}	
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>