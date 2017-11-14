			<?php
				//PEGANDO O ID DA INSTITUIÇÃO
				$id = $_GET['id'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$consulta_instituicao = mysqli_query($con, "SELECT *FROM  instituicao WHERE cod_instituicao = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($consulta_instituicao);
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Visualização</a></li>
						<li class="active">Instituição</li>
					</ol>
			<div class="page-header">
				<h1>Instituição - <?php echo utf8_encode($resultado["nome_instituicao"])." ID[".$resultado["cod_instituicao"]."]"; ?></h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=8"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							  
					<a href="home.php?link=9&id=<?php echo $resultado["cod_instituicao"]; ?>"><button class="btn btn-md btn-warning">
						<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
					Editar</button></a>
                              
					<a href="processa/proc_apag_instituicao.php?id=<?php echo $resultado["cod_instituicao"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<img src="img/img-instituicao.png" class="img-responsive ">
				</div>
				<div class="col-md-9">
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2">
					<b>Id: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10">
					<?php  echo $resultado['cod_instituicao']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2 bg-info">
					<b>Instituição: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10 bg-info">
					<?php  echo utf8_encode($resultado['nome_instituicao']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2">
					<b>Diretor (a): </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10">
					<?php  $dr = $resultado['diretor_instituicao'];
						$sql_dir = mysqli_query($con, "SELECT nome_diretor FROM diretor WHERE cod_diretor = '$dr' LIMIT 1");
						$result_dir = mysqli_fetch_assoc($sql_dir);
						echo utf8_encode($result_dir["nome_diretor"]);
					?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2 bg-info">
					<b>Tipo: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10 bg-info">
					<?php  
							$tipo = utf8_encode($resultado["tipo_instituicao"]);
							$sql_tipo = mysqli_query($con, "SELECT tipo FROM tipo_instituicao WHERE id = '$tipo'"); 
							$result_tipo = mysqli_fetch_assoc($sql_tipo);
							$tp = utf8_encode($result_tipo["tipo"]);
					
					echo $tp; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2">
					<b>Situação: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10">
					<?php  
							$st = utf8_encode($resultado["situacao_instituicao"]);
							$sql_st = mysqli_query($con, "SELECT tipo FROM situacao_instituicao WHERE id = '$st'"); 
							$result_st = mysqli_fetch_assoc($sql_st);
							$st = utf8_encode($result_st["tipo"]);
					echo $st; 
					?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2 bg-info">
					<b>Cidade: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10 bg-info">
					<?php  echo utf8_encode($resultado['cidade_instituicao']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2">
					<b>Estado: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10">
					<?php  echo utf8_encode($resultado['estado_instituicao']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2 bg-info">
					<b>Bairro: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10 bg-info">
					<?php  echo utf8_encode($resultado['bairro_instituicao']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2">
					<b>Complemento: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10">
					<?php  echo utf8_encode($resultado['complemento_instituicao']); ?>
				</div>
			
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2 bg-info">
					<b>Telefone: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10 bg-info">
					<?php  echo utf8_encode($resultado['telefone_instituicao']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2">
					<b>E-mail: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10">
					<?php  echo utf8_encode($resultado['email_instituicao']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-2 bg-info">
					<b>Criado em: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-10 bg-info">
					<?php  echo utf8_encode($resultado['create_instituicao']); ?>
				</div>
				
				</div><!-- fim col-->
			</div><!-- fim row-->
		</div> <!-- Fim col -->	 