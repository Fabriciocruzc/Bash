<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			//PEGANDO OS VALORES DO FORMULARIO
			$nome = utf8_decode($_POST['nome']);
			$diretor = utf8_decode($_POST['diretor']);
			$tipo = utf8_decode($_POST['tipo']);
			$situacao = utf8_decode($_POST['situacao']);
			$telefone = utf8_decode($_POST['telefone']);
			$email = utf8_decode($_POST["email"]);
			$cidade = utf8_decode($_POST['cidade']);
			$estado = utf8_decode($_POST['estado']);
			$bairro = utf8_decode($_POST['bairro']);
			$complemento = utf8_decode($_POST['complemento']);
			$data = date("d/m/Y H:i:s");

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

			//echo $nome."<br>".$diretor."<br>".$tipo."<br>".$situacao."<br>".$telefone."<br>".$cidade."<br>".$estado."<br>".$bairro."<br>".$complemento."<br>".$data;
			
			//PEGANDO O DIRETOR DO BANCO PARA FAZER COMPARAÇÃO
			$sql =  mysqli_query($con, "SELECT * FROM instituicao WHERE diretor_instituicao = '$diretor'");
			
			if($sql == true){
				$dados = mysqli_fetch_assoc($sql);
				$diretor_banco = $dados["diretor_instituicao"];
			}
			
			//VERICA SE O CAMPO NOME ESTÁ PREENCHIDO CORRETAMENTE
			if(empty($nome) || strlen($nome) < 10){
				$erro = 1;
				$msg = " Nome da Escola informado é inválido, deve ser maior que 10 Caracteres";
				
			}
			//VERIFICA SE O CAMPO DIRETOR FOI SELECIONADO
			elseif($diretor == "selecione"){
				$erro = 1;
				$msg = " Selecione um Diretor";
					
			}
			
			//VERIFICA SE O DIRETOR ESCOLHIDO JÁ É DIRETO DE OUTRA ESCOLA
			elseif($diretor == $diretor_banco){
				$erro = 1;
				$msg = " O Diretor selecionado já esta cadastrado em outra Instituição";
					
			}
			//VERIFICA SE FOI SELECIONADO O TIPO
			elseif($tipo == "selecione"){
				$erro = 1;
				$msg = " Selecione o Tipo Da Instituição";
				
			}
			//VERIFICA SE FOI SELECIONADO A SITUAÇÃO
			elseif($situacao == "selecione"){
				$erro = 1;
				$msg = " Selecione a situação da Escola";
				
			}
			//VERIFICA SE O CAMPO TELEFONE ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($telefone) < 8 || !is_numeric($telefone)){
				$erro = 1;
				$msg = " Telefone Inválido, Só pode conter Números";	
				
			}
			//VERICA SE O CAMPO CIDADE ESTÁ PREENCHIDO CORRETAMENTE
			elseif(empty($cidade) || strlen($cidade) < 4){
				$erro = 1;
				$msg = " Nome Da Cidade Informada é Inválido";
				
			}
			
			//VERIFICA SE FOI SELECIONADO O ESTADO
			elseif($estado == "selecione"){
				$erro = 1;
				$msg = " Selecione o Seu Estado";
			}
			
			//VERICA SE O CAMPO BAIRRO ESTÁ PREENCHIDO CORRETAMENTE
			elseif(empty($bairro) || strlen($bairro) < 5){
				$erro = 1;
				$msg = " Nome Do Bairro Informado é Inválido";
				
			}
			
		//VERICA SE O CAMPO COMPLEMENTO ESTÁ PREENCHIDO CORRETAMENTE
			elseif(empty($complemento) || strlen($complemento) < 4){
				$erro = 1;
				$msg = " Complemento Informado é Inválido";
				
			}
			//VERIFICA SE O CAMPO EMAIL ESTÁ PREENCHIDO CORRETAMENTE
			elseif(strlen($email) < 8 || substr_count($email, "@") != 1 || substr_count($email, ".") == 0){
				$erro = 1;
				$msg = " Email Inválido";
				
			}
				
				//VERIFICA SE HOUVE ALGUM ERRO
				if($erro == 1){
					$_SESSION['erro'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=2");

				}else{
					//SE TUDO FOI PREENCHIDO CORRETAMENTE ELE FAZ O CADASTRO NO BANCO
					$sql = mysqli_query($con, "INSERT INTO instituicao(nome_instituicao, diretor_instituicao, tipo_instituicao, situacao_instituicao, telefone_instituicao, email_instituicao, cidade_instituicao, estado_instituicao, bairro_instituicao, complemento_instituicao, create_instituicao) 
					VALUES ('$nome', '$diretor', '$tipo', '$situacao', '$telefone', '$email', '$cidade', '$estado', '$bairro', '$complemento', '$data')");
					if($sql == true){
						$msg = " Instituição cadastrada com sucesso";
						$_SESSION['confirmacao'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=2");	
					}else{
						$msg =  " Erro ao processar cadastramento";
						$_SESSION['erro'] = $msg;
						header("Location: http://127.0.0.1:8080/Bash/home.php?link=2");
					}	
				}
			//FECHANDO A CONEXÃO
			mysqli_close($con);
?>