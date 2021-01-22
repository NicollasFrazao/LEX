<?php

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	
	$points = $_POST['lx_points'];
	$player = $_POST['lx_player'];

	$player = preg_replace('/\PL/u', '', $player);

	$inserter = 'insert into lx_ranking values (null,"'.utf8_decode($player).'","'.$points.'","'.date('Y-m-d H:i:s').'")';
    $conexao->query($inserter);
?>
