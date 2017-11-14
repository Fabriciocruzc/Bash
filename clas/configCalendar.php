<?php
	function num($num){
		return ($num < 10)? '0'.$num : $num;
	}

	function montaEventos($info){
		global $pdo;
		//tabela, data, titulo, link
		$tabela = $info['tabela'];
		$titulo = $info['titulo'];
		$data = $info['data'];
		$instituicao = $info['instituicao'];
		$usuario = $info['usuario'];
		$data_criacao = $info['data_criacao'];
		$id = $info['id'];
		$now = date('Y-m-d');

		$eventos = $pdo->prepare("SELECT * FROM `".$tabela."`");
		$eventos->execute();

		$retorno = array();
		while($row = $eventos->fetchObject()){
			$retorno[$row->{$data}] =  array(
				'titulo' => $row->{$titulo},
				'id' => $row->{$id},
				'data' => $row->{$data}
				);
		}
		return $retorno;
	}


	function diasMeses(){
		$retorno = array();
		for($i = 1; $i<=12; $i++){
			$retorno[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));
		} 
		return $retorno;
	}

	function montaCalendario($eventos = array()){
		$daysWeek = array(
			'Sun',
			'Mon',
			'Tue',
			'Wed',
			'Thu',
			'Fri',
			'Sat'
			);
		$diasSemana = array(
			'Dom',
			'Seg',
			'Ter',
			'Qua',
			'Qui',
			'Sex',
			'Sàb'
			);
		$arrayMes = array(
			1 => 'Janeiro',
			2 => 'Fevereiro',
			3 => 'Março',
			4 => 'Abril',
			5 => 'Maio',
			6 => 'Junho',
			7 => 'Julho',
			8 => 'Agosto',
			9 => 'Setembro',
			10 => 'Outubro',
			11 => 'Novembro',
			12 => 'Dezembro'
			); 
		
		$diasMeses = diasMeses();
		$arrayRetorno = array();
			
			for($i = 1; $i<=12; $i++){
				$arrayRetorno[$i] = array();
				for($n = 1; $n<= $diasMeses[$i]; $n++){
					$dayMonth = GregorianToJD($i, $n, date('Y'));
					$weekMonth = substr(JDDayOfWeek($dayMonth, 1),0,3);
					if($weekMonth == 'Mun') $weekMonth = 'Mon';
					$arrayRetorno[$i][$n] = $weekMonth; 
				}
			}
			echo'<a href="#" id="back">&laquo;</a><a href="#" id="next">&raquo;</a>';
			echo '<table class="table table-responsive table-bordered" width="100%">';
			foreach ($arrayMes as $num => $mes) {
				echo '<tbody id="mes_'.$num.'" class="mes">';
					echo '<tr class="mes_title"><td colspan="7">'.$mes.'</td></tr>';
					echo '<tr class="dias_title">';
						foreach ($diasSemana as $i => $dia) {
							echo '<td>'.$dia.'</td>';
						}
					echo '</tr><tr>';
					$y = 0;
					foreach ($arrayRetorno[$num] as $numero => $dia) {
						$y++;
						if($numero == 1){
							$qtd = array_search($dia, $daysWeek);
							for ($i=1; $i <= $qtd ; $i++) { 
								echo '<td></td>';
								$y+=1;
							}
						}
						//marcando evento no calendario
						if(count($eventos) > 0){
							$month = num($num);
							$daysNow = num($numero);
							$date = date('Y').'-'.$month.'-'.$daysNow;
							if(in_array($date, array_keys($eventos))){
								$evento = $eventos[$date];
								echo '<td class="evento"><a class="link" href="home.php?link=&id='.$evento['id'].'" data-toggle="tooltip" data-placement="top" title="'.$evento['titulo'].' '.inverteData($evento['data']).'">'.$numero.'</a></td>';
							}else{
								
								echo '<td class="dia_'.$numero.'">'.$numero.'</td>';
							}
						}else{
							echo '<td class="dia_'.$numero.'">'.$numero.'</td>';
						}
						
						
						if($y == 7){
							$y = 0;
							echo '</tr><tr>';
						}
					}
				echo '</tr></tbody>';
			}
			echo '</table>';
	}
?>