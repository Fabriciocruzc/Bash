			<?php
				//PEGANDO O ID DA INSTITUIÇÃO
				$turma = $_GET['turma'];
				$instituicao = $_GET['instituicao'];
				$ano = $_GET['ano'];
				//FAZENDO CONSULTA NO BANCO PELO ID DA INSTITUIÇÃO
				$sql_consulta = mysqli_query($con, "SELECT * FROM horario  WHERE instituicao = '$instituicao' AND turma = '$turma' AND ano = '$ano' LIMIT 5");
				$resultado = mysqli_fetch_assoc($sql_consulta);
			?>
		
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb">
						<li><a href="home.php?link=1">Inicio</a></li>
						<li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
						<li><a href="#">Visualização</a></li>
						<li class="active">Horário</li>
					</ol>
			<div class="page-header">
			<?php
			$turma = utf8_encode($resultado["turma"]);
			$sql_turma = mysqli_query($con, "SELECT nome_turma, turno_turma FROM turma WHERE cod_turma = '$turma' LIMIT 1");
			$result_turma = mysqli_fetch_assoc($sql_turma);
			$tm = utf8_encode($result_turma["nome_turma"]);
			$t_tm = utf8_encode($result_turma["turno_turma"]);
			$sql_turno = mysqli_query($con, "SELECT turno FROM turno WHERE id = '$t_tm' LIMIT 1");
			$result_turno = mysqli_fetch_assoc($sql_turno);
			$turno = utf8_encode($result_turno["turno"]);
			?>
				<h1>Horário Turma - <?php echo $tm." ID [".$turma."] Turno - ".$turno;?></h1>
			</div>
			<div class="row">
				<div class="pull-right">
					<a href="home.php?link=31"><button class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" title="Listar"></span>
					Listar</button></a>
							  
					<a href="home.php?link=34&turma=<?php echo $resultado["turma"]; ?>&instituicao=<?php echo $resultado["instituicao"]; ?>&ano=<?php echo $resultado["ano"]; ?>"><button class="btn btn-md btn-warning">
						<span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></span>
					Editar</button></a>
                              
					<a href="processa/proc_apag_horario.php?turma=<?php echo $resultado["turma"]; ?>&instituicao=<?php echo $resultado["instituicao"]; ?>&ano=<?php echo $resultado["ano"]; ?>"><button class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Apagar"></span>
					Remover</button></a>
				</div>
			</div>
			<hr class="divider">
			<div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <thead>
							<tr class="info">
								<th></th>
								<th>Horário</th>
              					<th>Segunda</th>
              					<th>Terça</th>
              					<th>Quarta</th>
              					<th>Quinta</th>
              					<th>Sexta</th>
              				</tr>
              			</thead>		
                        <tbody>
							
            				<?php 
							$sql_consulta = mysqli_query($con, "SELECT * FROM horario  WHERE instituicao = '$instituicao' AND turma = '$turma' AND ano = '$ano' LIMIT 5");
							$sql_disciplina = mysqli_query($con, "SELECT * FROM disciplina");
							$n = 0;
							while($resultado = mysqli_fetch_assoc($sql_consulta)){ ?>
            					<?php
								//pegando os nomes da disciplinas
								//segunda
								$segunda = utf8_encode($resultado["segunda"]);
								$sql_seg = mysqli_query($con, "SELECT nome_disciplina FROM disciplina WHERE cod_disciplina = '$segunda'");
								$result_seg = mysqli_fetch_assoc($sql_seg);
								$seg = utf8_encode($result_seg["nome_disciplina"]);
								//terça
								$terca = utf8_encode($resultado["terca"]);
								$sql_ter = mysqli_query($con, "SELECT nome_disciplina FROM disciplina WHERE cod_disciplina = '$terca'");
								$result_ter = mysqli_fetch_assoc($sql_ter);
								$ter = utf8_encode($result_ter["nome_disciplina"]);
								//quarta
								$quarta = utf8_encode($resultado["quarta"]);
								$sql_qua = mysqli_query($con, "SELECT nome_disciplina FROM disciplina WHERE cod_disciplina = '$quarta'");
								$result_qua = mysqli_fetch_assoc($sql_qua);
								$qua = utf8_encode($result_qua["nome_disciplina"]);
								//quinta
								$quinta = utf8_encode($resultado["quinta"]);
								$sql_qui = mysqli_query($con, "SELECT nome_disciplina FROM disciplina WHERE cod_disciplina = '$quinta'");
								$result_qui = mysqli_fetch_assoc($sql_qui);
								$qui = utf8_encode($result_qui["nome_disciplina"]);
								//sexta
								$sexta = utf8_encode($resultado["sexta"]);
								$sql_sex = mysqli_query($con, "SELECT nome_disciplina FROM disciplina WHERE cod_disciplina = '$sexta'");
								$result_sex = mysqli_fetch_assoc($sql_sex);
								$sex = utf8_encode($result_sex["nome_disciplina"]);
								
								
								$n = $n+1;
								?>
								<tr>
									<td align="center"><?php echo "<b>".$n."°</b>"; ?></td>
									<td><?php echo utf8_encode($resultado["horario"]); ?></td>
									<td><?php echo $seg; ?></td>
									<td><?php echo $ter; ?></td>								
									<td><?php echo $qua; ?></td>								
									<td><?php echo $qui; ?></td>								
									<td><?php echo $sex; ?></td>								
								</tr>	
						
            				<?php } ?>	
            			</tbody>			  
            		</table>
					<div class="alert alert-info" role="alert">
						<p>* Legenda - Matutino<br> <strong>1° horário :</strong> 07:00 ate 07:45 - <strong>2° horário :</strong> 07:45 ate 08:30 - 
						<strong>Intervalo :</strong> 08:30 ate 08:50 - <strong>3° horário :</strong> 08:50 ate 09:35 - 
						<strong>4° horário :</strong> 09:35 ate 10:20 <strong>5° horário :</strong> 10:30 ate 11:15 </p>
						
						<p>* Legenda - Vespertino<br> <strong>1° horário :</strong> 13:00 ate 13:45 - <strong>2° horário :</strong> 13:45 ate 14:30 - 
						<strong>Intervalo :</strong> 14:30 ate 14:50 - <strong>3° horário :</strong> 14:50 ate 15:35 - 
						<strong>4° horário :</strong> 15:35 ate 16:20 <strong>5° horário :</strong> 16:30 ate 17:15 </p>
					</div>
				</div><!--Fim do Table Responvive-->
			
			
		</div> <!-- Fim col -->	 