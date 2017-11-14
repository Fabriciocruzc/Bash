<?php			
			$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");	
?>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Listagem</a></li>
						<li class="active">Horários</li>
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
				<h1>Pesquisar Horários</h1>
			</div>
			
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=30"><button class="btn btn-md btn-success">
						<span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Cadastrar"></span>
					Adicionar</button></a>		                 
				</div>
			</div>
			<hr class="divider">

				<div class="form-group">
					<div class="text-right">
						<form class="form-inline" name="pesquisar" method="POST" action="home.php?link=32">
							
							<div class="form-group"> 
								  <label for="escola" class="col-sm-3 control-label">Instituição</label>
									<div class="col-sm-3">
									  <select name="escola" id="escola" class="form-control" required >
										<option style="color:#eee; ">Selecione sua Instituição</option>
										 <?php while($dados_insitituicao = mysqli_fetch_array($consulta_instituicao)){ ?>    
											<option value="<?php echo $dados_insitituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_insitituicao["nome_instituicao"]); ?></option>
										  <?php } ?>
									  </select>
									 </div>
							</div><!--Form-Group-->
							<div class="form-group">
								<label for="turma" class="col-sm-3 control-label">Turma</label>
								  <div class="col-sm-3">
									<select name="turma" id="turma" class="form-control" required>
										<option style="color:#eee; ">Selecione a Turma</option>
										<?php
										$consulta_turma = mysqli_query($con, "Select * From  turma Order by nome_turma");
										while($dados_turma = mysqli_fetch_array($consulta_turma)){ ?>    
										<option value="<?php echo $dados_turma["cod_turma"]; ?>"><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
									  <?php } ?>
									</select>
								</div>
							</div><!--Form-group-->
							<div class="form-group">
								<label form="ano" class="col-sm-2 control-label">Ano</label>
								<div class="col-sm-2">
									<select name="ano" id="ano" class="form-control" required>
										<option style="color:#eee; ">Selecione</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
									</select>
								</div>
							</div>		
							
							<button type="submit" class="btn btn-primary"
							data-toggle="tooltip" data-placement="top" title="Pesquisar">
							<span class="glyphicon glyphicon-search"></span>
							</button>
						
						</form>
					</div>								
				</div><!--Fim Do Form Group-->
				<hr class="divider">

             <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
							<tr>
								<th>ID</th>
              					<th>Instituição</th>
              					<th>Turma</th>
              					<th>Periodo</th>
              					<th>Ações</th>
              				</tr>
              			</thead>		
                        <tbody>
							
            			</tbody>			  
            		</table>

				</div><!--Fim do Table Responvive-->
			</div>
