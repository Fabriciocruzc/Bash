<?php
			//SELECIONANDO AS EVENTOS QUE APARECERAM NA PÁGINA
			$date = date('Y-m-d');
			$sql_eventos = "SELECT * FROM eventos Order by data";
			$result_eventos = mysqli_query($con, $sql_eventos);
			$total_eventos = mysqli_num_rows($result_eventos);
			
			$consulta_instituicao = mysqli_query($con, "SELECT * FROM  instituicao");
?>

<div class="modal fade bs-example-modal-sm" id="listEvento" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title">Eventos</h4>
	  </div><!--fim modal-header-->
	  <div class="modal-body">

	  	<div class="form-group">
			<div class="text-right">
				<form class="form-inline" name="pesquisar" method="GET" action="#" enctype="multipart/form-data">
					<input  name="nome" type="search" placeholder="Pesquisar" class="form-control" required/>
						<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Realiza uma Pesquisa Com Base No Nome Informado"><span class="glyphicon glyphicon-search"></span></button>
				</form>
			</div>								
		</div><!--Fim Do Form Group-->
		<hr class="divider">		
             <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
							<tr>
								<th>ID</th>
              					<th>Titulo</th>
              					<th>Data</th>
              					<th>Instituicao</th>
              					<th>Usuário</th>
              					<th>Ações</th>
              				</tr>
              			</thead>		
                        <tbody>
							
								<?php
									//SETEI UMA VARIAVÉL NO VALOR ZERO PARA TODA VEZ
									//QUE HOUVER UM REGISTRO ELA VAI INCREMENTAR
									$n = 0; 
								?>
							
						
            				<?php while($dados = mysqli_fetch_assoc($result_eventos)){ ?>
            				<?php 
							//pegando os valores das chaves estrangeiras
								$inst = $dados["instituicao"];
								$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
								$result_inst = mysqli_fetch_assoc($sql_inst);
								$instituicao = utf8_encode($result_inst["nome_instituicao"]);
								
								?>
								<tr>
								<?php $n = $n + 1; ?>
									<td><?php echo $dados["id"]; ?></td>
									<td><?php echo utf8_encode($dados["titulo"]); ?></td>
            						<td><?php echo inverteData($dados["data"]); ?></td>
            						<td><?php echo $instituicao; ?></td>
            						<td><?php echo utf8_encode($dados["usuario"]); ?></td>
            						<td>
										<button class="btn btn-xs btn-warning" data-toggle="modal"
										data-target="#editaEvento<?php echo $dados["id"]; ?>">
											<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
										Editar</button>
									  
										<a href="processa/proc_apag_evento.php?id=<?php echo $dados["id"]; ?>"><button class="btn btn-xs btn-danger">
											<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
										Remover</button></a>
									
									</td>
								</tr>	
								<?php include "modal/edita_evento.php"; ?>
            				<?php } ?>	
            			</tbody>			  
            		</table>
					
					<?php 
						echo " <p align=\"center\" style=\"color:#000; font-size:12px;\">
						Mostrando ".$n." Registro no Total de ".$total_eventos."
						</p>"; 	
					?>
					

			<hr class="divider">
			<div class="form-group">
				<button class="btn btn-info" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Fechar">Fechar</button>			
			</div><!--fim form-group-->
	 </div><!--fim modal-body-->
	</div><!--fim modal-content-->
  </div><!--fim modal-dialog-->
</div><!--fim modal-->
