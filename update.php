<?php include("cabecalho.php");
include("conf.php");
$tb=$_POST['tb'];
$id = $_POST['id'];
if ($tb=="produto"){
	$query = "select * from produto where id='".$id."'";
	$dados = mysql_query($query,$conn) or die(mysql_error());
	$linha = mysql_fetch_assoc($dados);
	?>
<form action="sucesso.php" method="post">
		<input type="hidden" value="<?=$linha['id']?>" name="tID"/>
		<label for="cProd">Produto: </label><input type="text" name="tProd" id="cProd" value="<?=$linha['nome']?>"/><br/>
		<label for="cPrec">Preço: </label><input type="text" name="tPrec" id="cPrec" value="<?=$linha['preco']?>"/><br/>
		<label for="cDesc">Descrição: </label>
		<textarea name="tDesc" id="cDesc" cols="45" rows="5"><?=$linha['descricao']?></textarea><br/>
		<input type="hidden" name="tTipo" value="update" readonly/>
		<input type="hidden" name="tb" value="produto" readonly/>
		<input type="submit" value="Atualizar"/><input type="reset" value="Cancelar"/>
</form>
	
<?php
}elseif($tb=="cliente"){
	$query = "select * from cliente where id='".$id."'";
	$dados = mysql_query($query,$conn) or die(mysql_error());
	$linha = mysql_fetch_assoc($dados);
?>
<form action="sucesso.php" method="post">	
		<input type="hidden" value="<?=$linha['id']?>" name="tID"/>
		<label for="cNome">Nome: </label><input type="text" name="tNome" id="cNome" value="<?=$linha['nome']?>"/><br/>
		<label for="cEmail">Email: </label><input type="email" name="tEmail" id="cEmail" value="<?=$linha['email']?>"/><br/>
		<label for="cTel">Telefone: </label><input type="phone" name="tTel" id="cTel" value="<?=$linha['telefone']?>"/><br/>
		<input type="hidden" name="tTipo" value="update" readonly/>
		<input type="hidden" name="tb" value="cliente" readonly/>
		<input type="submit" value="Atualizar"/><input type="reset" value="Cancelar"/>
	</form>
<?php
}else{
	echo "Tabela não reconhecida, favor verificar";
}

include("rodape.php");?>