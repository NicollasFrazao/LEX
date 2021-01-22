<?php
	include 'Conexao.php';
	include 'ConexaoPrincipal.php';
	
	if (isset($_GET['codigoTema']))
	{
		$codigoTema = $_GET['codigoTema'];
	}
	else
	{
		$codigoTema = '';
	}
	
	if ($codigoTema == '')
	{
		$result_Palavras = $conexaoPrincipal -> prepare('select tb_lx_palavra.cd_lx_palavra,
															   tb_lx_palavra.nm_lx_palavra,
															   tb_lx_palavra.cd_lx_tema
														  from tb_lx_palavra
															order by tb_lx_palavra.nm_lx_palavra');
		$result_Palavras -> execute();
	}
	else
	{
		$result_Palavras = $conexaoPrincipal -> prepare('select tb_lx_palavra.cd_lx_palavra,
															   tb_lx_palavra.nm_lx_palavra,
															   tb_lx_palavra.cd_lx_tema
														  from tb_lx_palavra
															where tb_lx_palavra.cd_lx_tema = :codigoTema
															order by tb_lx_palavra.nm_lx_palavra');
		$result_Palavras -> bindParam(':codigoTema', $codigoTema);
		
		$result_Palavras -> execute();
	}
?>

<option value="">Selecione...</option>

<?php
	while ($linha_Palavras = $result_Palavras -> fetch())
	{
?>
		<option value="<?php echo $linha_Palavras['cd_lx_palavra']; ?>"><?php echo $linha_Palavras['nm_lx_palavra']; ?></option>
<?php
	}
?>