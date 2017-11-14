<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			session_start();
			
			//PEGANDO OS VALORES DO FORMULARIO
			$id = $_POST['id'];
			$nome = utf8_decode($_POST['nome']);
			$cpf = 	utf8_decode($_POST['cpf']);
			$data_nascimento = utf8_decode($_POST['data_nascimento']);
			$sexo = utf8_decode($_POST['opsexo']);
			$email = utf8_decode($_POST['email']);
			$telefone = utf8_decode($_POST['telefone_cel']);
					
			//ELIMANDO OS ERROS MAIS COMUNS DO CAMPO EMAIL
			$cpf = str_replace(" ", "", $cpf);
			$email = str_replace(" ", "", $email);
			$email = str_replace("/", "", $email);
			$email = str_replace("@.", "@", $email);
			$email = str_replace(".@", "@", $email);
			$email = str_replace(",", ".", $email);
			$email = str_replace(";", ".",$email);
			$erro = 0;
			$msg = "";
			
			//VERICA SE O CAMPO NOME ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($nome) || strlen($nome) < 10){
				$erro = 1;
				$msg = " Nome Informado é Inválido, Informe Nome Completo";
				
			}
			//VERIFICA SE O CAMPO CPF CONTEM MENOS DE 11 CARACTERES
			elseif(strlen($cpf) < 11 || strlen($cpf) > 11 || !is_numeric($cpf)){
				$erro = 1;
				$msg = " Cpf inválido, insira um cpf com 11 digitos";
			
			}
			
			//VERIFICA SE O CAMPO EMAIL ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($email) < 8 || substr_count($email, "@") != 1 || substr_count($email, ".") == 0){
				$erro = 1;
				$msg = " Email Inválido";
				
			}
			//VERIFICA SE O CAMPO TELEFONE CELULAR ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($telefone) < 8 || !is_numeric($telefone)){
				$erro = 1;
				$msg = " Telefone Celular Informado é Inválido, Não pode conter espaços";
				
			}
				//VERIFICA SE HOUVE ALGUM ERRO
				if($erro == 1){
					$_SESSION['erro'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=12&id=$id");

				}else{
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "UPDATE diretor SET 
					nome_diretor = '$nome',
					cpf_diretor = '$cpf',
					sexo_diretor = '$sexo',
					data_n_diretor = '$data_nascimento',
					email_diretor = '$email',
					telefone_diretor = '$telefone' WHERE cod_diretor = '$id'");
					
					if($sql == true){
						$msg = " Diretor alterado com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=11");	
					}else{
						$msg = " Erro ao processar alteração";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=11&id=$id");
					}	
				}
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>