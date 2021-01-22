<?php

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");

	$sell = 'select nm_player, qt_points from lx_ranking order by qt_points desc limit 10';

	$query = $conexao->query($sell);
	$row = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);

	$position = 0;

	$return = "
	<table width='70%' cellspacing='0' style='margin-left: 15%;'>

		<tr>
			<td colspan='3'>
				
				<label class='lex-label-game' style='margin-bottom:15px;'>TOP 10</label>

			</td>
		</tr>
	";

	if($count > 0){

		do{

			$position++;

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
				else if($position <= 9){

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
							<label class='lex-pink-box-label padding-all'>".utf8_encode($row['nm_player'])."</label>
						</td>

						<td width='35%'>
							<label class='lex-pink-box-label padding-all label-center'>".$row['qt_points']."</label>
						</td>

					</tr>

					";

				}

		}
		while($row = mysqli_fetch_assoc($query));

	}

	
	echo $return;
	
?>