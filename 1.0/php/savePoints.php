<?php

	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	
	$points = $_POST['lx_points'];

	$sell = 'select nm_player, qt_points from lx_ranking order by qt_points desc limit 3';

	$query = $conexao->query($sell);
	$row = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);

	$position = 0;

	$player = 0;

	$return = "
	<table width='70%' cellspacing='0' style='margin-left: 15%;'>

		<tr>
			<td colspan='3'>
				
				<label class='lex-label-game' style='margin-bottom:15px;'>RANKING</label>

			</td>
		</tr>
	";

	if($count > 0){

		do{

			$position++;

			if($row['qt_points'] >= $points){

				if($position == 1){

					$return .= "

					<tr class='lex-first-rank'>
						
						<td>
							<label class='lex-cyan-box-label padding-all label-center'>".$position."º</label>
						</td>

						<td width='50%'>
							<label class='lex-cyan-box-label padding-all'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-cyan-box-label padding-all label-center'>".$row['qt_points']."</label>
						</td>

					</tr>

					";
				}
				else if($position <= 3){

					$return .= "

					<tr class='lex-others-rank'>
						
						<td>
							<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$position."º</label>
						</td>

						<td width='50%'>
							<label class='lex-black-box-label padding-all lex-font-gray'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$row['qt_points']."</label>
						</td>

					</tr>

					";

				}
				else{

					$return .= "

					<tr class='lex-player-rank'>
						
						<td>
							<label class='lex-pink-box-label padding-all label-center'>".$position."º</label>
						</td>

						<td width='50%'>
							<label class='lex-pink-box-label padding-all lex-font-gray'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-pink-box-label padding-all label-center'>".$row['qt_points']."</label>
						</td>

					</tr>

					";

				}

			}
			else{
			

				if($position == 1){

					if($player == 0){

						$return .= "

						<tr class='lex-first-rank'>
							
							<td>
								<label class='lex-cyan-box-label padding-all label-center'>".$position."º</label>
							</td>

							<td width='50%'>
								<div class='lex-cyan-box-label table-ranking'>
									<input type='text' id='lxplayer' disabled class='lex-cyan-box-label padding-all-input' placeholder='Digite seu nome'>
								</div>
							</td>

							<td width='35%'>
								<label class='lex-cyan-box-label padding-all label-center'>".$points."</label>
							</td>

						</tr>

						";

						$position++;
						$player = 1;

					}

					$return .= "

					<tr class='lex-others-rank'>
						
						<td>
							<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$position."º</label>
						</td>

						<td width='50%'>
							<label class='lex-black-box-label padding-all lex-font-gray'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$row['qt_points']."</label>
						</td>

					</tr>

					";
				}
				else if($position <= 3){


					if($player == 0){

						$return .= "

						<tr class='lex-others-rank'>
							
							<td>
								<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$position."º</label>
							</td>

							<td width='50%'>
								<div class='lex-black-box-label table-ranking'>
									<input type='text' id='lxplayer'  disabled class='lex-black-box-label padding-all-input' placeholder='Digite seu nome'>
								</div>
							</td>

							<td width='35%'>
								<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$points."</label>
							</td>

						</tr>

						";

						$player = 1;
						$position++;

					}


					$return .= "

					<tr class='lex-others-rank'>
						
						<td>
							<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$position."º</label>
						</td>

						<td width='50%'>
							<label class='lex-black-box-label padding-all lex-font-gray'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-black-box-label padding-all label-center lex-font-gray'>".$row['qt_points']."</label>
						</td>

					</tr>

					";

				}
				else{

					if($player == 0){

						$return .= "

						<tr class='lex-player-rank'>
							
							<td>
								<label class='lex-pink-box-label padding-all label-center'>".$position."º</label>
							</td>

							<td width='50%'>
								<div class='lex-pink-box-label table-ranking'>
									<input type='text' id='lxplayer' disabled class='lex-pink-box-label padding-all-input' placeholder='Digite seu nome'>
								</div>
							</td>

							<td width='35%'>
								<label class='lex-pink-box-label padding-all label-center'>".$points."</label>
							</td>

						</tr>

						";

						$player = 1;
						$position++;

					}

					$return .= "

					<tr class='lex-player-rank'>
						
						<td>
							<label class='lex-pink-box-label padding-all label-center'>".$position."º</label>
						</td>

						<td width='50%'>
							<label class='lex-pink-box-label padding-all lex-font-white'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-pink-box-label padding-all label-center'>".$row['qt_points']."</label>
						</td>

					</tr>

					";

				}				

			}


		}
		while($row = mysqli_fetch_assoc($query));

	}

	if($player == 0){

	$sell = 'select count(*) as qt from lx_ranking where qt_points >='.$points;

	$query = $conexao->query($sell);
	$row = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);

	if($count > 0){

		do{

			$newPosition = $row['qt'] + 1;

		}
		while($row = mysqli_fetch_assoc($query));

	}



		$return .= "

			<tr class='lex-player-rank'>
				
				<td>
					<label class='lex-pink-box-label padding-all label-center'>".$newPosition."º</label>
				</td>

				<td width='50%'>
					<div class='lex-pink-box-label table-ranking'>
						<input type='text' id='lxplayer' disabled class='lex-pink-box-label padding-all-input' placeholder='Digite seu nome'>
					</div>
				</td>

				<td width='35%'>
					<label class='lex-pink-box-label padding-all label-center'>".$points."</label>
				</td>

			</tr>

			";


	}

	$return .= "
		<tr>

			<td colspan='3'>
				<button class='lex-pink-button' style='margin-top:6px;' id='lx_saver' onclick='save()'></button>
			</td>

		</tr>
		
	</table>
	";


	$points = $_POST['lx_points'];
	$player = $_POST['lx_player'];

	$player = preg_replace('/\PL/u', '', $player);

	$inserter = 'insert into lx_ranking values (null,"'.utf8_decode($player).'","'.$points.'","'.date('Y-m-d H:i:s').'")';
    $conexao->query($inserter);

	echo $return;
	
?>