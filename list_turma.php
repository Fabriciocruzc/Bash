<?php
			//vERICA SE ESTA SENDO PASSADO A URL NA PAGINA ATUAL, SE NÃO ATRIBUI A PAGINA
			$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
			//SELECIONA TODAS AS TURMAS DA TABELA
			$consulta = mysqli_query($con, "SELECT *FROM turma");
			//CONTAR O TOTAL DE CURSOS DA TABELA
			$total_turmas = mysqli_num_rows($consulta);
			$total = mysqli_num_rows($consulta);
			//SETAR A QUANTIDADE DE TURMAS POR PAGINA
			$quant_pagina = 10 ;
			//CALCULA O NUMERO TOTAL DE PAGINAS NECESSARIAS PARA APRESENTAR AS Turmas
			$num_pagina = ceil($total_turmas/$quant_pagina);
			//CALCULA O INICIO DA VISULIZAÇÃO
			$inicio = ($quant_pagina*$pagina)-$quant_pagina;
			//SELECIONANDO AS TURMAS QUE APARECERAM NA PÁGINA
			$sql_turmas = "SELECT * FROM turma Order by nome_turma limit $inicio, $quant_pagina";
			$result_turmas = mysqli_query($con, $sql_turmas);
			$total_turmas = mysqli_num_rows($result_turmas);
			
			$consulta_instituicao = mysqli_query($con, "SELECT * FROM  instituicao Order by nome_instituicao");
			$consulta_turno = mysqli_query($con, "SELECT * FROM  turno");	
?>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Listagem</a></li>
						<li class="active">Turma</li>
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
				<h1>Turmas Cadastradas</h1>
			</div>
			
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=7"><button class="btn btn-md btn-success">
						<span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Cadastrar"></span>
					Cadastrar</button></a>		                 
				</div>
			</div>
			<hr class="divider">

				<div class="form-group">
					<div class="text-right">
						<form class="form-inline" name="pesquisar" method="GET" action="#" enctype="multipart/form-data">
							<input  name="nome" type="search" placeholder="Pesquisar" class="form-control" required/>
							<button type="submit" class="btn btn-primary"
							data-toggle="tooltip" data-placement="top" title="Realiza uma Pesquisa Com Base No Nome Informado"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</div>								
				</div><!--Fim Do Form Group-->
				<hr class="divider">

			
             <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
							<tr>
								<th>ID</th>
              					<th>Nome</th>
              					<th>Instituição</th>
              					<th>Turno</th>
              					<th>Ações</th>
              				</tr>
              			</thead>		
                        <tbody>
							
								<?php
									//SETEI UMA VARIAVÉL NO VALOR ZERO PARA TODA VEZ
									//QUE HOUVER UM REGISTRO ELA VAI INCREMENTAR
									$n = 0; 
								?>
							
						
            				<?php while($dados = mysqli_fetch_assoc($result_turmas)){ ?>
            				<?php 
							//pegando os valores das chaves estrangeiras
								$inst = $dados["instituicao_turma"];
								$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
								$result_inst = mysqli_fetch_assoc($sql_inst);
								$instituicao = utf8_encode($result_inst["nome_instituicao"]);
								
								$tn = $dados["turno_turma"];
								$sql_tn = mysqli_query($con, "SELECT turno FROM turno WHERE id = '$tn' LIMIT 1");
								$result_tn = mysqli_fetch_assoc($sql_tn);
								$turno = utf8_encode($result_tn["turno"]);
								
								?>
								<tr>
								<?php $n = $n + 1; ?>
									<td><?php echo $dados["cod_turma"]; ?></td>
									<td><?php echo utf8_encode($dados["nome_turma"]); ?></td>
            						<td><?php echo $instituicao; ?></td>
            						<td><?php echo $turno; ?></td>
            						<td>
										<a href="home.php?link=25&id=<?php echo $dados["cod_turma"]; ?>"><button class="btn btn-sm btn-primary">
											<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="Visualizar"></span>
										Visualizar</button></a>
									  
										<a href="home.php?link=24&id=<?php echo $dados["cod_turma"]; ?>"><button class="btn btn-sm btn-warning">
											<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
										Editar</button></a>
									  
										<a href="processa/proc_apag_turma.php?id=<?php echo $dados["cod_turma"]; ?>"><button class="btn btn-sm btn-danger">
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
									<a href="home.php.?link=23pagina=<?php echo $pagina_anterior ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php } ?>
							</li> 
							
							<?php 
							//APRESENTAR A PAGINAÇÃO
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="home.php?link=23&pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
									<?php } ?>
							
							<li>
							<?php
							//SETANDO PAGINA PROXIMO
								if($pagina_proximo <= $num_pagina){ ?>
									<a href="home.php?link=23&pagina=<?php echo $pagina_proximo ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php } ?>
							</li> 

							
						</ul>
					</nav>
					
				</div><!--Fim do Table Responvive-->
			</div>

			
			
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="row placeholders">
					<hr class="divider">
					<div class="col-md-12">
						<h1 align="left">Estatísticas</h1>
						<?php
							$tm = 0;
							$tv = 0;
							$tn = 0;
							$cons = mysqli_query($con, "SELECT * FROM turma");
							while($dados = mysqli_fetch_assoc($cons)){
								if($dados["turno_turma"] == 1){
									$tm = $tm + 1;
								}elseif($dados["turno_turma"] == 2){
									$tv = $tv + 1;
								}elseif($dados["turno_turma"] == 3){
									$tn = $tn + 1;
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
          ['Turno', 'Quantidade'],
          ['Matutino',  <?php echo $tm; ?>],
          ['Vespertino',      <?php echo $tv; ?>],
          ['Noturno',  <?php echo $tn; ?>]
        ]);

        var options = {
          title: 'Grafico Turma por Turno',
		     is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
		