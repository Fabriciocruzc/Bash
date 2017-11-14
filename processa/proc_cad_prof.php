<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$nome = utf8_decode($_POST['nome']);
			$cpf = utf8_decode($_POST['cpf']);
			$sexo = utf8_decode($_POST['opsexo']);
			$disciplina = utf8_decode($_POST['disciplina']);
			$escola = utf8_decode($_POST['escola']);
			$email = utf8_decode($_POST['email']);
			$telefone = utf8_decode($_POST['telefone']);

			$erro = 0;
			$msg = "";
			
		
			
			//PEGANDO O CPF DO BANCO PARA FAZER COMPARAÇÃO
			$sql =  mysqli_query($con, "SELECT * FROM docente WHERE cpf_professor = '$cpf'");
			if($sql == true ){
			$dados = mysqli_fetch_assoc($sql);
			$cpf_banco = $dados["cpf_professor"];
			}
			
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
			elseif( $cpf == $cpf_banco){
				$erro = 1;
				$msg = " Cpf já cadastrado";
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
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=5");

				}else{
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "INSERT INTO docente(nome_professor, cpf_professor, sexo_professor, disciplina_professor, instituicao_professor, email_professor, telefone_professor) VALUES ('$nome', '$cpf', '$sexo', '$disciplina', '$escola', '$email', '$telefone')");
					if($sql == true){
						$msg = " Professor Cadastrado com Sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=5");	
					}else{
						$msg = " Erro ao Proccesar cadastro";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=5");
					}	
				}
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>