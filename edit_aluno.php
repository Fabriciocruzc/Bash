				<?php
					//PEGANDO O ID DA INSTITUIÇÃO
					$id = $_GET['id'];
					//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
					$consulta_aluno = mysqli_query($con, "SELECT *FROM  discente WHERE cod_aluno = '$id' LIMIT 1");
					$resultado = mysqli_fetch_assoc($consulta_aluno);
				
					$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");
					$consulta_turma = mysqli_query($con, "Select * From  turma Order by nome_turma");
					$consulta_situacao = mysqli_query($con, "Select * From  situacao_aluno Order by id");
					
				?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Editar</a></li>
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
				<h1>Alteração Discente</h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=14"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
					<a href="processa/proc_apag_aluno.php?id=<?php echo $resultado["cod_aluno"]; ?>"><button class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Apagar</button></a>
				</div>
			</div>
			<form class="form-horizontal" method="post" action="processa/proc_edit_aluno.php">
			
			<div class="row"><!--Dados Pessoais-->
				<div class="col-md-6"><!--Coluna de 6 --Para Dados Pessoais-->
					<fieldset><!--Inicio do Fieldset-->
						<legend style="font-weight:bold;">Dados Pessoais</legend>
                        <div class="form-group">
                          <label for="nome" class="col-sm-3 control-label">Nome </label>
                           <div class="col-sm-9"> 
						   <input type="hidden" name="id" value="<?php echo $resultado['cod_aluno']; ?>" >
                            <input name="nome" id="nome" type="text" class="form-control"
							placeholder="Nome Completo" value="<?php echo utf8_encode($resultado['nome_aluno']); ?>" autofocus required />
                          </div>
                        </div><!--Form-Group-->
                        <div class="form-group">
                          <label for="cpf" class="col-sm-3 control-label">Cpf </label>
                            <div class="col-sm-8">
                              <input name="cpf" id="cpf" type="text" class="form-control" 
							  placeholder="Cpf Com 11 Digitos" value="<?php echo utf8_encode($resultado['cpf_aluno']); ?>" required/>
                          </div>
                        </div><!--Form-Group-->
               
                        <div class="form-group">
                          <label for="data_nascimento" class="col-sm-3 control-label">Data De Nascimento </label>
                            <div class="col-sm-6">
                              <input name="data_nascimento" id="data_nascimento" type="date" class="form-control"
							  placeholder="" value="<?php echo utf8_encode($resultado['data_n_aluno']); ?>" required />
                          </div>
                        </div><!--Form-Group--> 
						
						<div class="form-group">
							<label for="pai" class=" col-sm-3 control-label">Pai</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pai" id="pai"
								placeholder=" Digite o Nome Do Pai" value="<?php echo utf8_encode($resultado['pai_aluno']); ?>" required />
							</div><!--Form-Group-->
						</div>
						
						<div class="form-group">
							<label for="mae" class=" col-sm-3 control-label">Mãe</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="mae" id="mae" 
								placeholder="Digite o Nome Da Mãe" value="<?php echo utf8_encode($resultado['mae_aluno']); ?>" required />
							</div>
						</div><!--Form-Group-->
						
						  <div class="form-group">
                            <label class="col-sm-3 control-label">Sexo</label>
                              <div class="col-sm-6">
                               <?php if( $resultado['sexo_aluno'] == 'M'){?>
								<input name="opsexo" type="radio" value="M" checked="checked"> Masculino  
								<input name="opsexo" type="radio" value="F"> Feminino
							  <?php }else{ ?>
								<input name="opsexo" type="radio" value="M"> Masculino  
								<input name="opsexo" type="radio" value="F" checked="checked"> Feminino
							  <?php } ?>
                              </div>
                          </div><!--Form-Group-->
						
					</fieldset><!--Fim Do Fieldset-->
				</div><!--Fim Da Coluna De 6 De Dados Pessoais-->
				
				
			<div class="col-md-6"><!--coluna de 6 para dados Institucionais-->
				<fieldset><!--Inicio do Fieldset-->
					<legend style="font-weight:bold;"> Dados Intitucionais</legend>
                          <div class="form-group">
                            <label for="escola" class="col-sm-3 control-label">Instituição</label>
                              <div class="col-sm-8">
                                <select name="escola" id="escola" class="form-control" required>
                                  <option style="color:#eee; ">Selecione a Instituição</option>
								  
								  	<?php while($dados_instituicao = mysqli_fetch_array($consulta_instituicao)){ ?>
										<?php if( $resultado['instituicao_aluno'] == $dados_instituicao['cod_instituicao']){?>
											<option value="<?php echo $dados_instituicao["cod_instituicao"]; ?>" selected><?php echo utf8_encode($dados_instituicao["nome_instituicao"]); ?></option>
										<?php }else{?>
										<option value="<?php echo $dados_instituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_instituicao["nome_instituicao"]); ?></option>
									<?php } }?>
                                
								</select>
                              </div>
                          </div><!--Form-Group-->

                          <div class="form-group">
                            <label for="turma" class="col-sm-3 control-label">Turma</label>
                              <div class="col-sm-8">
                                <select name="turma" id="turma" class="form-control" required>
									<option style="color:#eee; ">Selecione a Turma</option>
									<?php while($dados_turma = mysqli_fetch_array($consulta_turma)){ ?>
										<?php if( $resultado['turma_aluno'] == $dados_turma['cod_turma']){?>
											<option value="<?php echo $dados_turma["cod_turma"]; ?>" selected><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
										<?php }else{?>
										<option value="<?php echo $dados_turma["cod_turma"]; ?>"><?php echo utf8_encode($dados_turma["nome_turma"]); ?></option>
									<?php } }?>
									
									
                                </select>
                            </div>
                          </div><!--Form-group-->

							<div class="form-group">
                            <label for="situacao" class="col-sm-3 control-label">Situação</label>
                              <div class="col-sm-8">
                                <select name="situacao" id="situacao" class="form-control" required>
								<option style="color:#eee; ">Selecione a Situação da Matricula</option>
                                    <?php while($dados_situacao = mysqli_fetch_array($consulta_situacao)){ ?>
										<?php if( $resultado['situacao_aluno'] == $dados_situacao['id']){?>
											<option value="<?php echo $dados_situacao["id"]; ?>" selected><?php echo utf8_encode($dados_situacao["tipo"]); ?></option>
										<?php }else{?>
										<option value="<?php echo $dados_situacao["id"]; ?>"><?php echo utf8_encode($dados_situacao["tipo"]); ?></option>
									<?php } }?>
									
								</select>
                              </div>
                            </div><!--Form-group-->
						
						</fieldset><!--Fim do Fieldset-->
					</div><!--Fim da coluna de 6 para dados insititucionais-->
				</div><!--Fim Da Linha-->
				
				<div class="row"><!--Inicio Da Linha-->
					<div class="col-md-6">
						<fieldset>
							<legend style="font-weight:bold;">Endereço</legend>
                            <div class="form-group">
                              <label for="cidade" class="col-sm-3 control-label">Cidade</label>
                                <div class="col-sm-6">
                                  <input type="text" id="cidade" name="cidade" class="form-control" 
								  placeholder="Cidade" value="<?php echo utf8_encode($resultado['cidade_aluno']); ?>" required />
                                </div>
                            </div><!--Form-Group-->

							<div class="form-group">
							<label for="estado" class="col-sm-3 control-label">Estado</label>
								<div class="col-sm-4">
									<select name="estado" id="estado" class="form-control" required>
										   
										<option style="color:#eee;" 
										value="<?php echo utf8_encode($resultado['estado_aluno']); ?>">
										<?php echo utf8_encode($resultado['estado_aluno']); ?>
										</option> 
										<option value="AC">AC</option>
										<option value="AL">AL</option>
										<option value="AM">AM</option>
										<option value="AP">AP</option>
										<option value="BA">BA</option>
										<option value="CE">CE</option>
										<option value="DF">DF</option>
										<option value="ES">ES</option>
										<option value="GO">GO</option>
										<option value="MA">MA</option>
										<option value="MG">MG</option>
										<option value="MS">MS</option>
										<option value="MT">MT</option>
										<option value="PA">PA</option>
										<option value="PB">PB</option>
										<option value="PE">PE</option>
										<option value="PI">PI</option>
										<option value="PR">PR</option>
										<option value="RJ">RJ</option>
										<option value="RN">RN</option>
										<option value="RR">RR</option>
										<option value="RS">RS</option>
										<option value="SC">SC</option>
										<option value="SE">SE</option>
										<option value="SP">SP</option>
										<option value="TO">TO</option>
								</select>
							</div>
						</div><!--Form-Group-->	 
							
                            <div class="form-group">
                              <label for="bairro" class="col-sm-3 control-label">Bairro</label>
                                <div class="col-sm-6">
                                  <input type="text" id="bairro" name="bairro" class="form-control"
								  placeholder="Bairro" value="<?php echo utf8_encode($resultado['bairro_aluno']); ?>" required />
                                </div>
                            </div><!--Form-Group-->

                            <div class="form-group">
                              <label for="complemento" class="col-sm-3 control-label">Complemento</label>
                                <div class="col-sm-6">
                                  <input type="text" id="complemento" name="complemento" class="form-control"
								  placeholder="Complemento" value="<?php echo utf8_encode($resultado['complemento_aluno']); ?>" required />
                                </div>
                            </div><!--Form-Group-->
							
						</fieldset><!--Fim Do Fieldset-->
					</div><!--Fim Da Coluna-->
					
					<div class="col-md-6"><!--coluna para dados de Contatos-->
						<fieldset><!--Inicio Do fieldset-->
							<legend style="font-weight:bold;">Contatos</legend>
                            <div class="form-group">
                              <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" id="email" name="email"class="form-control" 
								  placeholder="Ex:. sucep@hotmail.com" value="<?php echo utf8_encode($resultado['email_aluno']); ?>" required/>
                                </div>
                            </div><!--Form-Group-->

                            <div class="form-group">
                              <label for="telefone" class="col-sm-3 control-label">Telefone </label>
                                <div class="col-sm-5">
                                  <input type="text" name="telefone" id="telefone" class="form-control" 
								  placeholder=" Ex:.(XX) XXXX-XXXX" value="<?php echo utf8_encode($resultado['telefone_aluno']); ?>" required />
                                </div>
                            </div><!--Form-Group-->
							
						</fieldset><!--Fim do Fieldset-->
					</div><!--Fim da Coluna-->
				</div><!--Fim da Linha-->
			
                 <div class="row">
					<div class="col-md-12">
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
					
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button class="btn btn-success" type="submit"
							  data-toggle="tooltip" data-placement="bottom" title="Altera a matrícula">Finalizar Alteração</button>
                              <button class="btn btn-success" type="reset"
							  data-toggle="tooltip" data-placement="bottom" title="Corrige Se Houver Algum Dado Errado">Corrigir Alteração</button>                           
                            </div>
                          </div><!--Form-Group--> 
					</div><!--Fim da Coluna-->
				</div><!--Fim da Linha--> 
						 
						  
          </form><!--Fim do Form-->
		  	  <?php include "modal/termo_uso.php"; ?>
        </div><!-- Fim das Noticias -->