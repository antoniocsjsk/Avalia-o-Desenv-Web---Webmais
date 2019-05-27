<?php
include 'conect.php';
?>

<meta charset="utf-8" />

<h3>Novo Cadastro de Produtos</h3>

<br />
<hr />
<br />

<form name="cad" method="post" action="processos.php" enctype="multipart/form-data">

<input type="hidden" name="acao" value="add">

<input name="codigo" id="codigo" type="text" placeholder="Código do Produto" />

<br />
<br />

<input name="titulo" id="titulo" type="text" placeholder="Titulo do Produto" />

<br />
<br />

<textarea name="descricao" id="descricao" rows="4" cols="50" placeholder="Descrição do Produto"></textarea>

<br />
<br />

<input name="altura" id="altura" type="text" placeholder="Altura do Produto" />

<br />
<br />

<input name="largura" id="largura" type="text" placeholder="Largura do Produto" />

<br />
<br />

<input name="profundidade" id="profundidade" type="text" placeholder="Profundidade do Produto" />

<br />
<br />

<select name="ativo" id="ativo" >

<option value="S" >Ativado</option>

<option value="N" >Desativado</option>

</select>

<br />
<br />

<a href="#" onclick="javascript: document.cad.submit();">Salvar Novo Produto</a>

<a href="index.php" >Voltar / Cancelar</a>


<br />
<br />

</form>

<br />
<hr />
<br />