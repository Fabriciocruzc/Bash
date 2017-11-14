<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$id = $_POST['id'];
			$nome = utf8_decode($_POST['nome']);
			$cpf = utf8_decode($_POST['cpf']);
			$sexo = utf8_decode($_POST['opsexo']);
			$disciplina = utf8_decode($_POST['disciplina']);
			$escola = utf8_decode($_POST['escola']);
			$email = utf8_decode($_POST['email']);
			$telefone = utf8_decode($_POST['telefone']);

			$erro = 0;
			$msg = "";
			
			
			//VERICA SE O CAMPO NOME ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($nome) || strlen($nome) < 10){
				$erro = 1;
				$msg = " Nome Informado Inválido, Digite nome Completo";
				
			}
			//VERIFICA SE O CAMPO CPF CONTEM MENOS DE 11 CARACTERES
			elseif(strlen($cpf) < 11 || strlen($cpf) > 11 || !is_numeric($cpf)){
				$erro = 1;
				$msg = " Cpf Inválido, Insira Um Cpf com 11 Digitos, só números";
			}
		
			//VERIFICA SE FOI SELECIONADO A DISCIPLINA
			elseif($disciplina == "Selecione sua Disciplina"){
				$erro = 1;
				$msg = " Selecione Sua Disciplina";
	
			}
			
			//VERIFICA SE FOI SELECIONADO A INSTITUIÇÃO
			elseif($instituicao == "Selecione sua Instituição"){
				$erro = 1;
				$msg = " Selecione Sua Instituição";
				
			}
			
			//VERIFICA SE O CAMPO EMAIL ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($email) < 8 || substr_count($email, "@") != 1 || substr_count($email, ".") == 0){
				$erro = 1;
				$msg = " Email Inválido";
				
			}
			
			//VERIFICA SE O CAMPO TELEFONE ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($telefone) < 8 || !is_numeric($telefone)){
				$erro = 1;
				$msg = " Telefone Inválido";	
				
			}
				
				//VERIFICA SE HOUVE ALGUM ERRO
				if($erro == 1){
					$_SESSION['erro'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=18&id=$id");

				}else{
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "UPDATE docente SET 
					nome_professor = '$nome',
					cpf_professor = '$cpf',
					sexo_professor = '$sexo',
					disciplina_professor = '$disciplina',
					instituicao_professor = '$escola',
					email_professor = '$email',
					telefone_professor = '$telefone' WHERE cod_professor = '$id'");
					if($sql == true){
						$msg = " Profesor alterado com Sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=17");	
					}else{
						$msg = " Erro ao Proccesar alteração";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=18&id=$id");
					}	
				}
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>