<?php
include 'conect.php';
?>

<meta charset="utf-8" />

<?php

$id 	= $_GET["id"];

$produto = mysql_query("SELECT * FROM produtos WHERE id_produto = '$id'");

$dados	=	mysql_fetch_array($produto);

?>

<h3>Produto</h3>
<br />
<br />
<label>Código do Produto: </label> <?php echo $dados['codigo']; ?>
<br />
<label>Titulo do Produto :</label> <?php echo $dados['titulo']; ?>

<br />
<hr />
<br />

<form name="cad" method="post" action="processos.php" enctype="multipart/form-data">

<input type="hidden" name="acao" value="add_comentario">
<input type="hidden" name="id_p" value="<?php echo $dados['id_produto']; ?>">

<label>Comentario</label>
<br />
<textarea name="comentario" id="comentario" rows="4" cols="50" ></textarea>

<br />
<br />

<a href="#" onclick="javascript: document.cad.submit();">Adicionar Comentario</a>

<a href="index.php" >Voltar / Cancelar</a>

<br />
<br />

</form>

<br />
<hr />
<br />

<?php

$sql =	mysql_query("SELECT * FROM  comentarios WHERE id_produto = '$id'  ORDER BY id_comentario DESC");

if(mysql_num_rows($sql)>0){

?>

<h3>Comentarios</h3>
<br />
<br />

<?php

while($dados_c	=	mysql_fetch_array($sql)){

?>

	<?php echo $dados_c['comentario']; ?>
	<br />
	<a href="processos.php?acao=deletar_c&id=<?php echo $dados_c['id_comentario']; ?>" >Deletar Comentario</a>
	<br />
	<br />

<?php

}

}

?>

<br />
<hr />
<br />