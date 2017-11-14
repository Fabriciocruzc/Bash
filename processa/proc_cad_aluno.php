<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS DADOS DO FORMULÁRIO
			$nome = utf8_decode($_POST['nome']);
			$cpf = utf8_decode($_POST['cpf']);
			$data_nascimento = utf8_decode($_POST['data_nascimento']);
			$pai = utf8_decode($_POST['pai']);
			$mae= utf8_decode($_POST['mae']);
			$sexo = utf8_decode($_POST['opsexo']);
			$instituicao = utf8_decode($_POST['escola']);
			$turma = utf8_decode($_POST['turma']);
			$situacao = utf8_decode($_POST['situacao']);
			$cidade = utf8_decode($_POST['cidade']);
			$estado = utf8_decode($_POST['estado']);
			$bairro = utf8_decode($_POST['bairro']);
			$complemento = utf8_decode($_POST['complemento']);
			$email = utf8_decode($_POST['email']);
			$telefone = utf8_decode($_POST['telefone']);
			$data = date("d/m/Y H:i:s");
			
			
			//ELIMANDO OS ERRSO MAIS COMUNS DO CAMPO EMAIL
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
			$sql_ver =  mysqli_query($con, "SELECT * FROM aluno WHERE cpf_aluno = '$cpf'");
			$dados = mysqli_fetch_assoc($sql_ver);
			$cpf_banco = $dados["cpf_aluno"];
			
			//VERICA SE O CAMPO NOME ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($nome) || strlen($nome) < 10){
				$erro = 1;
				$msg = " Nome informado é inválido";
				
			}
			//VERIFICA SE O CAMPO CPF CONTEM MENOS DE 11 CARACTERES
			elseif(strlen($cpf) < 11 || strlen($cpf) > 11 || !is_numeric($cpf)){
				$erro = 1;
				$msg = " Cpf Inválido, Insira Um Cpf com 11 Digitos, só números";
			}
			//VERIFICA SE ESTE CPF FOI CADASTRADO ANTES
			elseif($cpf == $cpf_banco){
				$erro = 1;
				$msg = " Aluno já Cadastrado com este Cpf";
					
			}
			//VERICA SE O CAMPO PAI ESTÁ PREENCHIDO CORRETAMENTE
			elseif(empty($pai) || strlen($pai) < 5){
				$erro = 1;
				$msg = " Nome do Pai Informado é Inválido, Informe o Nome Completo";
				
			}
			//VERICA SE O CAMPO MÃE ESTÁ PREENCHIDO CORRETAMENTE
			elseif(empty($mae) || strlen($mae) < 5){
				$erro = 1;
				$msg = " Nome da Mãe Informado é Inválido, Informe o Nome Completo";
				
			}
			//VERIFICA SE FOI SELECIONADO A INSTITUIÇÃO
			elseif($instituicao == "Selecione a Instituição"){
				$erro = 1;
				$msg = " Selecione Sua Instituição";
				
			}
			//VERIFICA SE FOI SELECIONADO A TURMA
			elseif($instituicao == "Selecione a Turma"){
				$erro = 1;
				$msg = " Selecione Sua Turma";
				
			}

			//VERIFICA SE FOI SELECIONADO A SITUAÇÃO DA MATRICULA
			elseif($situacao == "Selecione a Situação da Matricula"){
				$erro = 1;
				$msg = " Selecione a situação da Matricula";
				
			}
			
			//VERICA SE O CAMPO CIDADE ESTÁ PREENCHIDO CORRETAMENTE
			elseif(empty($cidade) || strlen($cidade) < 5){
				$erro = 1;
				$msg = " Cidade Informada é Inválida";
				
			}
			//VERIFICA SE FOI SELECIONADO A SITUAÇÃO DA MATRICULA
			elseif($estado == "Selecione"){
				$erro = 1;
				$msg = " Selecione o estado";
				
			}
			
			//VERICA SE O CAMPO BAIRRO ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($bairro) || strlen($bairro) < 2){
				$erro = 1;
				$msg = " Bairro Informado é Inválido";
				
			}
			
			//VERICA SE O CAMPO BAIRRO ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($complemento) || strlen($complemento) < 2){
				$erro = 1;
				$msg = " Complemento Informado é Inválido";
				
			}
			
			//VERIFICA SE O CAMPO EMAIL ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($email) < 8 || substr_count($email, "@") != 1 || substr_count($email, ".") == 0){
				$erro = 1;
				$msg = " Email Inválido";
				
			}
			//VERIFICA SE O CAMPO TELEFONE_CEL ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($telefone) < 8 || !is_numeric($telefone)){
				$erro = 1;
				$msg = " Telefone Inválido";
			
			}
			
				//VERICA SE HOUVE ALGUM ERRO
				if($erro == 1){
					$_SESSION['erro'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=4");

				}else{
					//SE NÃO HOUVER ERROS  
					$sql =  mysqli_query($con, "INSERT INTO discente(nome_aluno, cpf_aluno, sexo_aluno, data_n_aluno, pai_aluno, mae_aluno, turma_aluno, instituicao_aluno, situacao_aluno, email_aluno, telefone_aluno, cidade_aluno, estado_aluno, bairro_aluno, complemento_aluno, create_aluno)
			 VALUES ('$nome', '$cpf', '$sexo', '$data_nascimento', '$pai', '$mae',  '$turma', '$instituicao', '$situacao', '$email', '$telefone', '$cidade', '$estado', '$bairro', '$complemento', '$data')");

					if($sql == true){
						$msg = " Aluno matriculado com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=4");
					}else{
						$msg = " Erro ao processar cadastro";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=4");
						}
				}
			mysqli_close($con);//fecha a conexão
?>