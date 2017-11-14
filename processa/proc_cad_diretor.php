<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			session_start();
			
			//PEGANDO OS VALORES DO FORMULARIO
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
			
			//PEGANDO O CPF DO BANCO PARA FAZER COMPARAÇÃO
			$sql =  mysqli_query($con, "Select * FROM diretor Where cpf_diretor = '$cpf'");
			
			if($sql == true ){
				$dados = mysqli_fetch_assoc($sql);
				$cpf_banco = $dados["cpf_diretor"];
			}
			
			//VERICA SE O CAMPO NOME ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($nome) || strlen($nome) < 10){
				$erro = 1;
				$msg = " Nome Informado é Inválido, Informe Nome Completo";
				
			}
			//VERIFICA SE O CAMPO CPF CONTEM MENOS DE 11 CARACTERES
			elseif(strlen($cpf) < 11 || strlen($cpf) > 11 || !is_numeric($cpf)){
				$erro = 1;
				$msg = " Cpf Inválido, Insira Um Cpf com 11 Digitos, só números";
			
			}
			//VERIFICA SE ESTE CPF FOI CADASTRADO ANTES
			elseif($cpf == $cpf_banco){
				$erro = 1;
				$msg = " Cpf já cadastrado";
					
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
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=3");

				}else{
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "INSERT INTO diretor (nome_diretor, cpf_diretor, sexo_diretor, data_n_diretor, email_diretor, telefone_diretor)
					VALUES ('$nome', '$cpf', '$sexo', '$data_nascimento', '$email', '$telefone')");
					if($sql == true){
						$msg = " Diretor Cadastrado com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=3");	
					}else{
						$msg = " Erro ao processar o cadastro";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=3");
					}	
				}
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>