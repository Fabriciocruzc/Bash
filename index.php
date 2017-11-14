<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon/icon-title.png">
	 <meta http-equiv="refresh" content="20">

    <title>sugeEDU - Sistema Unificado de Gestão Escolar Educacional</title>

    <!-- Bootstrap core CSS -->
	<link href="css/login.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css/dashboard.css" rel="stylesheet">
	<script src="js/ie-emulation-modes-warning.js"></script>
	<style type="text/css">
		body{
			background-image: url("img/fdIndex.jpg");
			background-repeat: no-repeat;
		}
		#img{
			position: absolute;
			top:36%;
			left:70%;
		}
	</style>
  </head>
  
  <body>
		<div class="container">
			<div class="row">
			  <div class="col-md-6 col-md-offset-3">
				<div class="">
							  <form class="form-signin" method="post" action="clas/validaLogin.php">
							  
											<?php
											  session_start();
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
											  }
											?>
								<h2 class="form-signin-heading text-center"><img src="icon/icon.png" width="" class="img-responsive"></h2>
								<label for="inputEmail" class="sr-only">Cpf</label>
								<input type="text" name="cpf" id="cpf" class="form-control" placeholder="Cpf do usuário" required autofocus />
								<label for="inputPassword" class="sr-only">Password</label>
								<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required />
								<div class="checkbox">
								  <label>
									<input type="checkbox" value="remember-me"> Relembre-me
								  </label>
								</div>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
								<br>
								<p><a href="#">Esqueceu sua senha?</a></p>
								<p><a href="#">Alterar sua senha?</a></p>
							  </form>
							  <footer style="margin-top:40px; margin-bottom:0px;">
								<p style="color:#BEBEBE; text-align:center; font-size:13px;">&copy; 2017 sugeEDU | Desenvolvimeto:<span style="color:#286090;"> sugeEDU</span></p>
							  </footer>
						</div>
						<img src="img/a.png" class="img-responsive" id="img">
					</div>
			   </div>
			</div> <!-- /container -->
	 <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>