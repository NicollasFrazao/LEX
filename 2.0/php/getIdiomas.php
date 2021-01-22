<?php
	include 'Conexao.php';
	include 'ConexaoPrincipal.php';
	
	$result_Idiomas = $conexaoPrincipal -> prepare('select tb_lx_idioma.cd_lx_idioma,
														   tb_lx_idioma.nm_lx_idioma,
														   tb_lx_idioma.sg_lx_idioma
													  from tb_lx_idioma
														order by tb_lx_idioma.nm_lx_idioma');
	$result_Idiomas -> execute();
?>

<option value="">Selecione...</option>

<?php
	while ($linha_Idiomas = $result_Idiomas -> fetch())
	{
?>
		<option value="<?php echo $linha_Idiomas['cd_lx_idioma']; ?>"><?php echo $linha_Idiomas['nm_lx_idioma'].' - '.$linha_Idiomas['sg_lx_idioma']; ?></option>
<?php
	}
?>