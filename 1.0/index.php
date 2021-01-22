<?php

	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$ip = $_SERVER['REMOTE_ADDR'];

	$inserter = 'insert into lx_access values (null,"'.$url.'","'.date('Y-m-d H:i:s').'","'.$ip.'")';
    $conexao->query($inserter);

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
		<meta http-equiv="Cache-control" content="public">
		<meta name="title" content="LEX - ANYTECH">
		<meta name="description" content="O jogo de idiomas feito pela ANYTECH. O Lex tem como objetivo ajudar você a treinar vocabulário de diferentes idiomas!"/>
		<meta name="author" content="ANYTECH">

		<meta property="og:title" content="LEX" />
		<meta property="og:description" content="O jogo de idiomas feito pela ANYTECH. O Lex tem como objetivo ajudar você a treinar vocabulário de diferentes idiomas!" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://anytech.com.br/lex"/>
		<meta property="og:image" content="https://anytech.com.br/lex/images/lexready.png"/>
		<meta property="og:site_name" content="LEX - ANYTECH" />

	</head>
	<body onselectstart='return false;'>	

		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header"  id='mailer'>
			<header class="mdl-layout__header">
				<div class='lex-sequencial'>				
					<table cellspacing='0' cellspadding='0'>
							<tr>
								<td>
									<div class='lex-points-box-transparent' id='lex_points_box_transparent' onclick='resizer()' >
										<span class='lex-points-score-sequencial' id='lex_points_sequencial'></span>
									</div>
								</td>
							</tr>					
					</table>				
				</div>			
				<div class='lex-lifes'>				
					<table cellspacing='0' cellspadding='0'>
							<tr>
								<td>
									<div class='lex-heart-box' id='lex_life_box'>
									</div>
								</td>
								<td>
									<div class='lex-points-box'   onclick='resizer()' >
										<span class='lex-points-title' id='lex_record'>Record</span><br>
										<span class='lex-points-score' id='lex_points'></span>
									</div>
								</td>
							</tr>					
					</table>				
				</div>			
				<img id='lex_menu_button' class='lex-menu-button' src='images/menu.png'>
				<div class="mdl-layout__header-row">
					<span class="mdl-layout-title"></span>
					<div class="mdl-layout-spacer"></div>
					<nav class="mdl-navigation mdl-layout--large-screen-only">
					</nav>
				</div>
			</header>
			<div class="mdl-layout__drawer" id='lex_menu'>			
				<nav class="mdl-navigation">
					<table cellspadding='0' cellspacing='0' width='100%'>
						<tr>
							<td width='35px'><img src='images/lex-logo-colored.png' class='lex-logo-menu-inside'></td>
							<td align='left'><span class='lex-menu-title'>LEX</span></td>
						</tr>
					</table>				
					<hr class='lex-sep'></hr>				
					<a class="mdl-navigation__link" style='color:#fff;' id='lxtmenu01' onclick='lexTool("lex_play_screen")'>Play</a>
					<a class="mdl-navigation__link" style='color:#fff;' id='lxtmenu03'onclick='top10(); lexTool("lex_top10_screen")'>Top 10</a>
					<a class="mdl-navigation__link" style='color:#fff;' id='lxtmenu02' onclick='lexTool("lex_settings_screen")'>Settings</a>
					<a class="mdl-navigation__link" style='color:#fff; background-color: rgb(255,64,129);' onclick='lexTool("lex_download_screen")'>Download</a>
					<!--<a class="mdl-navigation__link" onclick='lexTool("settings")'>About</a>-->
				</nav>
				<span id='lxtdev' style='position: absolute; bottom: 10px; left: 10px;'>DESENVOLVIDO POR ANYTECH - 2018</span>
			</div>
			<main class="mdl-layout__content lex-main">		

				

				<div class='lex-main-box' id='lex_play_screen'>
					<table width='100%' height='100%' style="margin-top: -20px;" class='table-game' id='table_game'>
						<tr>
							<td width='33%'>
								<button class='lex-button-game' id='lex_option_one' ontouchstart='responder(1)' ontouchend='return false;' ontouch='return false;' onclick='responder(1)'>Option one</button>
							</td>
							<td width='34%'>
								<label class='lex-label-game' id='lex_question' onclick='resizer()'>Question</label>
							</td>
							<td width='33%'>
								<button class='lex-button-game' id='lex_option_two' ontouchstart='responder(2)' ontouchend='return false;' ontouch='return false;' onclick='responder(2)'>Option two</button>
							</td>
						</tr>
					</table>
					<div class='lex-init' id='lex_init'>
						<input type='text' class="lex-black-box-label padding-all-input label-center" id='lx_name' style='margin-bottom: 10px;' placeholder=''>
						<button class='lex-pink-button' id='start_button'  onclick='startLex()'>Play</button>
						
						<label class='lex-animation-label' id='lex_animation_label' style='margin-top: 2%;'>3</label>								
					</div>		
					<div class='lex-load-bar' id='loader'>
						<div class='lex-loader' id='intoloader' style='width: 0%; transition: width 0s'>

						</div>
					</div>
				</div>
				<div class='lex-main-box' id='lex_settings_screen'>
					<table width='100%' height='90%' class='table-settings' id='table_settings'>
						<tr>
							<td width='34%'>
								<div class='table-intern'>
									<label class='lex-cyan-label' id='lxt02'>I speak...</label>
									<select class='lex-select' id='lex_language_in' onchange='changeSettings(1)'>
											
									</select>
								</div>
							</td>
							<td width='34%'>
								<div class='table-intern'>
									<label class='lex-cyan-label' id='lxt03'>I want learn...</label>
									<select class='lex-select' id='lex_language_out' onchange='changeSettings(1)'>
												
									</select>
								</div>
							</td>
							<td width='32%'>
								<div class='table-intern'>
									<label class='lex-cyan-label' id='lxt04'>Theme</label>
									<select class='lex-select' id='lex_theme' onchange='changeSettings(2)'>
										
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td width='34%'>
								<div class='table-intern'>
									<label class='lex-cyan-label' id='lxt05'>Game Time</label>
									<select class='lex-select' id='lex_time' onchange='changeSettings(2)'>
										<option id='lxteasy' value='8'>Easy</option>		
										<option id='lxtmedium' value='5'>Medium</option>		
										<option id='lxthard' value='3'>Hard</option>		
									</select>
								</div>
							</td>
							<td width='34%'>
								<div class='table-intern'>
									<label class='lex-cyan-label' id='lxt06'>Sound</label>
									<select class='lex-select' id='lex_sound' onchange='changeSettings(2)'>
										<option value='ON' id='lxtsound1'>Enabled</option>		
										<option value='OFF' id='lxtsound2'>Disabled</option>		
									</select>
								</div>
							</td>
							<td width='32%'>
								<div class='table-intern'>
									<label class='lex-cyan-label' id='lxt07'>Vibration</label>
									<select class='lex-select' id='lex_vibe' onchange='changeSettings(2)'>
										<option value='ON' id='lxtvibe1'>Enabled</option>		
										<option value='OFF' id='lxtvibe2'>Disabled</option>		
									</select>
								</div>
							</td>							
						</tr>
					</table>			
				</div>

				<div class='lex-main-box' id='lex_top10_screen' style='overflow: auto; margin-bottom: 50px; padding-bottom: 50px;'>

					<table width='70%' cellspacing="0" style='margin-left: 15%;   padding-bottom: 50px;'>

						<tr>
							<td colspan='3'>
								
								<label class='lex-label-game' style='margin-bottom:15px;'>TOP 10</label>

							</td>
						</tr>

						<div id='lex_ranking_table_top10'>
							

						</div>
						
					</table>

				</div>

				<div class='lex-main-box' id='lex_download_screen' style='overflow: auto;'>

					<table width='70%' cellspacing="0" style='margin-left: 15%;'>

						<tr>
							<td colspan='3'>
								
								<br><br>
								<label class='lex-label-game' style='margin-bottom:15px;'>Download</label>

								<span class='lex-label-game min' id='lxd1'>Clique no botão menu (no canto superior direito do navegador, ou abaixo da tela em alguns dispositivos)</span><br>
								<span class='lex-label-game min' id='lxd2'>selecione a opção <b style="color: #00f0b0">"Adicionar À Tela Inicial"</b></span><br>
								<span class='lex-label-game min' id='lxd3'>e jogue o  <b style="color: #f00060">L E X</b>  direto no seu smartphone</span><br>

							</td>
						</tr>

					</table>

				</div>

				<div class='lex-main-box' id='lex_ranking_screen'>

					<table width='70%' cellspacing="0" style='margin-left: 15%;'>

					<tr>
						<td colspan='3'>
							
							<label class='lex-label-game' style='margin-bottom:15px;'>RANKING</label>

						</td>
					</tr>

					<div id='lex_ranking_table'>

						<tr class='lex-first-rank'>
							
							<td>
								<label class="lex-cyan-box-label padding-all label-center">1º</label>
							</td>

							<td width='50%'>
								<label class="lex-cyan-box-label padding-all">Carregando...</label>
							</td>

							<td width='35%'>
								<label class="lex-cyan-box-label padding-all label-center">-</label>
							</td>

						</tr>

						<tr class='lex-others-rank'>
							
							<td>
								<label class="lex-black-box-label padding-all label-center lex-font-gray">2º</label>
							</td>

							<td width='50%'>
								<label class="lex-black-box-label padding-all lex-font-gray">Carregando...</label>
							</td>

							<td width='35%'>
								<label class="lex-black-box-label padding-all label-center lex-font-gray">-</label>
							</td>

						</tr>

						<tr class='lex-others-rank'>
							
							<td>
								<label class="lex-black-box-label padding-all label-center lex-font-gray">3º</label>
							</td>

							<td width='50%'>
								<label class="lex-black-box-label padding-all lex-font-gray">Carregando...</label>
							</td>

							<td width='35%'>
								<label class="lex-black-box-label padding-all label-center lex-font-gray">-</label>
							</td>

						</tr>

						<tr class='lex-player-rank'>
							
							<td>
								<label class="lex-pink-box-label padding-all label-center">20º</label>
							</td>

							<td width='50%'>
								<input type='text' class="lex-pink-box-label padding-all-input" value='Carregando...'>
							</td>

							<td width='35%'>
								<label class="lex-pink-box-label padding-all label-center">-</label>
							</td>

						</tr>

					</div>

					<tr>

						<td colspan='3'>
							<br>
							<button class='lex-pink-button' onclick='save()'>JOGAR NOVAMENTE</button>
						
						</td>

					</tr>
					
				</table>

				


				</div>
				<!-- FIXED ITENS -->

				<button id="demo-show-snackbar" style='display: none;' class="mdl-button mdl-js-button mdl-button--raised" type="button">Show Snackbar</button>
				<div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
					<div class="mdl-snackbar__text"></div>
					<button class="mdl-snackbar__action" type="button"></button>
				</div>
			</main>
		</div>

		<div id='loadbox' align='center'>
			<span class='lex-label-game min'>ANYTECH Presents</span><br>
			<img id='lexload' src='images/lex-logo-colored.png'><br>
			<span class='lex-label-game'>LEX</span>			
		</div>

		<div id='loadbox_lp' align='center'>
			<span class='lex-label-game min' id='lxor1' style='margin-top: 45%;'>Posicione o seu smartphone na horizontal para</span><br>
			<span class='lex-label-game' id='lxor2'>jogar o LEX</span>
			
		</div>
	</body>
	<script src='js/jquery.js'></script>
	<script src="js/responsivevoice.js"></script>

	<script>

		window.onload = function(){

			lexload.style.opacity = '1';

			gamer = '';
			toolGlobal = '';
			starting = 1;
			game_index = 0;
			lex_timeout = '';
			playing = 0;
			animation = 0;
			gamePoints = 0;
			fastvar = '';
			playagain = '';
			ponto_padrao = 0;
			gameover_var = 0;
			starttoplay = 0;



			switch(window.orientation) 
		    {  
		      case -90:
		      	landscapeyes();
		      case 90:
		        landscapeyes();
		        break; 
		      default:
		        	protraitno();
		        break; 
		    }

			loads();


			

		}

		window.addEventListener('orientationchange', function(){
		   	switch(window.orientation) 
		    {  
		      case -90:
		      case 90:
		        landscapeyes();
		        break; 
		      default:
		        protraitno();
		        break; 
		    }
		   });






		function protraitno(){

			loadbox_lp.style.display = 'inline-block';

		}

		function landscapeyes(){

			loadbox_lp.style.display = 'none';

		}


		function toggleFullScreen() {
		  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
		   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
		    if (document.documentElement.requestFullScreen) {  
		      document.documentElement.requestFullScreen();  
		    } else if (document.documentElement.mozRequestFullScreen) {  
		      document.documentElement.mozRequestFullScreen();  
		    } else if (document.documentElement.webkitRequestFullScreen) {  
		      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
		    }  
		  } else {  
		    if (document.cancelFullScreen) {  
		      document.cancelFullScreen();  
		    } else if (document.mozCancelFullScreen) {  
		      document.mozCancelFullScreen();  
		    } else if (document.webkitCancelFullScreen) {  
		      document.webkitCancelFullScreen();  
		    }  
		  }  
		} 

		lx_name.onfocus = function(){

			lex_init.style.paddingTop = '0%';

		}

		lx_name.onblur = function(){

			lex_init.style.paddingTop = '15%';
		}


		function loads(){

			(function() {
			  'use strict';
			  var snackbarContainer = document.querySelector('#demo-snackbar-example');
			  var showSnackbarButton = document.querySelector('#demo-show-snackbar');
			  var handler = function(event) {
			    showSnackbarButton.style.backgroundColor = '';
			  };
			  showSnackbarButton.addEventListener('click', function() {
			    'use strict';
			    showSnackbarButton.style.backgroundColor = '#' +
			        Math.floor(Math.random() * 0xFFFFFF).toString(16);
			    var data = {
			      message: 'Game Over',
			      timeout: 3500,
			      actionHandler: handler,
			      actionText: ':('
			    };
			    snackbarContainer.MaterialSnackbar.showSnackbar(data);
			  });
			}());

			loadLanguages();			
		
		}

		function loadConfig(){

			if(!localStorage.getItem('LEX_LANGUAGE_IN')){

				localStorage.setItem('LEX_LANGUAGE_IN', 'br');
				localStorage.setItem('LEX_LOADING_VOICE', 'CARREGANDO');
				
			}
			lex_language_in.value = localStorage.getItem('LEX_LANGUAGE_IN');



			if(!localStorage.getItem('LEX_LANGUAGE_OUT')){
 
				localStorage.setItem('LEX_LANGUAGE_OUT', 'en');
				localStorage.setItem('LEX_LANGUAGE_VOICE', 'US English Male');
				
			}
			lex_language_out.value = localStorage.getItem('LEX_LANGUAGE_OUT');






			if(!localStorage.getItem('LEX_SOUND')){

				localStorage.setItem('LEX_SOUND','ON');
				
			}
			lex_sound.value = localStorage.getItem('LEX_SOUND');


			if(!localStorage.getItem('LEX_VIBE')){

				localStorage.setItem('LEX_VIBE','ON');
				
			}
			lex_vibe.value = localStorage.getItem('LEX_VIBE');


			if(!localStorage.getItem('LEX_THEME')){

				localStorage.setItem('LEX_THEME', 0);
				
			}
			lex_theme.value = localStorage.getItem('LEX_THEME');

			

			if(!localStorage.getItem('LEX_TIME')){

				localStorage.setItem('LEX_TIME', 5);
				
			}
			
			lex_time.value = localStorage.getItem('LEX_TIME');

			if(starting == 1){

				if(!localStorage.getItem('LEX_RECORD')){

					localStorage.setItem('LEX_RECORD', 0);
					
				}

				lex_points.innerHTML = localStorage.getItem('LEX_RECORD');

			

				setTimeout("loadbox.style.opacity ='0';",600)
				setTimeout("loadbox.style.display ='none';",900);				

				setTimeout("lex_menu_button.style.opacity ='1'; lx_name.style.opacity = 1; start_button.style.opacity = '1';document.getElementsByClassName('lex-lifes')[0].style.opacity = '1';changeSettings(1);lexload.style.display='none'; ",1000);

				setTimeout("document.getElementsByClassName('mdl-layout__drawer-button')[0].click();",1200);


			}
			

			


			

			

		}

		function changeSettings(cat){	

			if(lex_time.value == '8'){

				//FÁCIL
				ponto_padrao = 15;

			}
			else if(lex_time.value == '5'){

				//MÉDIO
				ponto_padrao = 20;

			}
			else{

				//DIFÍCIL
				ponto_padrao = 25;

			}

			//LANGUAGE THAT I KNOW...
			lx_in = lex_language_in.value;
			localStorage.setItem("LEX_LANGUAGE_IN",lx_in);

			lx_content = lex_language_in.selectedOptions[0].getAttribute('content');
			lx_in = lx_content.split(';');

			LX_LOADING = lx_in[1];
			localStorage.setItem('LEX_LOADING_VOICE', LX_LOADING);

			//Translating Settings
			lxt02.innerHTML = lx_in[2];
			lxt03.innerHTML = lx_in[3];
			lxt04.innerHTML = lx_in[4];
			lxt05.innerHTML = lx_in[5];
			lxt06.innerHTML = lx_in[6];
			lxt07.innerHTML = lx_in[7];

			lxtsound1.innerHTML = lx_in[8];
			lxtsound2.innerHTML = lx_in[9];

			lxtvibe1.innerHTML = lx_in[8];
			lxtvibe2.innerHTML = lx_in[9];

			/*for(i=0; i < lex_time.getElementsByTagName('option').length; i++){			

				lex_time.getElementsByTagName('option')[i].innerHTML = lex_time.getElementsByTagName('option')[i].value+' '+lx_in[12];

			}*/

			lxteasy.innerHTML = lx_in[18];
			lxtmedium.innerHTML = lx_in[19];
			lxthard.innerHTML = lx_in[20];

			fastvar = lx_in[21];

			playagain = lx_in[22];

			typeName = lx_in[23];

			lxor1.innerHTML = lx_in[24];
			lxor2.innerHTML = lx_in[25];

			lxd1.innerHTML = lx_in[26];
			lxd2.innerHTML = lx_in[27];
			lxd3.innerHTML = lx_in[28];

			lx_name.placeholder = typeName+'...';

			

			//Game Screen
			start_button.innerHTML = lx_in[10];
			lxtmenu01.innerHTML = lx_in[10];
			lxtmenu02.innerHTML = lx_in[11];

			lxtdev.innerHTML = lx_in[17].toUpperCase()+" ANYTECH - 2018";
			//lxtmenu03.innerHTML = lx_in[15];
			changeToolName(toolGlobal);



			//LANGUAGE THAT I WANT LEARN...
			lx_out = lex_language_out.value;
			localStorage.setItem("LEX_LANGUAGE_OUT",lx_out);


			lx_content = lex_language_out.selectedOptions[0].getAttribute('content');
			lx_out = lx_content.split(';');

			LX_VOICE = lx_out[0];
			localStorage.setItem('LEX_LANGUAGE_VOICE', LX_VOICE);			

			

			/*localStorage.setItem("LEX_LANGUAGE_IN",lex_language_in.value);
			localStorage.setItem("LEX_LANGUAGE_OUT",lex_language_out.value);

			if(localStorage.getItem('LEX_LANGUAGE_OUT') == 'br'){
				voice = 'Brazilian Portuguese Male';
				localStorage.setItem('LEX_LOADING_VOICE', 'Carregando');
			}
			else if(localStorage.getItem('LEX_LANGUAGE_OUT') == 'en'){
				voice = 'US English Male';
				localStorage.setItem('LEX_LOADING_VOICE', 'Loading');
			}
			else if(localStorage.getItem('LEX_LANGUAGE_OUT') == 'it'){
				voice = 'Italian Male';
				localStorage.setItem('LEX_LOADING_VOICE', 'Caricamento');
			}
			else if(localStorage.getItem('LEX_LANGUAGE_OUT') == 'fr'){
				voice = 'French Male';
				localStorage.setItem('LEX_LOADING_VOICE', 'Chargement');
			}
			else if(localStorage.getItem('LEX_LANGUAGE_OUT') == 'es'){
				voice = 'Spanish Male';
				localStorage.setItem('LEX_LOADING_VOICE', 'Cargando');
			}

			localStorage.setItem('LEX_LANGUAGE_VOICE',voice);*/

			if(lex_theme.value == ''){
				
				localStorage.setItem("LEX_THEME",0);

			}
			else{
	
				localStorage.setItem("LEX_THEME",lex_theme.value);

			}
			//localStorage.setItem("LEX_THEME",lex_theme.value);
			localStorage.setItem("LEX_TIME",lex_time.value);

			localStorage.setItem("LEX_SOUND",lex_sound.value);

			localStorage.setItem("LEX_VIBE",lex_vibe.value);

			gamer = '';
			game_index = 0;

			// if(starting == 1){

			// 	starting = 0;
			// }
			// else{

			if(cat == 1){

				loadCategories();

			}
//			}
			

		}



		//FUNÇÕES DE CARREGAMENTO
		function loadLanguages(){

			$.post('php/loadLanguages.php',
			{

			},
			function(data){

				lex_language_in.innerHTML = data;
				lex_language_out.innerHTML = data;

				loadConfig();

			});

		}

		function loadCategories(){

			$.post('php/loadCategories.php',
			{
				lx_in: localStorage.getItem("LEX_LANGUAGE_IN"),
				lx_out: localStorage.getItem("LEX_LANGUAGE_OUT")
			},
			function(data){

				lex_theme.innerHTML = data;

				localStorage.setItem("LEX_THEME",lex_theme.value);
				//starting = 0;
				//loadConfig();

			});

		}



		function top10(){		

			if(navigator.onLine == true){

				$.post('php/top10.php',
				{
					
				},
				function(data){

					//alert('oiii');

					lex_top10_screen.innerHTML = data;

					//setTimeout("lxplayer.focus();",2000);

				});

			}
			else{

				alert("Erro ao acessar a internet! Por favor verifique sua conexão.");

			}

		}


		function savePoints(){

			lex_ranking_screen.style.display = 'inline-block';
			lex_ranking_screen.style.opacity = '1';
			//alert(navigator.onLine);



			if(localStorage.getItem('LEX_SOUND') == 'ON'){

				if(navigator.onLine == true){

					responsiveVoice.speak('Game. Over!', localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});

				}

			}
			
			document.getElementById('demo-show-snackbar').click();

			table_game.style.display = 'none';
			loader.style.display = 'none';	


			if(navigator.onLine == true){

				$.post('php/savePoints.php',
				{
					lx_points: gamePoints,
					lx_player: localStorage.getItem('LEX_PLAYER')
				},
				function(data){

					//alert('oiii');

					lex_ranking_screen.innerHTML = data;


					lxplayer.value = localStorage.getItem('LEX_PLAYER');


					lx_saver.innerHTML = playagain;


					lex_play_screen.style.display = 'none';
					lex_settings_screen.style.display = 'none';
					lex_ranking_screen.style.display = 'inline-block';
					lex_ranking_screen.style.opacity = '1';

					//setTimeout("lxplayer.focus();",2000);

				});

			}
			else{

				alert("Erro ao acessar a internet! Por favor verifique sua conexão.");

				lex_init.style.display = 'inline-block';

				lex_record.innerHTML = lx_in[13];
				lex_points.innerHTML = localStorage.getItem('LEX_RECORD');

				lex_ranking_screen.style.opacity = '0';
				lex_timeout = setTimeout("lex_ranking_screen.style.display = 'none';",300);

				

				start_button.style.opacity = '1';
				lex_timeout = setTimeout("lex_play_screen.style.display = 'inline-block'; start_button.style.display = 'inline-block';",400);



			}

		}

		function save(){


			if(navigator.onLine == true){

				

						lex_init.style.display = 'inline-block';

						lex_record.innerHTML = lx_in[13];
						lex_points.innerHTML = localStorage.getItem('LEX_RECORD');

						lex_ranking_screen.style.opacity = '0';
						lex_timeout = setTimeout("lex_ranking_screen.style.display = 'none';",300);

						

						start_button.style.opacity = '1';
						lex_timeout = setTimeout("lex_play_screen.style.display = 'inline-block'; start_button.style.display = 'inline-block';",400);



			}
			else{

				alert("Erro ao acessar a internet! Por favor verifique sua conexão.");

		    	lex_init.style.display = 'inline-block';

				lex_record.innerHTML = lx_in[13];
				lex_points.innerHTML = localStorage.getItem('LEX_RECORD');

				lex_ranking_screen.style.opacity = '0';
				lex_timeout = setTimeout("lex_ranking_screen.style.display = 'none';",300);

				start_button.style.opacity = '1';
				lex_timeout = setTimeout("lex_play_screen.style.display = 'inline-block'; start_button.style.display = 'inline-block';",400);

			}

		}


		lex_menu_button.onclick = function(){

			if(animation == 0){				
							
				document.getElementsByClassName("mdl-layout__drawer-button")[0].click();

				stopGame();
			}
			
		}

		function lexTool(tool){

			document.getElementsByClassName("mdl-layout__drawer-button")[0].click();

			lex_play_screen.style.display = 'none';
			lex_settings_screen.style.display = 'none';
			lex_ranking_screen.style.display = 'none';
			lex_top10_screen.style.display = 'none';
			lex_download_screen.style.display = 'none';

			toolGlobal = tool;

			changeToolName(tool);

			document.getElementById(tool).style.display = 'inline-block';
		}

		function changeToolName(tool){

			if(tool == 'lex_play_screen'){

				lex_record.innerHTML = lx_in[13];
				lex_points.innerHTML = localStorage.getItem('LEX_RECORD');

			}
			else if(tool == 'lex_settings_screen'){

				lex_points.innerHTML = '';
				lex_record.innerHTML = lx_in[11].toUpperCase();

			}
			else if(tool == 'lex_ranking_screen'){

				lex_points.innerHTML = '';
				lex_record.innerHTML = lx_in[15];

			}
			else if(tool == 'lex_download_screen'){

				lex_points.innerHTML = '';
				lex_record.innerHTML = 'DOWNLOAD';

			}
			else if(tool == 'lex_top10_screen'){

				lex_points.innerHTML = '';
				lex_record.innerHTML = 'TOP 10';

			}

		}

		function parametrosIniciais(){
					
			jogando = 1;
			seguidas = 0;
			pegaVida = 0;
			vidas = 3;
			clicado = 0;
			cronLigado = 1;
			limiteTempo = localStorage.getItem('LEX_TIME');
			lim = localStorage.getItem('LEX_TIME');
			segundos = -1;
			pontos = 0;
			setLifes(vidas);

		}

		function startLex(){

			if(starttoplay == 0){

				starttoplay = 1;

				gameover_var = 0;


				if(lx_name.value != ''){

					lex_option_one.disabled = false;
					lex_option_two.disabled = false;

					localStorage.setItem('LEX_PLAYER',lx_name.value);


					playing = 1;
					animation = 1;

					lx_name.style.opacity = '0';			
					start_button.style.opacity = '0';
					lex_timeout = setTimeout("start_button.style.display = 'none'; lx_name.style.display = 'none';",300);

					lex_animation_label.innerHTML = localStorage.getItem('LEX_LOADING_VOICE').toUpperCase()+'...';
					lex_animation_label.style.display = 'inline-block';				
					lex_timeout = setTimeout("lex_animation_label.style.opacity = '1';",400);

					if(localStorage.getItem('LEX_SOUND') == 'ON'){
						if(navigator.onLine == true){
							responsiveVoice.speak('', localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});
						}
					}

					if(game_index < 600 && game_index != 0){

						lex_animation_label.style.opacity = '0';

						lex_timeout = setTimeout('animationInitial();',1000);

					}
					else{

						$.post("php/buscaPalavra.php",
						{
						    categoria: localStorage.getItem('LEX_THEME'),
							idioma_ini: localStorage.getItem('LEX_LANGUAGE_IN'),
							idioma_alt: localStorage.getItem('LEX_LANGUAGE_OUT')
						},
						function(data){

							gamer = JSON.parse(data);

							game_index = 0;

							lex_animation_label.style.opacity = '0';

							lex_timeout = setTimeout('animationInitial();',1000);

						});
					}

				}
				else{

					starttoplay = 0;
					lx_name.focus();

				}

			}

		}

		function recharge(){

			$.post("php/buscaPalavra.php",
			{
			    categoria: localStorage.getItem('LEX_THEME'),
				idioma_ini: localStorage.getItem('LEX_LANGUAGE_IN'),
				idioma_alt: localStorage.getItem('LEX_LANGUAGE_OUT')
			},
			function(data){

				gamerConcat = JSON.parse(data);

				gamer = gamer.concat(gamerConcat);

			});
		}

		function animationInitial(){

				starttoplay = 0;
			
				if(playing == 1){
					parametrosIniciais();
				}
				else{
					return;
				}
				
				//3
				if(localStorage.getItem('LEX_SOUND') == 'ON'){
					if(navigator.onLine == true){
						lex_timeout = setTimeout("responsiveVoice.speak('3', localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});",600);
					}
				}
				if(playing == 1){
					
					lex_animation_label.innerHTML = '3';
					lex_animation_label.style.display = 'inline-block';
				}		
				else{
					return;
				}

				lex_timeout = setTimeout("lex_animation_label.style.opacity = '1';",600);				
				lex_timeout = setTimeout("lex_animation_label.style.opacity = '0';",1100);
				
				//2
				if(localStorage.getItem('LEX_SOUND') == 'ON'){
					if(navigator.onLine == true){
						lex_timeout = setTimeout("responsiveVoice.speak('2', localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});",1600);
					}
				}
				lex_timeout = setTimeout("lex_animation_label.innerHTML = '2';",1600);
				lex_timeout = setTimeout("lex_animation_label.style.opacity = '1';",1800);				
				lex_timeout = setTimeout("lex_animation_label.style.opacity = '0';",2200);
				
				//1
				if(localStorage.getItem('LEX_SOUND') == 'ON'){
					if(navigator.onLine == true){
						lex_timeout = setTimeout("responsiveVoice.speak('1', localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});",2600);
					}
				}
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.innerHTML = '1';",2600);
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.style.opacity = '1';",2800);				
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.style.opacity = '0';",3200);
				
				//LEX
				if(localStorage.getItem('LEX_SOUND') == 'ON'){
					if(navigator.onLine == true){
						lex_timeout = setTimeout("responsiveVoice.speak('lex', localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});",3700);
					}
				}
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.innerHTML = 'LEX';",3700);
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.style.opacity = '1';",3800);				
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.style.opacity = '0';",4300);
				lex_timeout = setTimeout("if(playing == 1)lex_animation_label.style.display = 'none';",4500);
				
				
				//Retorna componentes do jogo
				/*lex_timeout = setTimeout("lex_init.style.display = 'none';",3700);
				lex_timeout = setTimeout("loader.style.display = 'inline-block';",3700);				
				lex_timeout = setTimeout("table_game.style.display = 'table';",3700);*/

				if(playing == 1){
					
					lex_timeout = setTimeout("animation = 0; reiniciarJogada();",4600);
				}
				else{

					return;

				}

				
			

		}
		
		function reiniciarJogada(){

			lex_option_one.disabled = false;

			lex_option_two.disabled = false;
	
			intoloader.style.transition = 'width 0s';

			intoloader.style.width = '0%';

			if(seguidas == 30 || seguidas == 60 || seguidas == 90){

				lex_option_one.innerHTML = '';
				lex_option_two.innerHTML = '';
				lex_question.innerHTML = '⌚ '+fastvar;

				setTimeout('lex_question.innerHTML = "";',1000);

				setTimeout("recebePalavras('"+gamer[game_index]['resposta_certa']+"','"+gamer[game_index]['resposta_errada']+"','"+gamer[game_index]['pergunta']+"');",1200);

				setTimeout("lex_init.style.display = 'none';loader.style.display = 'inline-block';table_game.style.display = 'table';game_index++;",1200);

			}
			else if(seguidas == 100 || seguidas == 200 || seguidas == 300){

				lex_option_one.innerHTML = '';
				lex_option_two.innerHTML = '';
				lex_question.innerHTML = '+♥';

				setTimeout('lex_question.innerHTML = "";',1000);

				setTimeout("recebePalavras('"+gamer[game_index]['resposta_certa']+"','"+gamer[game_index]['resposta_errada']+"','"+gamer[game_index]['pergunta']+"');",1200);

				setTimeout("lex_init.style.display = 'none';loader.style.display = 'inline-block';table_game.style.display = 'table';game_index++;",1200);

			}
			else{

				recebePalavras(gamer[game_index]['resposta_certa'],gamer[game_index]['resposta_errada'],gamer[game_index]['pergunta']);

				lex_init.style.display = 'none';
				loader.style.display = 'inline-block';
				table_game.style.display = 'table';

				game_index++;
			}

		}

		function setLifes(lifes){
				
			lifer = document.getElementsByClassName("lex-heart-box")[0];
			
			for(i=0; i < lifes; i++){
			
				lifer.innerHTML = lifer.innerHTML + "<img src='images/lex-heart.png' class='lex-heart'>";
				
			}
									
		}
	
		function recebePalavras(certa,errada,traducao){
	
			resposta_certa = Math.floor((Math.random() * 2) + 1);


			if(localStorage.getItem('LEX_LANGUAGE_IN') == 'image'){

				lex_question.innerHTML = '<img class="lex-imgs" src="images/lexicons/'+traducao+'.png">';

			}
			else{

				lex_question.innerHTML = traducao;

			}

			if(localStorage.getItem('LEX_LANGUAGE_OUT') == 'image'){

				if(resposta_certa == 1){

					lex_option_one.innerHTML = '<img class="lex-imgs-small" src="images/lexicons/'+certa+'.png">';;
					lex_option_two.innerHTML = '<img class="lex-imgs-small" src="images/lexicons/'+errada+'.png">';;
				
				}
				else{

					lex_option_two.innerHTML = '<img class="lex-imgs" src="images/lexicons/'+certa+'.png">';;
					lex_option_one.innerHTML = '<img class="lex-imgs" src="images/lexicons/'+errada+'.png">';;
					
				}

			}
			else{

				if(resposta_certa == 1){

					lex_option_one.innerHTML = certa;
					lex_option_two.innerHTML = errada;
				
				}
				else{

					lex_option_two.innerHTML = certa;
					lex_option_one.innerHTML = errada;
					
				}
			}

			lex_timeout = setTimeout("iniciarJogada()",50);

		}

		function iniciarJogada(){


			if(seguidas == 30 || seguidas == 60 || seguidas == 90 || seguidas == 120){

				if(lim == 4){

					limiteTempo = limiteTempo - 0.50;

				}
				else if(lim == 2){

					limiteTempo = limiteTempo - 0.25;					

				}
				else{

					limiteTempo = limiteTempo - 1;

				}

			}
			else if(seguidas == 0){

				limiteTempo = lim;

			}

			intoloader.style.transition = 'width '+limiteTempo+'s linear';

			intoloader.style.width = '100%';
			
			cronometro();

		}

		function cronometro(){


			if(clicado == 0){
			
				segundos++;
		
				if(segundos < limiteTempo){
					
					lex_timeout = setTimeout('cronometro()',1000);
		
				}
				else{

					acabouTempo();
				}

			}
			else{
				
				clicado = 0;
				segundos = -1;
				
			}

		}

		function acabouTempo(){

			if(localStorage.getItem('LEX_SOUND') == 'ON'){

				if(navigator.onLine == true){

					responsiveVoice.speak(gamer[game_index-1]['resposta_certa'], localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});

				}
			}

			segundos = -1;

			respostaErrada();

		}

		function gameover(){

			if(gameover_var == 0){

				gameover_var = 1;

				gamePoints = pontos;

				savePoints();

			}


		}

		function responder(resposta){

			lex_option_one.disabled = true;
			lex_option_two.disabled = true;
			
			if(localStorage.getItem('LEX_SOUND') == 'ON'){

				if(navigator.onLine == true){

					responsiveVoice.speak(gamer[game_index-1]['resposta_certa'], localStorage.getItem('LEX_LANGUAGE_VOICE'), {pitch: 1}, {rate: 0}, {speed:200},{volume:0.5});

				}
			}

			if(resposta == resposta_certa){

				clicado = 1;
				respostaCerta();

			}
			else{

				clicado = 1;
				respostaErrada();

			}


		}

		function respostaErrada(){
	
			if(localStorage.getItem('LEX_VIBE') == 'ON'){

				try {
					window.navigator.vibrate([100,30,300]);
				}
				catch(err){}
			}

			jogando = 0;

			seguidas = 0;

			pegaVida = 0;

			changer = lex_points_sequencial.innerHTML;

			changer = changer.replace('+','-');

			lex_points_sequencial.innerHTML = changer;

			lex_points_sequencial.style.color = '#f00060';
			lex_points_box_transparent.style.marginTop = '20px';
			lex_timeout = setTimeout('lex_points_sequencial.innerHTML = "";',300);
			lex_timeout = setTimeout("lex_points_box_transparent.style.marginTop = '0px'; lex_points_sequencial.style.color = '#00f0b0';",500);


			vidas--;

			if(vidas < 0){

				gameover();

			}
			else{

				hearts = document.getElementsByClassName('lex-heart');
				hearts[0].remove();
				reiniciarJogada();

			}

		}

		function respostaCerta(){

			seguidas++;
			pegaVida++;

			if(pegaVida == 100){

				pegaVida = 0;

				setLifes(1);

				vidas = vidas + 1;

				recharge();

			}

			
			if(seguidas >= 30){

				lex_points_sequencial.innerHTML = "+"+seguidas+' ⌚';

			}
			else{

				lex_points_sequencial.innerHTML = "+"+seguidas;

			}

			lex_points_box_transparent.style.marginTop = '20px';
			lex_timeout = setTimeout("lex_points_box_transparent.style.marginTop = '0px';",200);

			jogando = 0;
			
			pontos += ponto_padrao;

			if(pontos > localStorage.getItem('LEX_RECORD')){
			
				lex_record.innerHTML = lx_in[13];
				lex_points.innerHTML = pontos;
				localStorage.setItem('LEX_RECORD',pontos);

			}
			else{

				lex_record.innerHTML = lx_in[13]+' - '+localStorage.getItem('LEX_RECORD');
				lex_points.innerHTML = pontos;

			}

			reiniciarJogada();
			
		}

		function stopGame(){

			clearTimeout(lex_timeout);

			playing = 0;
			vidas = 0;
			jogando = 0;
			segundos = -1;
			lex_life_box.innerHTML = '';
			lex_animation_label.style.display = 'none';
			lex_animation_label.innerHTML = '';
			lex_init.style.display = 'inline-block';
			start_button.style.opacity = '1';
			start_button.style.display ='inline-block';
			loader.style.display = 'none';
			table_game.style.display = 'none';
			lex_points_sequencial.innerHTML = '';

		}

	</script>

</html>