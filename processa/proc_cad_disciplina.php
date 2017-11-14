<?php
			//INCLUINDO A VALIDAÇÃO  E INCLUINDO A CONEXAO
			include "../clas/validaSessao.php";
			include "../clas/conexao.php";
			
			session_start();
			
			//PEGANDO OS DADOS DO FORMULARIO
			$nome = utf8_decode($_POST['nome']);
			$instituicao = utf8_decode($_POST['escola']);
			$descricao = utf8_decode($_POST['descricao']);
			
			//RETIRANDO AS CARACTERES INVÁLIDAS DO CAMPO NOME
			$nome = str_replace(".", "", $nome);
			$erro = 0;
			$msg = "";
			 
			 //VERIFICA SE O NOME ESTÁ PREENCHIDO CORRETAMENTE
			 if(empty($nome) || strlen($nome) < 5){
				 $msg = " Nome Inválido, o nome deve conter no minímo 5 Caracteres";
				 $erro = 1;
			 }
			 //VERIFICA SE FOI SELECIONADA A INSTITUIÇÃO
			 elseif($instituicao == "selecione"){
				 $msg = " Selecione Uma Instituição";
				 $erro = 1;
			 }
			 //VERIFICA SE A DESCRIÇÃO FOI INFORMADA CORRETAMENTE
			 elseif(strlen($descricao) < 5){
				 $msg = " Descrição Inválida, a descrição deve conter no minino 10 Caracteres";
				 $erro = 1;
				 
			 }
			 //VERIFICA SE HOUVER ALGUM ERRO
			 if($erro == 1){
				$_SESSION['erro'] = $msg;
				header("Location: http://127.0.0.1:8080/Bash/home.php?link=6");
			 }
			 //SE NÃO HOVER ERROS
			 else{
					$sql =  mysqli_query($con, "INSERT INTO disciplina (nome_disciplina, instituicao_disciplina, descricao_disciplina) VALUES ('$nome', '$instituicao', '$descricao')");
					if($sql == true){
					$msg = " Disciplina cadastrada com sucesso ";
					$_SESSION['confirmacao'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=6");
				}else{
					$msg =" Erro ao processar cadastro da disciplina";
					$_SESSION['erro'] = $msg;
					header("Location: http://127.0.0.1:8080/Bash/home.php?link=6");
				}
			 }
			 //FECHANDO A CONEXÃO
			mysqli_close($con);
?>