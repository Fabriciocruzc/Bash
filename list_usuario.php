<?php

			//vERICA SE ESTA SENDO PASSADO A URL NA PAGINA ATUAL, SE NÃO ATRIBUI A PAGINA
			$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
			//SELECIONA TODOS OS USUARIOS DA TABELA
			$consulta = mysqli_query($con, "SELECT *FROM usuario");
			//CONTAR O TOTAL DE USUARIOS DA TABELA
			$total_usuarios = mysqli_num_rows($consulta);
			$total = mysqli_num_rows($consulta);
			//SETAR A QUANTIDADE DE USUARIOS POR PAGINA
			$quant_pagina = 10 ;
			//CALCULA O NUMERO TOTAL DE PAGINAS NECESSARIAS PARA APRESENTAR OS USUARIOS
			$num_pagina = ceil($total_usuarios/$quant_pagina);
			//CALCULA O INICIO DA VISULIZAÇÃO
			$inicio = ($quant_pagina*$pagina)-$quant_pagina;
			//SELECIONANDO OS USUARIOS QUE APARECERAM NA PÁGINA
			$sql_usuarios = "SELECT * FROM usuario  Order by nome limit $inicio, $quant_pagina";
			$result_usuarios = mysqli_query($con, $sql_usuarios);
			$total_usuarios = mysqli_num_rows($result_usuarios);
			
			$consulta_tipo_usuario = mysqli_query($con, "SELECT * FROM tipo_usuario");
			$consulta_instituicao = mysqli_query($con, "SELECT * FROM  instituicao");
	
