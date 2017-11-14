		<?php
			//PEGANDO O ID DA INSTITUIÇÃO
			$id = $_GET['id'];
			//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
			$consulta_professor = mysqli_query($con, "SELECT *FROM  docente WHERE cod_professor = '$id' LIMIT 1");
			$resultado = mysqli_fetch_assoc($consulta_professor);
			$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");
			$consulta_disciplina = mysqli_query($con, "Select * From  disciplina Order by nome_disciplina");
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Editar</a></li>
						<li class="active">Docente</li>
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
				<h1>Alteração Docente</h1>
			</div>
				<div class="row">
				<div class="pull-right">
					<a href="home.php?link=17"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>	
					<a href="processa/proc_apag_professor.php?id=<?php echo $resultado["cod_professor"]; ?>"><button class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
				
				<form name="form" class="form-horizontal" method="post" action="processa/proc_edit_prof.php" >
                
				<div class="row"><!--Inicio Da Linha 2.1-->
					<div class="col-md-6"><!--Inicio Da Coluna-->
						<fieldset><!--Inicio Do Fieldset-->
							<legend style="font-weight:bold;"> Dados Pessoais</legend>
                          <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Nome </label>
                              <div class="col-sm-9">
								<input type="hidden" name="id" value="<?php echo $resultado['cod_professor']; ?>" >
                                <input name="nome" id="nome" type="text" class="form-control"
								placeholder="Nome Completo" value="<?php echo utf8_encode($resultado['nome_professor']);?>" autofocus required />
                              </div>
                          </div><!--Form-Group-->

                          <div class="form-group">
                            <label for="cpf" class="col-sm-2 control-label">Cpf </label>
                              <div class="col-sm-6">
                                <input name="cpf" id="cpf" type="text" class="form-control" 
								placeholder="Cpf Com 11 Digitos" value="<?php echo utf8_encode($resultado['cpf_professor']);?>" required />
                              </div>
                          </div><!--Form-Group-->
						  
						  <div class="form-group">
                            <label class="col-sm-2 control-label">Sexo</label>
                              <div class="col-sm-6">
                                <?php if( $resultado['sexo_professor'] == 'M'){?>
								<input name="opsexo" type="radio" value="M" checked="checked"> Masculino  
								<input name="opsexo" type="radio" value="F"> Feminino
							  <?php }else{ ?>
								<input name="opsexo" type="radio" value="M"> Masculino  
								<input name="opsexo" type="radio" value="F" checked="checked"> Feminino
							  <?php } ?>
                              </div>
                          </div><!--Form-Group-->						  
						  </fieldset><!--Fim Do Fieldset-->
						</div><!--Fim Da Coluna-->

					<div class="col-md-6"><!--Inicio Da Coluna-->
						<fieldset><!--Inicio Do Fieldset-->
							<legend style="font-weight:bold;">Dados Institucionais</legend>
								  <div class="form-group">
									  <label for="disciplina" class="col-sm-3 control-label">Disciplina </label>
										<div class="col-sm-8">
										  <select name="disciplina" id="disciplina" class="form-control" required>
											<option style="color:#eee; ">Selecione sua Disciplina</option>
											
											<?php while($dados_disciplina = mysqli_fetch_array($consulta_disciplina)){ ?>
												<?php if( $resultado['disciplina_professor'] == $dados_disciplina['cod_disciplina']){?>
													<option value="<?php echo $dados_disciplina["cod_disciplina"]; ?>" selected><?php echo utf8_encode($dados_disciplina["nome_disciplina"]); ?></option>
												<?php }else{?>
												<option value="<?php echo $dados_disciplina["cod_disciplina"]; ?>"><?php echo utf8_encode($dados_disciplina["nome_disciplina"]); ?></option>
											<?php } }?>
																						
										  </select>
									  </div>
								 </div><!--Form-Group-->

								 <div class="form-group"> 
								  <label for="escola" class="col-sm-3 control-label">Instituição</label>
									<div class="col-sm-9">
									  <select name="escola" id="escola" class="form-control" required>
										<option style="color:#eee; ">Selecione sua Instituição</option>
										 
										 <?php while($dados_instituicao = mysqli_fetch_array($consulta_instituicao)){ ?>
											<?php if( $resultado['instituicao_professor'] == $dados_instituicao['cod_instituicao']){?>
												<option value="<?php echo $dados_instituicao["cod_instituicao"]; ?>" selected > <?php echo utf8_encode($dados_instituicao["nome_instituicao"]); ?></option>
											<?php }else{?>
											<option value="<?php echo $dados_instituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_instituicao["nome_instituicao"]); ?></option>
										<?php } }?>
									  
									  </select>
									 </div>
								  </div><!--Form-Group--> 
								  
								 
								</fieldset><!--Fim Do Fieldset-->
							</div><!--Fim Da Coluna-->
						</div><!--Fim Da Liha 2.1-->

				
				<div class="row"><!--Inicio Da Linha 2.2-->
					<div class="col-md-12"><!--Inicio Da Coluna-->
						<fieldset><!--Inicio Do Fieldset-->
							<legend style="font-weight:bold;"> Contatos</legend>
                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-8">
                                <input type="email" id="email" name="email" class="form-control"
								placeholder="Ex:. sucep@hotmail.com" value="<?php echo utf8_encode($resultado['email_professor']);?>" required  />
                              </div>
                          </div><!--Form-Group-->

                          <div class="form-group">
                            <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                              <div class="col-sm-5">
                                <input type="text" name="telefone" id="telefone" class="form-control"
								placeholder=" Ex:.(XX) XXXX-XXXX" value="<?php echo utf8_encode($resultado['telefone_professor']);?>" required />
                              </div>
                          </div><!--Form-Group-->
						</fieldset><!--Fim Do Fieldset-->
					</div><!--Fim Da Coluna-->
				</div><!--Fim Da Liha 2.2-->

				
				<div class="row"><!--Inicio Da Linha 2.3-->
					<div class="col-md-12"><!--Inicio Da Coluna-->
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="chekbox">
                                  <label data-toggle="modal" data-target="#myModal">
                                    <input type="checkbox" name="termo" value="concorda" 
									data-toggle="tooltip" data-placement="top" title="Marque esta caixa se deseja continuar" required />
                                    Concordo com os Termos De Uso da Instituição de Acordo com o Contrato do Sistema Sucep
                                  </label>  
                                </div>
                            </div>
                          </div><!--Form-Group-->
					</div><!--Fim Da Coluna-->
				</div><!--Fim Da Liha 2.3-->

				<div class="row"><!--Inicio Da Linha 2.4-->
					<div class="col-md-6 col-md-offset-3"><!--Inicio Da Coluna-->
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="bottom" title="Finaizar Alteração">Finalizar Alteração</button>
                              <button class="btn btn-success" type="reset" data-toggle="tooltip" data-placement="bottom" title="Corrigir Alteração">Corrigir Alteração</button>                           
                            </div>
                          </div><!--Form-Group-->
					</div><!--Fim Da Coluna-->
				</div><!--Fim Da Liha 2.4-->
		</form><!--Fim do Form-->
			<?php include "modal/termo_uso.php"; ?>		
        </div><!-- Fim das Noticias -->
		