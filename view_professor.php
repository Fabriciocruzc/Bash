			<?php
				//PEGANDO O ID DA INSTITUIÇÃO
				$id = $_GET['id'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$consulta_professor = mysqli_query($con, "SELECT *FROM docente WHERE cod_professor = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($consulta_professor);
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Visualização</a></li>
						<li class="active">Professor</li>
					</ol>
			<div class="page-header">
				<h1>Professor (a) - <?php echo utf8_encode($resultado["nome_professor"])." [".$resultado["cpf_professor"]."]"; ?></h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=17"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							  
					<a href="home.php?link=18&id=<?php echo $resultado["cod_professor"]; ?>"><button class="btn btn-md btn-warning">
						<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
					Editar</button></a>
                              
					<a href="processa/proc_apag_professor.php?id=<?php echo $resultado["cod_professor"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3">
					<img src="icon/icon-prof.png" class="img-responsive img-circle" width="150"
					data-toggle="tooltip" data-placement="bottom" title="Perfil">
				</div>
				<div class="col-md-9">
			
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Id: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo $resultado['cod_professor']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Nome: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['nome_professor']); ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3">
					<b>Cpf: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo $resultado['cpf_professor']; ?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Sexo: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo $resultado['sexo_professor']; ?>
				</div>
			
			<!------------------------------------->
				<div class="col-xs-4 col-sm-4 col-md-3">
					<b>Disciplina: </b>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-9">
					<?php  
							$dcp = $resultado["disciplina_professor"];
							$sql_dcp = mysqli_query($con, "SELECT nome_disciplina FROM disciplina WHERE cod_disciplina = '$dcp' LIMIT 1");
							$result_dcp = mysqli_fetch_assoc($sql_dcp);
							$disciplina = utf8_encode($result_dcp["nome_disciplina"]);
							echo $disciplina; 
					?>
				</div>
			<!------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Instituição: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  
							$inst = $resultado["instituicao_professor"];
							$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
							$result_inst = mysqli_fetch_assoc($sql_inst);
							$instituicao = utf8_encode($result_inst["nome_instituicao"]);
					echo $instituicao; 
					?>
				</div>
			<!------------------------------------->
			<div class="col-xs-3 col-sm-3 col-md-3">
					<b>E-mail: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					<?php  echo utf8_encode($resultado['email_professor']); ?>
				</div>
			<!----------------------------------------->
				<div class="col-xs-3 col-sm-3 col-md-3 bg-info">
					<b>Telefone: </b>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 bg-info">
					<?php  echo utf8_encode($resultado['telefone_professor']); ?>
				</div>
				
				</div> <!-- Fim col -->	 
			</div> <!-- Fim row -->	 
		</div> <!-- Fim col -->	 