<?php
	include 'Conexao.php';
	include 'ConexaoPrincipal.php';
	
	if (!isset($_POST['codigoTema']) || !isset($_POST['nomePalavra']))
	{
		echo 'Os dados informados estão incorretos!';
		exit;
	}
	
	//$codigoTema = $_POST['codigoTema'];
	$codigoTema = 7;
	$nomePalavra = $_POST['nomePalavra'];
	
	try
	{
		$result = $conexaoPrincipal -> prepare('select tb_lx_palavra.cd_lx_palavra from tb_lx_palavra where cd_lx_tema = :codigoTema and nm_lx_palavra = :nomePalavra');
		$result -> bindParam(':codigoTema', $codigoTema);
		$result -> bindParam(':nomePalavra', $nomePalavra);
		
		$result -> execute();
		
		if ($result -> rowCount() == 0)
		{
			$result = $conexaoPrincipal -> prepare('insert into tb_lx_palavra(cd_lx_tema, nm_lx_palavra) values(:codigoTema, :nomePalavra)');
			$result -> bindParam(':codigoTema', $codigoTema);
			$result -> bindParam(':nomePalavra', $nomePalavra);
			
			$result -> execute();
			
			echo '1;-;Palavra adicionada com sucesso!';
		}
		else
		{
			echo '0;-;Palavra já foi adicionada!';
		}
		
		exit;
	}
	catch (PDOException $exe)
	{
		echo '0;-;Ocorreu um erro durante o processo! Erro: '.$exe -> getMessage();
		exit;
	}
?>