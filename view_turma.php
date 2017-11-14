			<?php
				//PEGANDO O ID DA INSTITUIÇÃO
				$id = $_GET['id'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$consulta_turma = mysqli_query($con, "SELECT *FROM turma WHERE cod_turma = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($consulta_turma);
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Visualização</a></li>
						<li class="active">Turma</li>
					</ol>
			<div class="page-header">
				<h1>Turma - <?php echo utf8_encode($resultado["nome_turma"]." ID[".$resultado["cod_turma"]."]"); ?></h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=23"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							  
					<a href="home.php?link=24&id=<?php echo $resultado["cod_turma"]; ?>"><button class="btn btn-md btn-warning">
						<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
					Editar</button></a>
                              
					<a href="processa/proc_apag_turma.php?id=<?php echo $resultado["cod_turma"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-3">
					<img src="icon/icon-lista.png" class="img-responsive " width="100"
					data-toggle="tooltip" data-placement="bottom" title="Turma">
				</div>
				<div class="col-md-9">
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Id: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo $resultado['cod_turma']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Nome: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['nome_turma']); ?>
				</div>

			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Instituição: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php 
							$inst = $resultado["instituicao_turma"];
							$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
							$result_inst = mysqli_fetch_assoc($sql_inst);
							$instituicao = utf8_encode($result_inst["nome_instituicao"]);
							echo $instituicao; 
					?>
				</div>
			<!------------------------------------->
			<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Turno: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php
						$tn = $resultado['turno_turma']; 
						$sql_tn = mysqli_query($con, "SELECT turno FROM turno WHERE id = '$tn' LIMIT 1");
						$result_tn = mysqli_fetch_assoc($sql_tn);
						$turno = utf8_encode($result_tn["turno"]);
						echo $turno; 
					?>
				</div>
				
				</div> <!-- Fim col -->	 
			</div> <!-- Fim row -->	 
		</div> <!-- Fim col -->	 