<?php
include 'conect.php';
?>
<meta charset="utf-8" />
<?php


if($_POST["acao"]=="add"){

	//recebe as variáveis e trata para inserir no banco de dados
	$codigo	= $_POST["codigo"];
	$titulo	= $_POST["titulo"];
	$descricao	= $_POST["descricao"];	
	$ativo	= $_POST["ativo"];
	$altura	= $_POST["altura"];
	$largura	= $_POST["largura"];
	$profundidade	= $_POST["profundidade"];

	$verifica = mysql_query("SELECT * FROM produtos WHERE codigo = '$codigo'");

	if(mysql_num_rows($verifica)>0){

		$mensagem = "Código do Produto já existe!";

	}else{	
	
		$cadastra = mysql_query("INSERT produtos SET
							titulo			= '$titulo',
							descricao		= '$descricao',							
							codigo			= '$codigo',
							altura			= '$altura',
							largura			= '$largura',
							profundidade	= '$profundidade',
							ativo			= '$ativo'");
	
		$id_p		= mysql_insert_id();
		
		if($cadastra){
			$mensagem = "Produto cadastrado com sucesso!";
		}else{
			$mensagem = "Erro ao cadastrar produto, tente novamente!";	
		}
	}
}

if($_POST["acao"]=="edit"){

	//recebe as variáveis e trata para inserir no banco de dados
	$id	= $_POST["id"];
	$codigo	= $_POST["codigo"];
	$titulo	= $_POST["titulo"];
	$descricao	= $_POST["descricao"];	
	$ativo	= $_POST["ativo"];
	$altura	= $_POST["altura"];
	$largura	= $_POST["largura"];
	$profundidade	= $_POST["profundidade"];

	$produto = mysql_query("SELECT * FROM produtos WHERE id_produto = '$id'");

	$dados	=	mysql_fetch_array($produto);

	if($codigo == $dados['codigo'] ){

		$cadastra = mysql_query("UPDATE produtos SET
							titulo			= '$titulo',
							descricao		= '$descricao',							
							codigo			= '$codigo',
							altura			= '$altura',
							largura			= '$largura',
							profundidade	= '$profundidade',
							ativo			= '$ativo' WHERE id_produto =  '$id'");

		if($cadastra){
			$mensagem = "Produto alterado com sucesso!";
		}else{
			$mensagem = "Erro ao alterar produto, tente novamente!";	
		}

	}else{

		$verifica = mysql_query("SELECT * FROM produtos WHERE codigo = '$codigo'");

		if(mysql_num_rows($verifica)>0){

			$mensagem = "Código do Produto já existe!";

		}else{	
	
			$cadastra = mysql_query("UPDATE produtos SET
							titulo			= '$titulo',
							descricao		= '$descricao',							
							codigo			= '$codigo',
							altura			= '$altura',
							largura			= '$largura',
							profundidade	= '$profundidade',
							ativo			= '$ativo' WHERE id_produto =  '$id'");
	
			if($cadastra){
				$mensagem = "Produto alterado com sucesso!";
			}else{
				$mensagem = "Erro ao alterar produto, tente novamente!";	
			}
		}

	}
}

if($_GET["acao"]=="deletar"){

	//recebe as variáveis e trata para remover do banco de dados
	$id		= $_GET["id"];
	
	$produto	= mysql_query("SELECT * FROM produtos WHERE id_produto = '$id'");
	if(mysql_num_rows($produto)>0){
		$dados = mysql_fetch_array($produto);
					//seleciona as imagens para excluir
			$comentarios = mysql_query("SELECT * FROM comentarios WHERE id_produto = '$id'");

			if(mysql_num_rows($comentarios)>0){
				
				while($dados_c = mysql_fetch_array($comentarios)){
					
					$remove = mysql_query("DELETE FROM comentarios WHERE id_produto = '$id'");
				}
			}
			
	}
		
	$remove_p = mysql_query("DELETE FROM produtos WHERE id_produto = '$id'");	
	if($remove_p){
		$mensagem = "Produto deletado com sucesso!";
	}else{
		$mensagem = "Erro ao tentar deletar produto!";
	}
}


if($_POST["acao"]=="add_comentario"){

	//recebe as variáveis e trata para inserir no banco de dados
	$id_p	= $_POST["id_p"];
	$comentario	= $_POST["comentario"];	
	
	$cadastra = mysql_query("INSERT comentarios SET
							id_produto			= '$id_p',
							comentario		= '$comentario'");
	
	$id_p		= mysql_insert_id();
	
	if($cadastra){
		$mensagem = "Comentario cadastrado com sucesso!";
	}else{
		$mensagem = "Erro ao cadastrar comentario, tente novamente!";	
	}
}

if($_GET["acao"]=="deletar_c"){

	//recebe as variáveis e trata para remover do banco de dados
	$id		= $_GET["id"];
	
	$remove_p = mysql_query("DELETE FROM comentarios WHERE id_comentario = '$id'");	
	if($remove_p){
		$mensagem = "Comentario deletado com sucesso!";
	}else{
		$mensagem = "Erro ao tentar deletar comentario!";
	}
}

$link= $_SERVER['HTTP_REFERER'];
	
?>

<br /><br /><strong><? echo $mensagem; ?></strong><br /><br />
Para voltar <a href="<?php echo $link; ?>"><strong>clique aqui</strong>.</a><br />
