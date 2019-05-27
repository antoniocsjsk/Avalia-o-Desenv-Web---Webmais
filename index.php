<?php
include 'conect.php';
?>

<meta charset="utf-8" />

<?php

$sql =	mysql_query("SELECT * FROM  produtos ORDER BY id_produto DESC");

?>

<h3>Lista de Produtos</h3>
<br />
<hr />
<br />

<a href="add.php" >Adicionar Produto</a>

<br />
<hr />
<br />

<table>

	<tr>
		<td width="200px" align="center" ><b>Código</b></td>
		<td width="600px" ><b>Titulo</b></td>
		<td width="300px" align="center"><b>Comentarios</b></td>
		<td width="300px" align="center"><b>Ações</b></td>
	</tr>

	<?php

	while($dados	=	mysql_fetch_array($sql)){

		$id			=	$dados["id_produto"];
		$codigo			=	$dados["codigo"];
		$titulo		=	$dados["titulo"];

		?>

		<tr>
			<td align="center"><?php echo $codigo; ?></td>
			<td><?php echo $titulo; ?></td>
			<td align="center"><a href="comentarios.php?id=<?php echo $id; ?>" >Comentarios</a></td>
			<td align="center"><a href="editar.php?id=<?php echo $id; ?>" >Editar Produto</a> - <a href="processos.php?acao=deletar&id=<?php echo $id; ?>" >Deletar Produto</a></td>			
		</tr>


		<?php

	}

	?>

</table>
<br />
<hr />
<br />