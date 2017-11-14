
		<!-- Corpo dos Links -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			 <ol class="breadcrumb">
				  <li><a href="home.php?link=1">Inicio</a></li>
				  <li><a href="#"><?php echo $_SESSION['nome_usu']." (".$_SESSION['cpf_usu'].")"; ?></a></li>
				  <li class="active">Painel Administrativo</li>
			</ol>
		<!-- Inicio dos Links -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder" data-toggle="tooltip" data-placement="top" title="Estátisticas">
              <a href="#dados" id="link"><img src="img/img-dados.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Estátisticas</h4>
              <span class="text-muted">Informações</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder" data-toggle="tooltip" data-placement="top" title="Discentes">
              <a href="home.php?link=14" id="link"><img src="img/img-aluno.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Alunos</h4>
              <span class="text-muted">Visualizar</span>
            </div>
			<div class="col-xs-6 col-sm-3 placeholder" data-toggle="tooltip" data-placement="top" title="Docentes">
              <a href="home.php?link=17" id="link"><img src="img/img-prof.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Professores</h4>
              <span class="text-muted">Visualizar</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder" data-toggle="tooltip" data-placement="top" title="Instituições">
              <a href="home.php?link=8" id="link"><img src="img/img-instituicao-home.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Instituições</h4>
              <span class="text-muted">Informações</span>
            </div>
          </div>
         </div><!-- Fim dos Links -->
		 
		  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="dados">
				
				<div class="row">
					<hr class="divider">
					
					<h1 align="left">Estátisticas</h1>
					
					<div class="col-md-5 col-ms-5 col-xs-5">		
						<div id="piechart_3d"></div>
					</div>
					
					<div class="col-md-7 col-ms-7 col-sx-7 ">
						<?php 
						$con_inst =   mysqli_query($con, "SELECT * FROM instituicao");
						$total_inst = mysqli_num_rows($con_inst);
						$con_dir =   mysqli_query($con, "SELECT * FROM diretor");
						$total_dir = mysqli_num_rows($con_dir);
						$con_doc =   mysqli_query($con, "SELECT * FROM docente");
						$total_doc = mysqli_num_rows($con_doc);
						$con_dis =   mysqli_query($con, "SELECT * FROM discente");
						$total_dis = mysqli_num_rows($con_dis);
						$con_usu =   mysqli_query($con, "SELECT * FROM usuario");
						$total_usu = mysqli_num_rows($con_usu);
						
						?>
						<div id="columnchart_values"></div>
					</div>	
				</div><!--fim row-->	
				
			</div><!--fim col-->	
				

	<script type="text/javascript" src="js/google_charts.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Dados Do Sistema', 'Quantidade'],
          ['Instituição',     <?php echo $total_inst; ?>],
          ['Diretor',      <?php echo $total_dir; ?>],
          ['Docente',  <?php echo $total_doc; ?>],
          ['Discente', <?php echo $total_dis; ?>],
          ['Usuários',    <?php echo $total_usu; ?>]
        ]);

        var options = {
          title: 'Estátisticas dos Dados Sistemáticos',
		  width: 500,
		  height: 500,
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>				
	
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  var data = google.visualization.arrayToDataTable([
         ['Tipo', 'Quantidade', { role: 'style' }, { role: 'annotation' } ],
         ['Instituição', <?php echo $total_inst; ?>, '#1E90FF', 'IN' ],
         ['Diretores', <?php echo $total_dir; ?>, '#3CB371', 'DR' ],
         ['Docentes', <?php echo $total_doc; ?>, '#FFA500', 'PR' ],
         ['Discentes', <?php echo $total_dis; ?>, '#e5e4e2', 'AL' ],
         ['Usuários', <?php echo $total_usu; ?>, '#8B008B', 'US' ]
      ]);
	    var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Grafico dos Dados do Sistema",
        width: 650,
        height: 500,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);

	  }
	</script>
