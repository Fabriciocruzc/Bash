			<?php
				//PEGANDO O ID DA INSTITUIÇÃO
				$id = $_GET['id'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$consulta_disciplina = mysqli_query($con, "SELECT *FROM disciplina WHERE cod_disciplina = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($consulta_disciplina);
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Visualização</a></li>
						<li class="active">Disciplina</li>
					</ol>
			<div class="page-header">
				<h1>Disciplina - <?php echo utf8_encode($resultado["nome_disciplina"]." ID[".$resultado["cod_disciplina"]."]"); ?></h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=20"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							  
					<a href="home.php?link=21&id=<?php echo $resultado["cod_disciplina"]; ?>"><button class="btn btn-md btn-warning">
						<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
					Editar</button></a>
                              
					<a href="processa/proc_apag_disciplina.php?id=<?php echo $resultado["cod_disciplina"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-3">
					<img src="icon/icon-disciplina.png" class="img-responsive img-circle" width="100"
					data-toggle="tooltip" data-placement="bottom" title="Disciplina">
				</div>
				<div class="col-md-9">
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Id: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo $resultado['cod_disciplina']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Nome: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['nome_disciplina']); ?>
				</div>

			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Instituição: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php 
							$inst = $resultado["instituicao_disciplina"];
							$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
							$result_inst = mysqli_fetch_assoc($sql_inst);
							$instituicao = utf8_encode($result_inst["nome_instituicao"]);
							echo $instituicao; 
					?>
				</div>
			<!------------------------------------->
			<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Descrição: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['descricao_disciplina']); ?>
				</div>
				</div> <!-- Fim col -->	 
			</div> <!-- Fim row -->	 
		</div> <!-- Fim col -->	 