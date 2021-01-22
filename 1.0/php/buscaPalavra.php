<?php

  	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	

  	$categoria = $_POST['categoria'];
 	$idioma_pergunta = 'word_'.$_POST['idioma_ini'];
	$idioma_alternativas = 'word_'.$_POST['idioma_alt'];

  	$arraywords = "'0'";
  	$ultimo = '1';
	
	$counter = 0;

	$repeater = 0;

	$sell = 'select lx_word.* , id_category from lx_word inner join category_word on category_word.id_word = lx_word.id_word
	where lx_word.id_word <> '.$ultimo.' and '.$idioma_pergunta.' <> "" and '.$idioma_alternativas.' <> ""';

	if($categoria != '0'){

		$sell .= ' and category_word.id_category = '.$categoria;

	}


	//echo $sell;


	$query = $conexao->query($sell);
	$row = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);


	//echo $count;

	if($count > 0){

		$repeater_limit = $count - 1;

	}
	else{

		$repeater_limit = 1;		
	}




	do{

		if($repeater == $repeater_limit){

			$arraywords = "'0'";
			$repeater = 0;

		}

		$sell = 'select lx_word.* , id_category from lx_word inner join category_word on category_word.id_word = lx_word.id_word
		where lx_word.id_word <> '.$ultimo.' and '.$idioma_pergunta.' <> "" and '.$idioma_alternativas.' <> "" and lx_word.id_word not in ('.$arraywords.')';

		if($categoria != '0'){

			$sell .= ' and category_word.id_category = '.$categoria;

		}

		$sell .= ' order by rand() limit 1';

	

		$query = $conexao->query($sell);
		$row = mysqli_fetch_assoc($query);
		$count = mysqli_num_rows($query);


		if($count > 0){

			do{

				
		    	$pergunta = utf8_encode($row[$idioma_pergunta]);
			    $resposta_certa = utf8_encode($row[$idioma_alternativas]);

			    
		    	$ultimo = $row['id_word'];
			    $arraywords .= ",'".$ultimo."'";
			    $repeater++;
				$categoriaRight = $row['id_category'];
		    
		    }
		    while($row = mysqli_fetch_assoc($query));
		}


		$randomico = rand(0,1);

		if($randomico == 0){
		
			
			$sell = 'select lx_word.* from lx_word
			inner join category_word on category_word.id_word = lx_word.id_word
			where lx_word.id_word <> '.$ultimo.' and '.$idioma_pergunta.' <> "" and '.$idioma_alternativas.' <> ""
			and lx_word.id_word <> '.$ultimo.' and '.$idioma_alternativas.' sounds like "%'.$resposta_certa.'%" and '.$idioma_alternativas.' <> "'.$resposta_certa.'" order by rand() limit 1';

		}
		else{

			$sell = 'select lx_word.* from lx_word
			inner join category_word on category_word.id_word = lx_word.id_word
			where  id_category = '.$categoriaRight.' and lx_word.id_word <> '.$ultimo.' and '.$idioma_pergunta.' <> "" and '.$idioma_alternativas.' <> ""
			and lx_word.id_word <> '.$ultimo.' 
			and '.$idioma_alternativas.' <> "'.$resposta_certa.'" order by rand() limit 1';

		}

		$query = $conexao->query($sell);
		$row = mysqli_fetch_assoc($query);
		$count = mysqli_num_rows($query);


		if($count <= 0){

			$sell = 'select lx_word.* from lx_word
			inner join category_word on category_word.id_word = lx_word.id_word
			where  id_category = '.$categoriaRight.' and lx_word.id_word <> '.$ultimo.' and '.$idioma_pergunta.' <> "" and '.$idioma_alternativas.' <> ""
			and lx_word.id_word <> '.$ultimo.' 
			and '.$idioma_alternativas.' <> "'.$resposta_certa.'" order by rand() limit 1';

			$query = $conexao->query($sell);
			$row = mysqli_fetch_assoc($query);
			$count = mysqli_num_rows($query);

		}

		
	  	$resposta_errada = utf8_encode($row[$idioma_alternativas]);


	  	$gamer[$counter] = array(

	  		'pergunta' => $pergunta,
	  		'resposta_certa' => $resposta_certa,
	  		'resposta_errada' => $resposta_errada
	  	);
	  
		$counter++;

	}
	while($counter < 1000);  

	//print_r($gamer);

	echo json_encode($gamer);


?>