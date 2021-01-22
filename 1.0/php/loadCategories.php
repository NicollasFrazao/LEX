<?php

	$conexao = mysqli_connect("anytech.com.br","anyte539","anytech.all","anyte539_lex");
	
	$type = $_POST['lx_in'];
	$outtype = $_POST['lx_out'];

	if($type == 'image'){

		$type = 'br';
		
	}

	if($outtype == 'image'){

		$outtype = 'br';
		
	}

	//$sell = 'select * from lx_category order by id_category = 0 desc, category_'.$type.' asc';

	$sell = 'select lx_category.id_category, category_'.$type.', count(*) as qt from lx_word inner join category_word on category_word.id_word = lx_word.id_word 
	inner join lx_category on category_word.id_category = lx_category.id_category
	where lx_word.id_word <> 1 and word_'.$type.' <> "" and word_'.$outtype.' <> ""
	group by category_'.$type.' order by lx_category.id_category = 0 desc';

	//echo $sell;


	$query = $conexao->query($sell);
	$row = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);


	if($count > 0){
		
		do{

			if($row['qt'] > 15 || $row['id_category'] == 0){

				$retorno .= "<option value='".$row['id_category']."'>".utf8_encode($row['category_'.$type.''])."</option>";

			}

		}
		while($row = mysqli_fetch_assoc($query));

	}

	echo $retorno;
	
?>