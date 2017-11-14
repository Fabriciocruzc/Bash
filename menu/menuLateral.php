	  <!-- Menu Lateral-->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
		  
			  <li class="text-left">
				<img src="img/icon-logo.png" width="100" class="imag-responsive img-circle" alt="SugeEDU">
			  </li>
		  
			<li class="text-center" id="user" >
					<img src="icon/icon-usuario.png" width="50" class="imag-responsive img-circle" alt="User Image">
						<span class="hidden-xs">
							<?php echo $_SESSION['nome_usu']; ?>
						</span>
			</li>
			<li>
			<form class="col-sm-12" method="get" action="">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="Buscar item..." required >
				  <span class="input-group-btn">
					<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
				  </span>
				</div>
			</form>
			</li>			
			<hr>
            <li class=""><a href="home.php?link=1"><img src="icon/icon-inicio.png" width="20"> Inicio</a></li>
			<li><a href="#" class="dropdown-toggle" type="button" id="dropdownMenuCad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<img src="icon/icon-cad.png" width="20"> Cadastros<span class="caret"></span></a>
				 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuCad">
					<li><a href="home.php?link=2"><img src="icon/icon-inst.png" width="20"> Instituições</a></li>
					<li><a href="home.php?link=3"><img src="icon/icon-diretor.png" width="20"> Diretor (a)</a></li>
					<li><a href="home.php?link=4"><img src="icon/icon-aluno.png" width="20"> Discente</a></li>
					<li><a href="home.php?link=5"><img src="icon/icon-prof.png" width="20"> Docente</a></li>
					<li><a href="home.php?link=6"><img src="icon/icon-disciplina.png" width="20"> Disciplinas</a></li>
					<li><a href="home.php?link=7"><img src="icon/icon-turma.png" width="20"> Turmas</a></li>
					<li><a href="home.php?link=26"><img src="icon/icon-users.png" width="20"> Usuários</a></li>
				 </ul>
			</li>
			
			<li><a href="#" class="dropdown-toggle" type="button" id="dropdownMenuCad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<img src="icon/icon-lista.png" width="20"> Listagem <span class="caret"></span></a>
				 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuList">
				 
					<li><a href="home.php?link=8"><img src="icon/icon-inst.png" width="20"> Instituições</a></li>
					<li><a href="home.php?link=11"><img src="icon/icon-diretor.png" width="20"> Diretor (a)</a></li>
					<li><a href="home.php?link=14"><img src="icon/icon-aluno.png" width="20"> Discente</a></li>
					<li><a href="home.php?link=17"><img src="icon/icon-prof.png" width="20"> Docente</a></li>
					<li><a href="home.php?link=20"><img src="icon/icon-disciplina.png" width="20"> Disciplinas</a></li>
					<li><a href="home.php?link=23"><img src="icon/icon-turma.png" width="20"> Turmas</a></li>
					<li><a href="home.php?link=27"><img src="icon/icon-users.png" width="20"> Usuários</a></li>
				</ul>
      
          </ul>
          <ul class="nav nav-sidebar">
    
			<li><a href="#" class="dropdown-toggle" type="button" id="dropdownMenuCad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<img src="icon/icon-time.png" width="20"> Horários<span class="caret"></span></a>
				 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuCad">
					 <li><a href="home.php?link=30"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar</a></li>
					 <li><a href="home.php?link=31"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar</a></li>	
				 </ul>
			<li>
						
			<li><a href="#"><img src="icon/icon-frequencia.png" width="20"> Diários</a></li>
            <li><a href="#"><img src="icon/icon-doc.png" width="20"> Documentos</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#"><img src="icon/icon-perfil.png" width="20"> Perfil</a></li>
            <li><a href="home.php?link=35"><img src="icon/icon-calendar.png" width="20"> Calendario</a></li>
            <li><a href="clas/logout.php" style="color:red;"><img src="icon/icon-exit.png" width="20"> Sair</a></li>
          </ul>
        </div>
		<!-- Fim do Menu Lateral-->