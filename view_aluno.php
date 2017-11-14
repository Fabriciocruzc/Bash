			<?php
				//PEGANDO O ID DA INSTITUIÇÃO
				$id = $_GET['id'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$consulta_aluno = mysqli_query($con, "SELECT *FROM  discente WHERE cod_aluno = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($consulta_aluno);
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Visualização</a></li>
						<li class="active">Discente</li>
					</ol>
			<div class="page-header">
				<h1>Aluno - <?php echo utf8_encode($resultado["nome_aluno"])." [".$resultado["cpf_aluno"]."]";?></h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=14"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							  
					<a href="home.php?link=15&id=<?php echo $resultado["cod_aluno"]; ?>"><button class="btn btn-md btn-warning">
						<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
					Editar</button></a>
                              
					<a href="processa/proc_apag_aluno.php?id=<?php echo $resultado["cod_aluno"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-3">
					<img src="icon/icon-aluno.png" class="img-responsive img-circle" width="150" 
					data-toggle="tooltip" data-placement="bottom" title="Perfil">
				</div>
				<div class="col-md-9">
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Id: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo $resultado['cod_aluno']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Nome: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['nome_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Cpf: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo $resultado['cpf_aluno']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Sexo: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo $resultado['sexo_aluno']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>DN: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo inverteData($resultado['data_n_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Pai: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['pai_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Mãe: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo utf8_encode($resultado['mae_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Turma: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php
						$tm = $resultado["turma_aluno"];
						$sql_turma = mysqli_query($con, "SELECT nome_turma FROM turma WHERE cod_turma = '$tm' LIMIT 1");
						$result_turma = mysqli_fetch_assoc($sql_turma);
						$turma = utf8_encode($result_turma["nome_turma"]);
						echo $turma; 
					?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Intituição: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php 
						$inst = $resultado["instituicao_aluno"];
						$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
						$result_inst = mysqli_fetch_assoc($sql_inst);
						$instituicao = utf8_encode($result_inst["nome_instituicao"]);
						echo $instituicao;

					?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Situação: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php
						$st = $resultado["situacao_aluno"];
						$sql_st = mysqli_query($con, "SELECT tipo FROM situacao_aluno WHERE id = '$st' LIMIT 1");
						$result_st = mysqli_fetch_assoc($sql_st);
						$situacao = utf8_encode($result_st["tipo"]);					
						echo $situacao; 
					?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>E-mail: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo utf8_encode($resultado['email_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Telefone: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['telefone_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Cidade: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo utf8_encode($resultado['cidade_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Estado: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['estado_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Bairro: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo utf8_encode($resultado['bairro_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Complemento: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['complemento_aluno']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Data da Matricula: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo utf8_encode($resultado['create_aluno']); ?>
				</div>
				
				</div> <!-- Fim col -->	 
			</div> <!-- Fim row -->	 
		</div> <!-- Fim col -->	 