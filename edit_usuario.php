				<?php
					//PEGANDO O ID DA INSTITUIÇÃO
					$id = $_GET['id'];
					//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
					$consulta_usuario = mysqli_query($con, "SELECT *FROM usuario WHERE id = '$id' LIMIT 1");
					$resultado = mysqli_fetch_assoc($consulta_usuario);
					$consulta_tipo = mysqli_query($con, "SELECT * FROM tipo_usuario");
					$consulta_instituicao = mysqli_query($con, "SELECT * FROM  instituicao order by nome_instituicao");
				?>
		 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Editar</a></li>
						<li class="active">Usuário</li>
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
				<h1>Alteração Usuário</h1>
			</div>
			
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=27"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
					
					<a href="processa/proc_apag_usuario.php?id=<?php echo $resultado['id']; ?>"><button class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
				
				
                <form name="form" class="form-horizontal" method="post" action="processa/proc_edit_usuario.php" >
			
				<div class="row"><!--Inicio Da Linha 2.1-->
					<div class="col-md-6"><!--Inicio Da Coluna-->
						<fieldset><!--Inicio Do Fieldset-->
							<legend style="font-weight:bold;"> Dados Pessoais</legend>
                          <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Nome </label>
                              <div class="col-sm-9">
								<input type="hidden" name="id" value="<?php echo $resultado['id']; ?>" >
                                <input name="nome" id="nome" type="text" class="form-control"
								placeholder="Nome Completo" value="<?php echo utf8_encode($resultado['nome']);?>" autofocus required />
                              </div>
                          </div><!--Form-Group-->

                          <div class="form-group">
                            <label for="cpf" class="col-sm-2 control-label">Cpf </label>
                              <div class="col-sm-6">
                                <input name="cpf" id="cpf" type="text" class="form-control"
								placeholder="Cpf Com 11 Digitos" value="<?php echo utf8_encode($resultado['cpf']);?>" required/>
                              </div>
                          </div><!--Form-Group-->
						  
						  <div class="form-group"> 
								  <label for="tipo" class="col-sm-2 control-label">Tipo</label>
									<div class="col-sm-6">
									  <select name="tipo" id="tipo" class="form-control" required>
										<option style="color:#eee; ">Selecione</option>
										
										<?php while($dados_tipo = mysqli_fetch_array($consulta_tipo)){ ?>
											<?php if( $resultado['tipo'] == $dados_tipo['id']){?>
												<option value="<?php echo $dados_tipo["id"]; ?>" selected > <?php echo utf8_encode($dados_tipo["tipo"]); ?></option>
											<?php }else{?>
											<option value="<?php echo $dados_tipo["id"]; ?>"><?php echo utf8_encode($dados_tipo["tipo"]); ?></option>
										<?php } }?>
										
									  </select>
									 </div>
								  </div><!--Form-Group--> 
						 
						<div class="form-group">
                            <label for="escola" class="col-sm-2 control-label">Instituição</label>
                              <div class="col-sm-8">
                                <select name="escola" id="escola" class="form-control" required>
                                  <option style="color:#eee; ">Selecione a Instituição</option>
								  
									<?php while($dados_instituicao = mysqli_fetch_array($consulta_instituicao)){ ?>
										<?php if( $resultado['instituicao'] == $dados_instituicao['cod_instituicao']){?>
											<option value="<?php echo $dados_instituicao["cod_instituicao"]; ?>" selected > <?php echo utf8_encode($dados_instituicao["nome_instituicao"]); ?></option>
										<?php }else{?>
										<option value="<?php echo $dados_instituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_instituicao["nome_instituicao"]); ?></option>
									<?php } }?>
                                
								
								</select>
                              </div>
                          </div><!--Form-Group-->
						 
							
						  </fieldset><!--Fim Do Fieldset-->
						</div><!--Fim Da Coluna-->

					<div class="col-md-6"><!--Inicio Da Coluna-->
						<fieldset><!--Inicio Do Fieldset-->
							<legend style="font-weight:bold;"> Contatos</legend>
                          <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email</label>
                              <div class="col-sm-8">
                                <input type="email" id="email" name="email" class="form-control"
								placeholder="Ex:. sucep@hotmail.com" value="<?php echo utf8_encode($resultado['email']);?>" required />
                              </div>
                          </div><!--Form-Group-->

                          <div class="form-group">
                            <label for="senha" class="col-sm-4 control-label">Senha</label>
                              <div class="col-sm-6">
                                <input type="password" name="senha" id="senha" class="form-control"
								placeholder="Senha" value="<?php echo utf8_encode($resultado['senha']);?>" required />
                              </div>
                          </div><!--Form-Group-->
						  
						  <div class="form-group">
                            <label for="confirma-senha" class="col-sm-4 control-label">Confirma Senha</label>
                              <div class="col-sm-6">
                                <input type="password" name="confirma_senha" id="confirma-senha" class="form-control"
								placeholder="Confirme Senha" value="<?php echo utf8_encode($resultado['senha']);?>" required />
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
                              <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="bottom" title="Finaizar Cadastro">Finalizar Alteração</button>
                              <button class="btn btn-success" type="reset" data-toggle="tooltip" data-placement="bottom" title="Corrigir o Cadastro">Corrigir Alteração</button>                           
                            </div>
                          </div><!--Form-Group-->
					</div><!--Fim Da Coluna-->
				</div><!--Fim Da Liha 2.4-->
       
		</form><!--Fim do Form-->
			<?php include "modal/termo_uso.php"; ?>
	</div>