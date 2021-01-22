<?php
	include 'Conexao.php';
	include 'ConexaoPrincipal.php';
	
	$result_Temas = $conexaoPrincipal -> prepare('select tb_lx_tema_palavra.cd_lx_tema_palavra,
														   tb_lx_tema_palavra.nm_lx_tema_palavra
													  from tb_lx_tema_palavra
														order by tb_lx_tema_palavra.nm_lx_tema_palavra');
	$result_Temas -> execute();
?>

<option value="">Selecione...</option>

<?php			
	while ($linha_Temas = $result_Temas -> fetch())
	{
?>
		<option value="<?php echo $linha_Temas['cd_lx_tema_palavra']; ?>"><?php echo $linha_Temas['nm_lx_tema_palavra']; ?></option>
<?php
	}
?>