?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Listagem</a></li>
						<li class="active">Usuários</li>
					</ol>
			<?php			 
							  if(!(empty($_SESSION['erro']))){
								echo "<html><body>";
									echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
										echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
										<span aria-hidden=\"true\">&times;</span></button>";
										echo "<h5 align=\"center\">";
										echo "<span class=\"glyphicon glyphicon-exclamation-sign\"> </span>";
										echo $_SESSION['erro'];
										unset ($_SESSION['erro']);	
										echo "</h5>";
									echo "</div>";
								echo "</body> </html>";
							  }else{
								if(!(empty($_SESSION['confirmacao']))){
								echo "<html><body>";
									echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
										echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
										<span aria-hidden=\"true\">&times;</span></button>";
										echo "<h5 align=\"center\">";
										echo "<span class=\"glyphicon glyphicon-ok\"> </span>";
										echo $_SESSION['confirmacao'];
										unset ($_SESSION['confirmacao']);	
										echo "</h5>";
									echo "</div>";
								echo "</body> </html>";
							  }  
								  
							  }
			?>
			
			<div class="page-header">
				<h1>Usuários Cadastrados</h1>
			</div>
			
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=26"><button class="btn btn-md btn-success">
						<span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Cadastrar"></span>
					Cadastrar</button></a>		                 
				</div>
			</div>
			<hr class="divider">

            <div class="form-group">
				<div class="text-right">
					<form class="form-inline" method="GET" action="pesquisa_usuarios.php">
						<input  name="pesquisar" type="search" placeholder="Pesquisar" class="form-control" required/>
						<button type="submit" class="btn btn-primary" 
						data-toggle="tooltip" data-placement="top" title="Realiza uma Pesquisa Com Base No Nome Informado"
						><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</div>								
			</div><!--Fim Do Form Group--><hr>
			 
             <div class="table-responsive">
                 <table class="table table-striped table-hover table-condensed">		
                     <thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Cpf</th>
							<th>Tipo</th>
							<th>E-mail</th>
						</tr>
					</thead>		
                    <tbody>	
					
						<?php
						//SETEI UMA VARIAVÉL NO VALOR ZERO PARA TODA VEZ
						//QUE HOUVER UM REGISTRO ELA VAI INCREMENTAR
						$n = $total_usuarios;
						$tipo_admin = 0;
						$tipo_diretor = 0;
						$tipo_professor = 0;
						$tipo_aluno = 0;
						?>
						
            			<?php while($dados = mysqli_fetch_assoc($result_usuarios)){ ?>
            			<?php
								$tp = $dados["tipo"];
								$sql_tp = mysqli_query($con, "SELECT tipo FROM tipo_usuario WHERE id = '$tp' LIMIT 1");
								$result_tp = mysqli_fetch_assoc($sql_tp);
								$tipo = utf8_encode($result_tp["tipo"]);
						?>
						<tr>
							<td><?php echo $dados["id"]; ?></td>
							<td><?php echo utf8_encode($dados["nome"]); ?></td>
            				<td><?php echo utf8_encode($dados["cpf"]); ?></td>
            				<td><?php echo $tipo; ?></td>
            				<td><?php echo utf8_encode($dados["email"]); ?></td>			
                            <td>
							
										<a href="home.php?link=29&id=<?php echo $dados["id"]; ?>"><button class="btn btn-sm btn-primary">
											<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="Visualizar"></span>
										Visulaizar</button></a>
									  
										<a href="home.php?link=28&id=<?php echo $dados["id"]; ?>"><button class="btn btn-sm btn-warning">
											<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
										Editar</button></a>
									  
										<a href="processa/proc_apag_usuario.php?id=<?php echo $dados["id"]; ?>"><button class="btn btn-sm btn-danger">
											<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
										Remover</button></a>
							
							</td>
						</tr>	
							
          				<?php } ?>	
            		</tbody>			  
            	</table>
				
				<?php 
					echo " <p align=\"center\" style=\"color:#000; font-size:12px;\">
					Mostrando ".$n." Registro no Total de ".$total."
					</p>"; 	
				?>
				
				<?php
						//VERIFICA A PAGINA ANTERIOR E PROXIMO
						$pagina_anterior =  $pagina - 1;
						$pagina_proximo = $pagina + 1;
					?>
					<nav class="text-center">
						<ul class="pagination">
							<li>
							<?php
							//SETANDO PAGINA ANTERIOR
								if($pagina_anterior != 0){ ?>
									<a href="home.php?link=27&pagina=<?php echo $pagina_anterior ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php } ?>
							</li> 
					
							<?php 
							//APRESENTAR A PAGINAÇÃO
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="home.php?link=27&pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
									<?php } ?>
							<li>
							<?php
							//SETANDO PAGINA PROXIMO
								if($pagina_proximo <= $num_pagina){ ?>
									<a href="home.php?link=27&pagina=<?php echo $pagina_proximo ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php } ?>
							</li> 	
						</ul>
					</nav>			 
				</div>
		</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="row placeholders">
					<hr class="divider">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h1 align="left">Estatísticas</h1>
						<?php
							$cons = mysqli_query($con, "SELECT * FROM usuario");
							while($dados = mysqli_fetch_assoc($cons)){
								if($dados["tipo"] == 1){
									$tipo_admin = $tipo_admin + 1;
								}elseif($dados["tipo"] == 2){
									$tipo_diretor = $tipo_diretor + 1;
								}elseif($dados["tipo"] == 3){
									$tipo_professor = $tipo_professor + 1;
								}elseif($dados["tipo"] == 4){
									$tipo_aluno = $tipo_aluno + 1;
								}
							}
						?>
						<div id="piechart_3d" style="width: 1000px; height: 600px;"></div>
					</div>
				</div>
			</div>	
	
	<script type="text/javascript" src="js/google_charts.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tipo', 'Quantidade'],
          ['Administrador',  <?php echo $tipo_admin; ?>],
          ['Diretor',      <?php echo $tipo_diretor; ?>],
          ['Professor',  <?php echo $tipo_professor; ?>],
          ['Aluno', <?php echo $tipo_aluno; ?>]
        ]);

        var options = {
          title: 'Grafico do Usuário por Tipo',
		     is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
		