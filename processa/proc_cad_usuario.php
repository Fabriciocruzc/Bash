<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$nome = utf8_decode($_POST['nome']);
			$cpf = utf8_decode($_POST['cpf']);
			$tipo = utf8_decode($_POST['tipo']);
			$email = utf8_decode($_POST['email']);
			$senha = utf8_decode($_POST['senha']);
			$confirma_senha = utf8_decode($_POST['confirma_senha']);
			$instituicao = utf8_decode($_POST['escola']);
			$data = date("d/m/Y H:i:s");
			
			echo "Nome: ".$nome."<br>";
			echo "Cpf: ".$cpf."<br>";
			echo "Tipo: ".$tipo."<br>";
			echo "E-mail: ".$email."<br>";
			echo "Senha: ".$senha."<br>";
			echo "Confirma Senha: ".$confirma_senha."<br>";
			echo "Escola: ".$instituicao."<br>";
			echo "Data: ".$data."<br>";
			
			//ELIMANDO OS ERRSO MAIS COMUNS DO CAMPO EMAIL
			$email = str_replace(" ", "", $email);
			$email = str_replace("/", "", $email);
			$email = str_replace("@.", "@", $email);
			$email = str_replace(".@", "@", $email);
			$email = str_replace(",", ".", $email);
			$email = str_replace(";", ".",$email);
			$erro = 0;
			$msg = "";
			
			//PEGANDO OS CPF DO BANCO PARA VERIFICA SE O CPF INFORMADO JÁ POSSUI ALGUM CADASTRO
			$sql = mysqli_query($con, "SELECT * FROM usuario WHERE cpf = '$cpf'");
			$dados = mysqli_fetch_array($sql);			
			$cpf_banco = $dados["cpf"];
					
			//VERICA SE O CAMPO NOME ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($nome) || strlen($nome) < 10){
				$erro = 1;
				$msg = " Nome informado é inválido, digite um nome valido";
				
			}
			//VERIFICA SE O CAMPO CPF CONTEM MENOS DE 11 CARACTERES
			elseif(strlen($cpf) < 11 || strlen($cpf) > 11 || !is_numeric($cpf)){
				$erro = 1;
				$msg = " Cpf inválido, insira um cpf com 11 digitos, só números";
			
			}
			//VERIFICA SE JÁ TEM ALGUM CPF CADASTRADO COM ESTE CPF INFORMADO
			elseif($cpf == $cpf_banco){
				$erro = 1;
				$msg = " Cpf já cadastrado";
			}
			
			//VERIFICA SE FOI SELECIONADO O TIPO
			elseif($tipo == "Selecione"){
				$erro = 1;
				$msg = " Selecione o tipo de usuário";
				
			}
			
			//VERIFICA SE FOI SELECIONADO O ESCOLA
			elseif($instituicao == "Selecione a Instituição"){
				$erro = 1;
				$msg = " Selecione a instituição do usuário";
			}
			
			//VERIFICA SE O CAMPO EMAIL ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($email) < 8 || substr_count($email, "@") != 1 || substr_count($email, ".") == 0){
				$erro = 1;
				$msg = " Email inválido";
				
			}
			
			//VERIFICA SE A SENHA CONTEM 6 DIGITOS
			elseif(strlen($senha) < 6 || strlen($senha) > 15){
				$erro = 1;
				$msg = " Senha inválida, a senha deve conter de 6 a 15 digitos";
			}
			elseif($senha != $confirma_senha){
				$erro = 1;
				$msg = " Senhas não coincidem";
			}
			
			
			//VERIFICA SE HOUVE ALGUM ERRO
				if($erro == 1){
					
					$_SESSION['erro'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=26");

				}else{
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					
					$sql = mysqli_query($con, "INSERT INTO usuario(nome,cpf,senha,email,tipo,instituicao,criacao,edicao)
					VALUES('$nome','$cpf','$senha','$email','$tipo','$instituicao','$data',null)");
					
					if($sql == true){
						$msg = " Usuário Cadastrado com Sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=26");	
					}else{
						$msg = " Erro ao processar cadastro";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=26");
					}	
				}
			//FECHANDO A CONEXÃO
			mysqli_close($con);
			
?>