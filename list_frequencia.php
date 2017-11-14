<?php		$n = 0;
			$inst_for = $_POST['escola'];
			$turma_for = $_POST['turma'];
			$ano_for = $_POST['ano'];
			$sql_turma = mysqli_query($con, "SELECT nome_turma FROM turma WHERE cod_turma = '$turma_for' LIMIT 1");
			$result_turma = mysqli_fetch_assoc($sql_turma);
			$turma = utf8_encode($result_turma["nome_turma"]);
			$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");	
?>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Diários</a></li>
						<li class="active">Frequência</li>
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
				<h1>Frequência Escolar - Turma <?php echo $turma." [".$turma_for."]";?></h1>
			</div>
			<form class="form-horizontal" name="pesquisar" method="POST" action="home.php?link=37">
						
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
							
							<div class="form-group"> 
								  <label for="escola" class="col-sm-3 control-label">Instituição</label>
									<div class="col-sm-6">
									  <select name="escola" id="escola" class="form-control" required >
										<option style="color:#eee; ">Selecione Instituição</option>
										 <?php while($dados_insitituicao = mysqli_fetch_array($consulta_instituicao)){ ?>    
											<option value="<?php echo $dados_insitituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_insitituicao["nome_instituicao"]); ?></option>
										  <?php } ?>
									  </select>
									 </div>
							</div><!--Form-Group-->
							<div class="form-group">
								<label for="turma" class="col-sm-3 control-label">Turma</label>
								  <div class="col-sm-4">
									<select name="turma" id="turma" class="form-control" required>
										<option style="color:#eee; ">Selecione</option>
										<?php
										$consulta_turma = mysqli_query($con, "Select * From  turma Order by nome_turma");
										while($dados_turma = mysqli_fetch_array($consulta_turma)){ ?>    
										<option value="<?php echo $dados_turma["cod_turma"]; ?>"><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
									  <?php } ?>
									</select>
								</div>
							</div><!--Form-group-->
							<div class="form-group">
								<label form="diario" class="col-sm-3 control-label">Diário</label>
								<div class="col-sm-3">
									<select name="diario" id="diario" class="form-control" required>
										<option value="1°B">1°B</option>
										<option value="2°B">2°B</option>
										<option value="3°B">3°B</option>
										<option value="4°B">4°B</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label form="ano" class="col-sm-3 control-label">Ano</label>
								<div class="col-sm-4">
									<select name="ano" id="ano" class="form-control" required>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
									</select>
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-5 control-label">
									<button type="submit" class="btn btn-primary"
									data-toggle="tooltip" data-placement="top" title="Pesquisar">
									<span class="glyphicon glyphicon-search"></span> Pesquisar
									</button>
								</label>
							</div>
						
					</div>								
				</div><!--Fim row-->
			</form>
				<hr class="divider">

             <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
							<tr>
								<th>Aluno</th>
								
              				</tr>
              			</thead>		
                        <tbody>
							<?php 
							$sql = mysqli_query($con, "SELECT * FROM discente WHERE instituicao_aluno = '$inst_for' AND turma_aluno = '$turma_for' ORDER BY nome_aluno");
							$total = mysqli_num_rows($sql);
							while($dados = mysqli_fetch_assoc($sql)){?>
							
							<tr>
								<?php $n = $n + 1; ?>
								<td><?php echo utf8_encode($dados["nome_aluno"]);?></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								<td><input type="checkbox"></td>
								
							</tr>
							<?php }?>
							
            			</tbody>			  
            		</table>
					<?php 
					echo " <p align=\"center\" style=\"color:#000; font-size:12px;\">
					Mostrando ".$n." Registro no Total de ".$total."
					</p>"; 	
				?>

				</div><!--Fim do Table Responvive-->
			</div>
