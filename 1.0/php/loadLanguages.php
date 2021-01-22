<?php

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	

	$sell = 'select * from lx_language';

	$query = $conexao->query($sell);
	$row = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);

	$retorno = "";

	if($count > 0){

		do{

			if($row['id_language'] == 6){

				$retorno .= "<option value='".$row['nm_type']."' content='".utf8_encode($row['cd_parameters'])."'>".utf8_encode($row['nm_language'])." (Português)</option>";

			}
			else{
			
				$retorno .= "<option value='".$row['nm_type']."' content='".utf8_encode($row['cd_parameters'])."'>".utf8_encode($row['nm_language'])."</option>";

			}

		}
		while($row = mysqli_fetch_assoc($query));

	}

	echo $retorno;

?>