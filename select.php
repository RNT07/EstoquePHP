<div id='colSelect' data-toggle='collapse'>
<form action="sucesso.php" method="get">
<?php 

if ($tb=="produto"){?>
	
		<label for="cProd">Produto: </label><input type="text" name="tProd" id="cProd" placeholder="Titulo do produto"/><br/>
		<label for="cPrec">Preço: </label><input type="text" name="tPrec" id="cPrec" placeholder="preço"/><br/>
		<label for="cDesc">Descrição: </label><textarea name="tDesc" id="cDesc" cols="45" rows="5" placeholder="Detalhes sobre o produto"></textarea><br/>
		<input type="submit" value="Filtrar"/><input type="reset" value="Limpar"/>
	
<?php
}elseif($tb=="cliente"){
?>

		<label for="cNome">Nome: </label><input type="text" name="tProd" id="cProd" placeholder="Nome completo"/><br/>
		<label for="cEmail">Email: </label><input type="email" name="tEmail" id="cEmail" placeholder="Email"/><br/>
		<label for="cTel">Telefone: </label><input type="phone" name="tTel" id="cTel" placeholder="Telefone"/><br/>
		<input type="submit" value="Filtrar"/><input type="reset" value="Limpar"/>
	
<?php
}else{
	echo "Tabela não reconhecida, favor verificar";
}?>
</form>
</div>