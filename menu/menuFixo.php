<!--Inicio do Menu Fixo do Topo-->
    <nav class="navbar navbar-edit navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php?link=1"> <b style="font-size:20px; color: #fff;">Sucep</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		
          <ul class="nav navbar-nav navbar-right">
         	
			<!-- Menu Dropdow do Usuário-->
			<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="icon/icon-usuario.png" width=" 20"class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nome_usu']; ?></span>
			  <small><?php echo $_SESSION['cpf_usu']; ?></small>
            </a>
            <ul class="dropdown-menu">
              <!-- imagem do usuário -->
              <li class="user-header text-center">
                <img src="icon/icon-usuario.png" width="50" class="img-circle" alt="User Image">
                <p id="span">
					<?php echo $_SESSION['nome_usu']; ?>
                  <small><?php echo $_SESSION['cpf_usu']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Ver Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="clas/logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Sair</a>
                </div>
              </li>
			  <!-- footer do dropdow-->
            </ul>
          </li>
		  <!-- Fim Menu Dropdow do Usuário-->
		  
          </ul>
        </div>
      </div>
    </nav>
	<!--Fim do Menu Fixo do Topo-->
