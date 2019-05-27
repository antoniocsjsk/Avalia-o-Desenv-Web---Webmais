<?php
include 'conect.php';
?>

<meta charset="utf-8" />

<?php

$id 	= $_GET["id"];

$produto = mysql_query("SELECT * FROM produtos WHERE id_produto = '$id'");

$dados	=	mysql_fetch_array($produto);

?>

<h3>Editando Cadastro de Produto</h3>

<br />
<hr />
<br />

<form name="cad" method="post" action="processos.php" enctype="multipart/form-data">

<input type="hidden" name="acao" value="edit">
<input type="hidden" name="id" value="<?php echo $dados['id_produto']; ?>">

<label>Código do Produto</label>
<br />
<input name="codigo" id="codigo" type="text" value="<?php echo $dados['codigo']; ?>" />

<br />
<br />

<label>Titulo do Produto</label>
<br />
<input name="titulo" id="titulo" type="text" value="<?php echo $dados['titulo']; ?>" />

<br />
<br />

<label>Descrição do Produto</label>
<br />
<textarea name="descricao" id="descricao" rows="4" cols="50" ><?php echo $dados['descricao']; ?></textarea>

<br />
<br />

<label>Altura do Produto</label>
<br />
<input name="altura" id="altura" type="text" value="<?php echo $dados['altura']; ?>" />

<br />
<br />

<label>Largura do Produto</label>
<br />
<input name="largura" id="largura" type="text" value="<?php echo $dados['largura']; ?>" />

<br />
<br />

<label>Profundidade do Produto</label>
<br />
<input name="profundidade" id="profundidade" type="text" value="<?php echo $dados['profundidade']; ?>"/>

<br />
<br />

<label>Ativo?</label>
<br />
<select name="ativo" id="ativo" >

<option value="S" <?php if($dados["ativo"] == 'S'){ ?>selected='selected' <?php } ?> >Ativado</option>

<option value="N" <?php if($dados["ativo"] == 'N'){ ?>selected='selected' <?php } ?> >Desativado</option>

</select>

<br />
<br />

<a href="#" onclick="javascript: document.cad.submit();">Salvar Alterações Produto</a>

<a href="index.php" >Voltar / Cancelar</a>


<br />
<br />

</form>

<br />
<hr />
<br />