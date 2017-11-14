		<?php
			$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");
			$consulta_turma = mysqli_query($con, "Select * From  turma Order by nome_turma");
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<ol class="breadcrumb">
				  <li><a href="home.php?link=1">Inicio</a></li>
				  <li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
				  <li><a href="#">Horario</a></li>
				  <li class="active">Adicionar Horário</li>
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
				<h1>Adicionando Horário</h1>
			</div>
				<div class="row">
				<div class="pull-right">
					<a href="home.php?link=31"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>	
				</div>
			</div>
				
				<form name="form" class="form-horizontal" method="post" action="processa/proc_cad_horario.php" >
                
				<div class="row"><!--Inicio Da Linha 2.1-->
					<div class="col-md-12"><!--Inicio Da Coluna-->
						<fieldset><!--Inicio Do Fieldset-->
							<legend style="font-weight:bold;"> Horário</legend>
							
							<div class="form-group"> 
								  <label for="escola" class="col-sm-3 control-label">Instituição</label>
									<div class="col-sm-5">
									  <select name="escola" id="escola" class="form-control" required>
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
										<?php while($dados_turma = mysqli_fetch_array($consulta_turma)){ ?>    
										<option value="<?php echo $dados_turma["cod_turma"]; ?>"><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
									  <?php } ?>
									</select>
								</div>
							</div><!--Form-group-->
							<div class="form-group">
								<label form="ano" class="col-sm-3 control-label">Periodo</label>
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
						  
						  </fieldset><!--Fim Do Fieldset-->
					</div><!--Fim Da Coluna-->
				</div><!--fim row-->
				<hr class="divider">
				<div class="row">
					<div class="col-md-2">
					<h6 align="center">Horário</h6>
					    <!-- 1° Horario-->
						<div class="form-group">
                          <label for="h1" class="col-sm-1 control-label">1°</label>
                           <div class="col-sm-9"> 
                            <input name="h1" id="h1" type="time" class="form-control" placeholder="" autofocus required />
                          </div>
                        </div><!--Form-Group-->
						<!-- 2° Horario-->
						<div class="form-group">
                          <label for="h2" class="col-sm-1 control-label">2°</label>
                           <div class="col-sm-9"> 
                            <input name="h2" id="h2" type="time" class="form-control" placeholder=""  required />
                          </div>
                        </div><!--Form-Group-->
						<!-- 3° Horario-->
						<div class="form-group">
                          <label for="h3" class="col-sm-1 control-label">3°</label>
                           <div class="col-sm-9"> 
                            <input name="h3" id="h3" type="time" class="form-control" placeholder=""  required />
                          </div>
                        </div><!--Form-Group-->
						<!-- 4° Horario-->
						<div class="form-group">
                          <label for="h4" class="col-sm-1 control-label">4°</label>
                           <div class="col-sm-9"> 
                            <input name="h4" id="h4" type="time" class="form-control" placeholder=""  required />
                          </div>
                        </div><!--Form-Group-->
						<!-- 5° Horario-->
						<div class="form-group">
                          <label for="h5" class="col-sm-1 control-label">5°</label>
                           <div class="col-sm-9"> 
                            <input name="h5" id="h5" type="time" class="form-control" placeholder="" required />
                          </div>
                        </div><!--Form-Group-->
						
					</div>
					
					<div class="col-md-2">
						<h6 align="center">Segunda</h6>
							<!--1° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="s1" id="s1" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
		
											<?php 
											$con_s1 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($s1 = mysqli_fetch_array($con_s1)){ ?>    
											  <option value="<?php echo $s1["cod_disciplina"]; ?>"><?php echo utf8_encode($s1["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--2° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="s2" id="s2" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_s2 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($s2 = mysqli_fetch_array($con_s2)){ ?>    
											  <option value="<?php echo $s2["cod_disciplina"]; ?>"><?php echo utf8_encode($s2["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--3° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="s3" id="s3" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_s3 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($s3 = mysqli_fetch_array($con_s3)){ ?>    
											  <option value="<?php echo $s3["cod_disciplina"]; ?>"><?php echo utf8_encode($s3["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--4° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="s4" id="s4" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_s4 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($s4 = mysqli_fetch_array($con_s4)){ ?>    
											  <option value="<?php echo $s4["cod_disciplina"]; ?>"><?php echo utf8_encode($s4["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--5° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="s5" id="s5" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_s5 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($s5 = mysqli_fetch_array($con_s5)){ ?>    
											  <option value="<?php echo $s5["cod_disciplina"]; ?>"><?php echo utf8_encode($s5["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
					</div>
					
					<div class="col-md-2">
					
						<h6 align="center">Terça</h6>
							<!--1° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="t1" id="t1" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
		
											<?php 
											$con_t1 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($t1 = mysqli_fetch_array($con_t1)){ ?>    
											  <option value="<?php echo $t1["cod_disciplina"]; ?>"><?php echo utf8_encode($t1["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--2° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="t2" id="s2" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_t2 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($t2 = mysqli_fetch_array($con_t2)){ ?>    
											  <option value="<?php echo $t2["cod_disciplina"]; ?>"><?php echo utf8_encode($t2["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--3° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="t3" id="t3" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_t3 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($t3 = mysqli_fetch_array($con_t3)){ ?>    
											  <option value="<?php echo $t3["cod_disciplina"]; ?>"><?php echo utf8_encode($t3["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--4° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="t4" id="t4" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_t4 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($t4 = mysqli_fetch_array($con_t4)){ ?>    
											  <option value="<?php echo $t4["cod_disciplina"]; ?>"><?php echo utf8_encode($t4["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--5° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="t5" id="t5" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_t5 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($t5 = mysqli_fetch_array($con_t5)){ ?>    
											  <option value="<?php echo $t5["cod_disciplina"]; ?>"><?php echo utf8_encode($t5["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
					</div>
					
					<div class="col-md-2">
						<h6 align="center">Quarta</h6>
							<!--1° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="qua1" id="qua1" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
		
											<?php 
											$con_qua1 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($qua1 = mysqli_fetch_array($con_qua1)){ ?>    
											  <option value="<?php echo $qua1["cod_disciplina"]; ?>"><?php echo utf8_encode($qua1["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--2° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="qua2" id="qua2" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_qua2 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($qua2 = mysqli_fetch_array($con_qua2)){ ?>    
											  <option value="<?php echo $qua2["cod_disciplina"]; ?>"><?php echo utf8_encode($qua2["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--3° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="qua3" id="qua3" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_qua3 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($qua3 = mysqli_fetch_array($con_qua3)){ ?>    
											  <option value="<?php echo $qua3["cod_disciplina"]; ?>"><?php echo utf8_encode($qua3["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--4° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="qua4" id="qua4" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_qua4 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($qua4 = mysqli_fetch_array($con_qua4)){ ?>    
											  <option value="<?php echo $qua4["cod_disciplina"]; ?>"><?php echo utf8_encode($qua4["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--5° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="qua5" id="qua5" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_qua5 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($qua5 = mysqli_fetch_array($con_qua5)){ ?>    
											  <option value="<?php echo $qua5["cod_disciplina"]; ?>"><?php echo utf8_encode($qua5["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
					
					</div>
					
					<div class="col-md-2">
					<h6 align="center">Quinta</h6>
							<!--1° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="quin1" id="quin1" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
		
											<?php 
											$con_quin1 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($quin1 = mysqli_fetch_array($con_quin1)){ ?>    
											  <option value="<?php echo $quin1["cod_disciplina"]; ?>"><?php echo utf8_encode($quin1["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--2° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="quin2" id="quin2" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_quin2 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($quin2 = mysqli_fetch_array($con_quin2)){ ?>    
											  <option value="<?php echo $quin2["cod_disciplina"]; ?>"><?php echo utf8_encode($quin2["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--3° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="quin3" id="quin3" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_quin3 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($quin3 = mysqli_fetch_array($con_quin3)){ ?>    
											  <option value="<?php echo $quin3["cod_disciplina"]; ?>"><?php echo utf8_encode($quin3["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--4° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="quin4" id="quin4" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_quin4 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($quin4 = mysqli_fetch_array($con_quin4)){ ?>    
											  <option value="<?php echo $quin4["cod_disciplina"]; ?>"><?php echo utf8_encode($quin4["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--5° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="quin5" id="quin5" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_quin5 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($quin5 = mysqli_fetch_array($con_quin5)){ ?>    
											  <option value="<?php echo $quin5["cod_disciplina"]; ?>"><?php echo utf8_encode($quin5["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
					
					</div>
					
					<div class="col-md-2">
					<h6 align="center">Sexta</h6>
							<!--1° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="sex1" id="sex1" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
		
											<?php 
											$con_sex1 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($sex1 = mysqli_fetch_array($con_sex1)){ ?>    
											  <option value="<?php echo $sex1["cod_disciplina"]; ?>"><?php echo utf8_encode($sex1["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--2° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="sex2" id="sex2" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_sex2 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($sex2 = mysqli_fetch_array($con_sex2)){ ?>    
											  <option value="<?php echo $sex2["cod_disciplina"]; ?>"><?php echo utf8_encode($sex2["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--3° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="sex3" id="sex3" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_sex3 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($sex3 = mysqli_fetch_array($con_sex3)){ ?>    
											  <option value="<?php echo $sex3["cod_disciplina"]; ?>"><?php echo utf8_encode($sex3["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--4° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="sex4" id="sex4" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_sex4 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($sex4 = mysqli_fetch_array($con_sex4)){ ?>    
											  <option value="<?php echo $sex4["cod_disciplina"]; ?>"><?php echo utf8_encode($sex4["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
							<!--5° horario -->
							<div class="form-group">
										<div class="col-sm-12">
										  <select name="sex5" id="sex5" class="form-control" required>
											<option style="color:#eee; ">Selecione</option>
											<?php 
											$con_sex5 = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
											while($sex5 = mysqli_fetch_array($con_sex5)){ ?>    
											  <option value="<?php echo $sex5["cod_disciplina"]; ?>"><?php echo utf8_encode($sex5["nome_disciplina"]); ?></option>
											<?php } ?>
										  </select>
										</div>
							</div><!--Form-Group-->
					</div>
				</div>				
									
			<hr class="divider">
			
				<div class="row"><!--Inicio Da Linha 2.4-->
					<div class="col-md-6 col-md-offset-3"><!--Inicio Da Coluna-->
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="bottom" title="Adicionar Horário">Finalizar Horário</button>
                              <button class="btn btn-success" type="reset" data-toggle="tooltip" data-placement="bottom" title="Corrigir o Cadastro">Corrigir Horario</button>                           
                            </div>
                          </div><!--Form-Group-->
					</div><!--Fim Da Coluna-->
				</div><!--Fim Da Liha 2.4-->
		</form><!--Fim do Form-->
			<?php include "modal/termo_uso.php"; ?>		
        </div><!-- Fim das Noticias -->
		