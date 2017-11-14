<?php
			//VERICA SE ESTA SENDO PASSADO A URL NA PAGINA ATUAL, SE NÃO ATRIBUI A PAGINA
			$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
			//SELECIONA TODAS OS ALUNOS DA TABELA
			$consulta = mysqli_query($con, "SELECT *FROM discente");
			//CONTAR O TOTAL DE ALUNOS DA TABELA
			$total_alunos = mysqli_num_rows($consulta);
			$total = mysqli_num_rows($consulta);
			//SETAR A QUANTIDADE DE ALUNOS POR PAGINA
			$quant_pagina = 10 ;
			//CALCULA O NUMERO TOTAL DE PAGINAS NECESSARIAS PARA APRESENTAR OS ALUNOS
			$num_pagina = ceil($total_alunos/$quant_pagina);
			//CALCULA O INICIO DA VISULIZAÇÃO
			$inicio = ($quant_pagina*$pagina)-$quant_pagina;
			//SELECIONANDO OS ALUNOS QUE APARECERAM NA PÁGINA
			$sql_aluno = "SELECT * FROM discente Order by nome_aluno LIMIT $inicio, $quant_pagina";
			$result_alunos = mysqli_query($con, $sql_aluno);
			$total_alunos = mysqli_num_rows($result_alunos);
			
	?>
				
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Listagem</a></li>
						<li class="active">Discente</li>
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
				<h1>Alunos Matriculados</h1>
			</div>
			
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=4"><button class="btn btn-md btn-success">
						<span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Cadastrar"></span>
					Cadastrar</button></a>		                 
				</div>
			</div>
			<hr class="divider">

				<div class="form-group">
					<div class="text-right">
						<form class="form-inline" method="GET" action="home.php?link=14">
							<input  name="pesquisar" type="search" placeholder="Pesquisar" class="form-control" required/>
							<button type="submit" class="btn btn-primary"
							data-toggle="tooltip" data-placement="top" title="Realiza uma Pesquisa Com Base No Nome Informado"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</div>								
				</div><!--Fim Do Form Group--><hr>
				
             <div class="table-responsive">
				<table class="table table-striped table-hover table-condensed">		
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Instituição</th>
							<th>Turma</th>
							<th>Situação</th>
							<th>Ações</th>
							
						</tr>
					</thead>
					<tbody>	
					
						<?php
						//SETEI UMA VARIAVÉL NO VALOR ZERO PARA TODA VEZ
						//QUE HOUVER UM REGISTRO ELA VAI INCREMENTAR
						$n = 0; 
						?>
					
						<?php while($dados = mysqli_fetch_assoc($result_alunos)){ ?>
						
						<?php
						//PEGANDO OS DADOS DAS CHAVES ESTRANGEIRAS
						$inst = $dados["instituicao_aluno"];
						$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
						$result_inst = mysqli_fetch_assoc($sql_inst);
						$instituicao = utf8_encode($result_inst["nome_instituicao"]);
						
						$tm = $dados["turma_aluno"];
						$sql_turma = mysqli_query($con, "SELECT nome_turma FROM turma WHERE cod_turma = '$tm' LIMIT 1");
						$result_turma = mysqli_fetch_assoc($sql_turma);
						$turma = utf8_encode($result_turma["nome_turma"]);
						
						$st = $dados["situacao_aluno"];
						$sql_st = mysqli_query($con, "SELECT tipo FROM situacao_aluno WHERE id = '$st' LIMIT 1");
						$result_st = mysqli_fetch_assoc($sql_st);
						$situacao = utf8_encode($result_st["tipo"]);
						
						?>
						<tr>
						<?php $n = $n + 1; ?> 
							<td><?php echo $dados["cod_aluno"]; ?></td>
							<td><?php echo utf8_encode($dados["nome_aluno"]); ?></td>
							<td><?php echo $instituicao; ?></td>
							<td><?php echo $turma; ?></td>
							<td><?php echo $situacao; ?></td>
							<td>
								 <a href="home.php?link=16&id=<?php echo $dados["cod_aluno"]; ?>"><button class="btn btn-sm btn-primary">
									<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="Visualizar"></span>
								Visualizar</button></a>
							  
								<a href="home.php?link=15&id=<?php echo $dados["cod_aluno"]; ?>"><button class="btn btn-sm btn-warning">
									<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
								Editar</button></a>
                              
								<a href="processa/proc_apag_aluno.php?id=<?php echo $dados["cod_aluno"]; ?>"><button class="btn btn-sm btn-danger">
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
									<a href="home.php?link=14&pagina=<?php echo $pagina_anterior ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php } ?>
							</li> 
							
							<?php 
							//APRESENTAR A PAGINAÇÃO
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="home.php?link=14&pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
									<?php } ?>
							
							<li>
							<?php
							//SETANDO PAGINA PROXIMO
								if($pagina_proximo <= $num_pagina){ ?>
									<a href="home.php?link=14&pagina=<?php echo $pagina_proximo ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php } ?>
							</li> 

							
						</ul>
					</nav>
	
           </div><!--Fim Do Table Responsive-->
		  </div>
		   
		   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="row placeholders">
					<hr class="divider">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="col-sm-2">
								<select class="form-control">
									<option>Instituição</option>
									<option>Turma</option>
									<option selected>Sexo</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<h1 align="left">Estatísticas</h1>
						<?php
							$m = 0;
							$f = 0;
							$ni = 0;
							$cons = mysqli_query($con, "SELECT * FROM discente");
							while($dados = mysqli_fetch_assoc($cons)){
								if($dados["sexo_aluno"] == "M"){
									$m = $m + 1;
								}elseif($dados["sexo_aluno"] == "F"){
									$f = $f + 1;
								}else{
									$ni = $ni + 1;
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
          ['Sexo', 'Quantidade'],
          ['Masculino',  <?php echo $m; ?>],
          ['Feminino',      <?php echo $f; ?>],
          ['Não Informado',  <?php echo $ni; ?>]
        ]);

        var options = {
          title: 'Grafico Professor Sexo',
		     is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>