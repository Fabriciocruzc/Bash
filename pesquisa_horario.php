<?php		
			$inst_for = $_POST['escola'];
			$turma_for = $_POST['turma'];
			$ano_for = $_POST['ano'];
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
									<div class="col-sm-5">
									  <select name="escola" id="escola" class="form-control" required >
										<option style="color:#eee; ">Selecione sua Instituição</option>
										 <?php 
											$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");	
											while($dados_insitituicao = mysqli_fetch_array($consulta_instituicao)){ ?>    
											<?php if($dados_insitituicao["cod_instituicao"] == $inst_for){?>
												<option style="color:#eee;" value="<?php echo $dados_insitituicao["cod_instituicao"]; ?>" selected><?php echo utf8_encode($dados_insitituicao["nome_instituicao"]); ?></option>
											<?php }else{?>
												<option value="<?php echo $dados_insitituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_insitituicao["nome_instituicao"]); ?></option>
											<?php } }?>
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
											<?php if( $turma_for == $dados_turma['cod_turma']){?>
												<option style="color:#eee;" value="<?php echo $dados_turma["cod_turma"]; ?>" selected><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
											<?php }else{?>										
										<option value="<?php echo $dados_turma["cod_turma"]; ?>"><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
										<?php } } ?>
									</select>
								</div>
							</div><!--Form-group-->
							<div class="form-group">
								<label form="ano" class="col-sm-3 control-label">Ano</label>
								<div class="col-sm-2">
								<select name="ano" id="ano" class="form-control" required>
										<option style="color:#eee;">Selecione</option>
										<option style="color:#eee;" selected><?php echo $ano_for; ?></option>	
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
							data-toggle="tooltip" data-placement="top" title="Realiza uma Pesquisa Com Base No Nome Informado">
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
							
            				<?php 
								$instituicao = $_POST['escola'];
								$turma = $_POST['turma'];
								$ano = $_POST['ano'];
								$sql_consulta =  "SELECT * FROM horario  WHERE instituicao = '$instituicao' AND turma = '$turma' AND ano = '$ano' LIMIT 1";
								$result_horarios = mysqli_query($con, $sql_consulta);
								$n = mysqli_num_rows($result_horarios); 
							while($dados = mysqli_fetch_assoc($result_horarios)){ ?>
            					<?php
								//PEGANDO OS DADOS DAS CHAVES ESTRANGEIRAS
								$inst = $dados["instituicao"];
								$sql_inst = mysqli_query($con, "SELECT nome_instituicao FROM instituicao WHERE cod_instituicao = '$inst' LIMIT 1");
								$result_inst = mysqli_fetch_assoc($sql_inst);
								$instituicao = utf8_encode($result_inst["nome_instituicao"]);
								
								$tm = $dados["turma"];
								$sql_turma = mysqli_query($con, "SELECT nome_turma FROM turma WHERE cod_turma = '$tm' LIMIT 1");
								$result_turma = mysqli_fetch_assoc($sql_turma);
								$turma = utf8_encode($result_turma["nome_turma"]);
								
								?>
								<tr>
									<td><?php echo $dados["id"]; ?></td>
									<td><?php echo $instituicao; ?></td>
									<td><?php echo $turma; ?></td>
            						<td><?php echo $dados["ano"]; ?></td>
            						<td>
										<a href="home.php?link=33&turma=<?php echo $dados["turma"]; ?>
										&instituicao=<?php echo $dados["instituicao"]; ?>&ano=<?php echo $dados["ano"]; ?>">
										<button class="btn btn-sm btn-primary">
											<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="Visualizar"></span>
										Visulaizar</button></a>
									  
										<a href="home.php?link=34&turma=<?php echo $dados["turma"]; ?>
										&instituicao=<?php echo $dados["instituicao"]; ?>&ano=<?php echo $dados["ano"]; ?>"><button class="btn btn-sm btn-warning">
											<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
										Editar</button></a>
									  
										<a href="processa/proc_apag_horario.php?turma=<?php echo $dados["turma"]; ?>
										&instituicao=<?php echo $dados["instituicao"]; ?>&ano=<?php echo $dados["ano"]; ?>"><button class="btn btn-sm btn-danger">
											<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
										Remover</button></a>
									
									</td>
								</tr>	
						
            				<?php } ?>	
            			</tbody>			  
            		</table>
					<?php 
					echo " <p align=\"center\" style=\"color:#000; font-size:12px;\">
						".$n." Horário encontrado</p>"; 	
					?>
				</div><!--Fim do Table Responvive-->
			</div>
