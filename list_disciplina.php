<?php

			//vERICA SE ESTA SENDO PASSADO A URL NA PAGINA ATUAL, SE NÃO ATRIBUI A PAGINA
			$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
			//SELECIONA TODAS AS DISCIPLINAS DA TABELA
			$consulta = mysqli_query($con, "SELECT *FROM disciplina");
			//CONTAR O TOTAL DE DISCIPLINAS DA TABELA
			$total_disciplinas = mysqli_num_rows($consulta);
			$total = mysqli_num_rows($consulta);
			//SETAR A QUANTIDADE DE DISCIPLINA POR PAGINA
			$quant_pagina = 10 ;
			//CALCULA O NUMERO TOTAL DE PAGINAS NECESSARIAS PARA APRESENTAR AS DISCIPLINAS
			$num_pagina = ceil($total_disciplinas/$quant_pagina);
			//CALCULA O INICIO DA VISULIZAÇÃO
			$inicio = ($quant_pagina*$pagina)-$quant_pagina;
			//SELECIONANDO AS DISCIPLINAS QUE APARECERAM NA PÁGINA
			$sql_disciplinas = "SELECT * FROM disciplina Order by nome_disciplina limit $inicio, $quant_pagina";
			$result_disciplinas = mysqli_query($con, $sql_disciplinas);
			$total_disciplinas = mysqli_num_rows($result_disciplinas);
			$consulta_instituicao = mysqli_query($con, "SELECT * FROM  instituicao");

?>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Listagem</a></li>
						<li class="active">Disciplina</li>
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
				<h1>Disciplinas Cadastradas</h1>
			</div>
			
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=6"><button class="btn btn-md btn-success">
						<span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Cadastrar"></span>
					Cadastrar</button></a>		                 
				</div>
			</div>
			<hr class="divider">
		
				<div class="form-group">
					<div class="text-right">
						<form class="form-inline" method="GET" action="#">
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
              				<th>Descrição</th>
              				<th>Ações</th>
              			</tr>
              		</thead>		
                    <tbody>

					<?php
						//SETEI UMA VARIAVÉL NO VALOR ZERO PARA TODA VEZ
						//QUE HOUVER UM REGISTRO ELA VAI INCREMENTAR
						$n = 0; 
					?>
					
         				<?php while($dados = mysqli_fetch_assoc($result_disciplinas)){ ?>
            			<?php
							$inst = $dados["instituicao_disciplina"];
							$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
							$result_inst = mysqli_fetch_assoc($sql_inst);
							$instituicao = utf8_encode($result_inst["nome_instituicao"]);
						?>
						<tr>
							<?php $n = $n + 1; ?>
            				<td><?php echo utf8_encode($dados["cod_disciplina"]); ?></td>
            				<td><?php echo utf8_encode($dados["nome_disciplina"]); ?></td>
            				<td><?php echo $instituicao; ?></td>
							<td><?php echo utf8_encode($dados["descricao_disciplina"]); ?></td>
							<td>  
								<a href="home.php?link=22&id=<?php echo $dados["cod_disciplina"]; ?>"><button class="btn btn-sm btn-primary">
									<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="Visualizar"></span>
								Visualizar</button></a>
							  
								<a href="home.php?link=21&id=<?php echo $dados["cod_disciplina"]; ?>"><button class="btn btn-sm btn-warning">
									<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
								Editar</button></a>
                              
								<a href="processa/proc_apag_disciplina.php?id=<?php echo $dados["cod_disciplina"]; ?>"><button class="btn btn-sm btn-danger">
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
									<a href="home.php?link=20&pagina=<?php echo $pagina_anterior ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php } ?>
							</li> 
							
							<?php 
							//APRESENTAR A PAGINAÇÃO
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="home.php?link=20&pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
									<?php } ?>
							
							<li>
							<?php
							//SETANDO PAGINA PROXIMO
								if($pagina_proximo <= $num_pagina){ ?>
									<a href="home.php?link=20&pagina=<?php echo $pagina_proximo ?>" aria-label="Next">
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
 