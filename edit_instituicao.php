			<?php
				$consulta_diretor = mysqli_query($con, "SELECT *FROM  diretor ORDER BY nome_diretor");
				//PEGANDO O ID DA INSTITUIÇÃO
				$id = $_GET['id'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$consulta_instituicao = mysqli_query($con, "SELECT *FROM  instituicao WHERE cod_instituicao = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($consulta_instituicao);
				//PEGANDO OS TIPO DE INSTITUIÇÕES
				$consulta_tipo = mysqli_query($con,"SELECT * FROM tipo_instituicao");
				//PEGANDO OS TIPOS DE SITUAÇÕES
				$consulta_situacao = mysqli_query($con,"SELECT * FROM situacao_instituicao");
				
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Editar</a></li>
						<li class="active">Instituição</li>
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
				<h1>Alteração de Instituição</h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=8&id=<?php echo $resultado["cod_instituicao"]; ?>"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							                   
					<a href="processa/proc_apag_instituicao.php?id=<?php echo $resultado["cod_instituicao"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			<form name="form" class="form-horizontal" method="post" action="processa/proc_edit_instituicao.php" >
			<div class="row"><!--Inicio Da Linha 2.1-->
				<div class="col-md-6"><!--Inicio Da Coluna-->
					<fieldset><!--Inicio Do Fieldset-->
						<legend style="font-weight:bold;"> Dados Institucionais</legend>
                          <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Nome </label>
                              <div class="col-sm-9">
								<input type="hidden" name="id" value="<?php echo $resultado['cod_instituicao']; ?>" >
                                <input name="nome" id="nome" type="text" class="form-control"  placeholder="Nome Da Instituição" 
								value="<?php echo utf8_encode($resultado['nome_instituicao']); ?>" autofocus required >
                              </div>
                          </div><!--Form-Group-->
						  
					<div class="form-group">
						<label for="diretor" class="col-sm-2 control-label">Diretor</label>
							<div class="col-sm-8">
								<select name="diretor" id="diretor" class="form-control" required>
									<option style="color:#eee;" value="selecione">Selecione</option>
									
									<?php while($dados_diretor = mysqli_fetch_array($consulta_diretor)){ ?>
										<?php if( $resultado['diretor_instituicao'] == $dados_diretor['cod_diretor']){?>
											<option value="<?php echo $dados_diretor["cod_diretor"]; ?>" selected><?php echo utf8_encode($dados_diretor["nome_diretor"]); ?></option>
										<?php }else{?>
										<option value="<?php echo $dados_diretor["cod_diretor"]; ?>"><?php echo utf8_encode($dados_diretor["nome_diretor"]); ?></option>
									<?php } }?>
								
								</select>
							</div>
					</div><!--Form-Group-->
					
					<div class="form-group">
						<label for="tipo" class="col-sm-2 control-label">Tipo</label>
							<div class="col-sm-4">
								<select name="tipo" id="tipo" class="form-control" required>
									<option style="color:#eee;" value="selecione">Selecione</option>
						
									<?php while($dados_tipo = mysqli_fetch_array($consulta_tipo)){ ?>    
										<?php if( $resultado['tipo_instituicao'] == $dados_tipo['id']){?>
											<option value="<?php echo $dados_tipo["id"]; ?>" selected><?php echo utf8_encode($dados_tipo["tipo"]); ?></option>
										<?php }else{?>
										<option value="<?php echo $dados_tipo["id"]; ?>"><?php echo utf8_encode($dados_tipo["tipo"]); ?></option>
										<?php } } ?>
								</select>
							</div>
					</div><!--Form-Group-->
					
						<div class="form-group">
							<label for="situacao" class="col-sm-2 control-label">Situação</label>
								<div class="col-sm-4">
									<select name="situacao" id="situacao" class="form-control" required>
										<option style="color:#eee;" value="selecione">Selecione</option>
										
										<?php while($dados_situacao = mysqli_fetch_array($consulta_situacao)){ ?>    
											<?php if( $resultado['situacao_instituicao'] == $dados_situacao['id']){?>
											<option value="<?php echo $dados_situacao["id"]; ?>" selected><?php echo utf8_encode($dados_situacao["tipo"]); ?></option>
											<?php }else{?>
											<option value="<?php echo $dados_situacao["id"]; ?>"><?php echo utf8_encode($dados_situacao["tipo"]); ?></option>
										<?php } } ?>
									</select>
								</div>
						</div><!--Form-Group-->
					
                          <div class="form-group">
                            <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                              <div class="col-sm-5">
                                <input type="text" name="telefone" id="telefone" class="form-control" 
								placeholder=" Ex:.(XX) XXXX-XXXX" value="<?php echo utf8_encode($resultado['telefone_instituicao']); ?>" required />
                              </div>
                          </div><!--Form-Group-->
					
					</fieldset><!--Fim Do Fieldset-->
				</div><!--Fim Da Coluna-->

			<div class="col-md-6"><!--Inicio Da Coluna-->
				<fieldset><!--Inicio Do Fieldset-->
					<legend style="font-weight:bold;">Endereço</legend>
	
						<div class="form-group">
                            <label for="nome" class="col-sm-3 control-label">Cidade</label>
                              <div class="col-sm-6">
                                <input name="cidade" id="cidade" type="text" class="form-control"  
								placeholder="Cidade" value="<?php echo utf8_encode($resultado['cidade_instituicao']); ?>" required/>
                              </div>
                        </div><!--Form-Group-->
						  
						<div class="form-group">
							<label for="estado" class="col-sm-3 control-label">Estado</label>
								<div class="col-sm-4">
									<select name="estado" id="estado" class="form-control" required>
										
										<option style="color:#eee;" 
										value="<?php echo utf8_encode($resultado['estado_instituicao']); ?>">
										<?php echo utf8_encode($resultado['estado_instituicao']); ?>
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
                              <div class="col-sm-9">
                                <input name="bairro" id="bairro" type="text" class="form-control"
								placeholder="Bairro" value="<?php echo utf8_encode($resultado['bairro_instituicao']); ?>" required/>
                              </div>
                        </div><!--Form-Group-->
					
						<div class="form-group">
                            <label for="complemento" class="col-sm-3 control-label">Complemento</label>
                              <div class="col-sm-6">
                                <input name="complemento" id="complemento" type="text" class="form-control"
								placeholder="Complemento" value="<?php echo utf8_encode($resultado['complemento_instituicao']); ?>" required />
                              </div>
                        </div><!--Form-Group-->
						<div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                              <div class="col-sm-9">
                                <input type="email" id="email" name="email" class="form-control" 
								placeholder="Ex:. sucep@hotmail.com" value="<?php echo utf8_encode($resultado['email_instituicao']); ?>" required />
                              </div>
                          </div><!--Form-Group-->
				</fieldset><!--Fim Do Fieldset-->
			</div><!--Fim Da Coluna-->
		</div><!--Fim Da Liha 2.1-->
		
				<div class="row"><!--Inicio Da Linha 2.3-->
					<div class="col-md-12"><!--Inicio Da Coluna-->				  
						  <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="chekbox">
                                  <label data-toggle="modal" data-target="#myModal">
                                    <input type="checkbox" name="termo" value="Aceito"
									data-toggle="tooltip" data-placement="top" title="Marque esta caixa se deseja continuar" required />
                                     Aceito os Termos e a Politica de Privacidade do Sistema Sucep
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
                              <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="bottom" title="Finaizar ALteração">Finalizar Alteração</button>
                              <button class="btn btn-success" type="reset" data-toggle="tooltip" data-placement="bottom" title="Corrigir o Alteração">Corrigir Alteração</button>                           
                            </div>
                          </div><!--Form-Group-->
					</div><!--Fim Da Coluna-->
				</div><!--Fim Da Liha 2.4-->
			</form>
			<?php include "modal/termo_uso.php"; ?>
		</div> <!-- Fim das Noticias -->	 