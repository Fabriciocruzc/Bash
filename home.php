<?php
	include "clas/invertdata.php";
	include "clas/validaSessao.php";
	include "clas/conexao.php";
	include "clas/pdo.php";
	include 'clas/configCalendar.php';
	$info =  array(
		'tabela' => 'eventos',
		'titulo' => 'titulo',
		'data' => 'data',
		'instituicao' => 'instituicao',
		'usuario' => 'usuario',
		'data_criacao' => 'data_criacao',
		'id' => 'id'
		);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon/icon-title.png">

    <title>sugeEDU - Sistema Unificado de Gestão Escolar Educacional</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style_calendar.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css/dashboard.css" rel="stylesheet">
	<script src="js/ie-emulation-modes-warning.js"></script>
	<style type="text/css">

		body {
			padding-top: 0px;
		}
		#user{
				color: #333;
				padding-bottom: 10px;
		}
		.sidebar{
			background-image: url("img/fdIndex.jpg");
			background-repeat: no-repeat;
			background-color: #ffffff;
			top: 0px;
		}
		.sidebar a{
			color: #000;
		}
		.navbar,a:hover {
			color: #1E90FF;
		}
		#link img:hover{
			zoom: 80%;
		}
		.icon-bar{
			background-color:#fff;
		}
		.breadcrumb{
			margin-top: -20px;
			font-size: 12px;
		}
		.table-striped > tbody > tr{
			background-color: #ccc;
		}
		.table-hover > tbody > tr:hover{
			background-color: #7EC0EE;
			color: #fff;
			cursor: url("icon/lupa.cur"), default;
		}
		
	</style>
  </head>

  <body>
	<div class="container-fluid">
      <div class="row">
		<?php
			include_once("menu/menuLateral.php"); 
			$link = $_GET["link"];
			$pag[1] =  "principal.php"; 
			$pag[2] =  "cad_instituicao.php";
			$pag[3] =  "cad_diretor.php";
			$pag[4] =  "cad_aluno.php";
			$pag[5] =  "cad_professor.php";
			$pag[6] =  "cad_disciplina.php";
			$pag[7] =  "cad_turma.php";
			$pag[8] =  "list_instituicao.php";
			$pag[9] =  "edit_instituicao.php";
			$pag[10] =  "view_instituicao.php";
			$pag[11] = "list_diretor.php";
			$pag[12] = "edit_diretor.php";
			$pag[13] = "view_diretor.php";
			$pag[14] = "list_aluno.php";
			$pag[15] = "edit_aluno.php";
			$pag[16] = "view_aluno.php";
			$pag[17] = "list_professor.php";
			$pag[18] = "edit_professor.php";
			$pag[19] = "view_professor.php";
			$pag[20] = "list_disciplina.php";
			$pag[21] = "edit_disciplina.php";
			$pag[22] = "view_disciplina.php";
			$pag[23] = "list_turma.php";
			$pag[24] = "edit_turma.php";
			$pag[25] = "view_turma.php";
			$pag[26] = "cad_usuario.php";
			$pag[27] = "list_usuario.php";
			$pag[28] = "edit_usuario.php";
			$pag[29] = "view_usuario.php";
			$pag[30] = "cad_horario.php";
			$pag[31] = "list_horario.php";
			$pag[32] = "pesquisa_horario.php";
			$pag[33] = "view_horario.php";
			$pag[34] = "edit_horario.php";
			$pag[35] = "calendario.php";
			$pag[36] = "frequencia.php";
			$pag[37] = "list_frequencia.php";
			
			if(!empty($link)){
				if(file_exists($pag[$link])){	
					include $pag[$link];
				}else{
					include "principal.php";
				}
			}else{
					include "principal.php";
			}
		?>	 
		
		</div>	<!-- Fim row--> 
	  </div><!-- Fim container -->
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/funcao.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/holder.min.js"></script>
	<script>
		$('[data-toggle="tooltip"]').tooltip();
	</script>
  </body>
</html>
