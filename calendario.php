		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Calendário</a></li>
						<li class="active">Acadêmico</li>
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
				<h1>Calendário Escolar - <?php $data = date('Y'); echo $data; ?></h1>
			</div>
			
			<div class="row">
			
				<div class="col-md-10 col-sm-10 col-xs-12 calendar">
					<?php
					$eventos = montaEventos($info);
					montaCalendario($eventos); 
					?>
					
					<div class="legends">
					<hr class="divider">
						<span class="legenda"><span class="orange"></span> Eventos</span>
						<span class="legenda"><span class="green"></span> Hoje</span>
					</div>
				</div><!--fim col-->
				
				
				<div class="col-md-2 col-sm-2">
					
						<h1 class="page-header">Eventos</h1>
						<p data-toggle="tooltip" data-placement="bottom" title="Novo">
						<button class="btn btn-md btn-default" data-toggle="modal" data-target="#addEvento" data-placement="bottom" >
							<span class="glyphicon glyphicon-plus"></span>
						Eventos</button>
						</p>
	
						<p data-toggle="tooltip" data-placement="bottom" title="Listar">
						<button class="btn btn-md btn-info" data-toggle="modal" data-target="#listEvento">
							<span class="glyphicon glyphicon-list"></span>
						Listar</button>					
						</p>
				
				</div><!--fim col-->
			</div><!--fim row-->
		</div>
		<?php 
		include "modal/cad_evento.php";  
		include "modal/list_evento.php";  
		?>