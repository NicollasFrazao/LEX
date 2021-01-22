<?php
	include 'Conexao.php';
	include 'ConexaoPrincipal.php';
	
	if (!isset($_POST['codigoTema']) || !isset($_POST['codigoIdioma']) || !isset($_POST['codigoPalavraBase']) || !isset($_POST['nomeTraducao']))
	{
		exit;
	}
	
	$codigoTema = $_POST['codigoTema'];
	$codigoIdioma = $_POST['codigoIdioma'];
	$codigoPalavraBase = $_POST['codigoPalavraBase'];
	$nomeTraducao = $_POST['nomeTraducao'];
	
	try
	{
		$result = $conexaoPrincipal -> prepare('select tb_lx_traducao.cd_lx_traducao
												  from tb_lx_traducao
													where tb_lx_traducao.cd_lx_idioma = :codigoIdioma
													  and tb_lx_traducao.cd_lx_palavra_original = :codigoPalavraBase
													  and tb_lx_traducao.nm_lx_palavra_traducao = :nomeTraducao
													order by tb_lx_traducao.nm_lx_palavra_traducao');
		$result -> bindParam(':codigoIdioma', $codigoIdioma);
		$result -> bindParam(':codigoPalavraBase', $codigoPalavraBase);
		$result -> bindParam(':nomeTraducao', $nomeTraducao);
		
		$result -> execute();
		
		if ($result -> rowCount() == 0)
		{
			$result = $conexaoPrincipal -> prepare('insert into tb_lx_traducao(cd_lx_idioma, cd_lx_palavra_original, nm_lx_palavra_traducao) values(:codigoIdioma, :codigoPalavraBase, :nomeTraducao)');
			$result -> bindParam(':codigoIdioma', $codigoIdioma);
			$result -> bindParam(':codigoPalavraBase', $codigoPalavraBase);
			$result -> bindParam(':nomeTraducao', $nomeTraducao);
		
			$result -> execute();
			
			echo '1;-;Tradução adicionada com sucesso!';
		}
		else
		{
			echo '0;-;Tradução já foi adicionada!';
		}

		exit;
	}
	catch (PDOException $exe)
	{
		echo '0;-;Ocorreu um erro durante o processo! Erro: '.$exe -> getMessage();
		exit;
	}
?>