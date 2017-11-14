
		<?php
			$consulta_instituicao = mysqli_query($con, "Select * From  instituicao Order by nome_instituicao");
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<ol class="breadcrumb">
				  <li><a href="home.php?link=1">Inicio</a></li>
				  <li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
				  <li><a href="#">Cadastros</a></li>
				  <li class="active">Disciplina</li>
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
				<h1>Cadastro Disciplina</h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=20"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
				</div>
			</div>
			<hr class="divider">
			
					<form class="form-horizontal" method="post" action="processa/proc_cad_disciplina.php">

                      <div class="form-group">
                        
                        <div class="form-group">
                          <label for="nome" class="col-sm-2 control-label">Nome Da Disciplina</label>
                           <div class="col-sm-6"> 
                            <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome Da Disciplina" autofocus required/>
                          </div>
                        </div><!--Form-Group-->

                        <div class="form-group">
                            <label for="escola" class="col-sm-2 control-label">Instituição</label>
                              <div class="col-sm-6">
                                <select name="escola" id="escola" class="form-control" required>
								<option style="color:#eee;" value="selecione">Selecione a Instituição</option>
                                  <?php while($dados_insitituicao = mysqli_fetch_array($consulta_instituicao)){ ?>    
                                    <option value="<?php echo $dados_insitituicao["cod_instituicao"]; ?>"><?php echo utf8_encode($dados_insitituicao["nome_instituicao"]); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                          </div><!--Form-Group-->


                    <div class="form-group">
                      <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" name="descricao" id="descricao" rows="5" cols="40"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="chekbox">
                                  <label data-toggle="modal" data-target="#myModal">
                                    <input type="checkbox" name="termo" value="concorda" required />
                                    Concordo com os Termos De Uso da Instituição de Acordo com o Contrato do Sistema Sucep
                                  </label>  
                                </div>
                            </div>
                          </div><!--Form-Group-->

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button class="btn btn-success" type="submit">Finalizar Cadastro</button>
                              <button class="btn btn-success" type="reset">Corrigir Cadastro</button>                           
                            </div>
                          </div><!--Form-Group-->

                    </form><!--Fim do Form-->
					  <?php include "modal/termo_uso.php"; ?>
					</div><!-- Fim das Noticias -->

