<?php 

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$ip = $_SERVER['REMOTE_ADDR'];

	$inserter = 'insert into lx_access values (null,"'.$url.'","'.date('Y-m-d H:i:s').'","'.$ip.'")';
    $conexao->query($inserter);



	if( !function_exists('mobile_user_agent_switch') ){
	function mobile_user_agent_switch(){
		$device = '';
		
		if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
			$device = "ipad";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
			$device = "iphone";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
			$device = "blackberry";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
			$device = "android";
		}
		
		if( $device ) {
			return $device; 
		} return false; {
			return false;
		}
	}
}


if($device == 'iphone'){


	$img = 'promoiphone';

}
else{

	$img = 'promodroid';

}

?>
 <html>
	<head>
		<title>LEX</title>
		<link rel="stylesheet" type="text/css" href="css/lex-style.css">
		<link rel="stylesheet" type="text/css" href="css/lexstyle.css">
		<link rel="stylesheet" href="css/mdl/material.min.css">
		<link rel="shortcut icon" href="images/LEX-FAVICON-COLORED.png" />
		<script src="css/mdl/material.min.js"></script>
		<link rel="manifest" href="manifest.json">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<meta name="theme-color" content="#000">
	</head>s
	<body onselectstart='return false;' align='center' style='height: 100%;'>	

		<img id='promo' src='images/<?php echo $img; ?>.png' style='width: 100%;' DISABLED>
	
	</body>

	<script>

		promo.onclick = function(){

			alert('Adicione o LEX na tela inicial do seu smartphone para jogar! Um ícone será adicionado na sua área de trabalho.');

		}

	</script>
</html>