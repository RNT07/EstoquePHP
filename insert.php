<?php include("cabecalho.php");
$tb=$_POST['tb'];
if ($tb=="produto"){?>
<form action="sucesso.php" method="post">
		<label for="cProd">Produto: </label><input type="text" name="tProd" id="cProd" placeholder="Titulo do produto"/><br/>
		<label for="cPrec">Preço: </label><input type="text" name="tPrec" id="cPrec" placeholder="preço"/><br/>
		<label for="cDesc">Descrição: </label><textarea name="tDesc" id="cDesc" cols="45" rows="5" placeholder="Detalhes sobre o produto"></textarea><br/>
		<input type="hidden" name="tTipo" value="inserir" readonly/>
		<input type="hidden" name="tb" value="produto" readonly/>
		<input type="submit" value="Inserir"/><input type="reset" value="Limpar"/>
</form>
	
<?php
}elseif($tb=="cliente"){
?>
<form action="sucesso.php" method="post">	
		<label for="cNome">Nome: </label><input type="text" name="tNome" id="cNome" placeholder="Nome completo"/><br/>
		<label for="cEmail">Email: </label><input type="email" name="tEmail" id="cEmail" placeholder="Email"/><br/>
		<label for="cTel">Telefone: </label><input type="phone" name="tTel" id="cTel" placeholder="Telefone"/><br/>
		<input type="hidden" name="tTipo" value="inserir" readonly/>
		<input type="hidden" name="tb" value="cliente" readonly/>
		<input type="submit" value="Inserir"/><input type="reset" value="Limpar"/>
	</form>
<?php
}elseif($tb=="pedido"){?>
	<label>Selecione um cliente e um produto</label>
	<?php
		include("conf.php");
		$query = "select * from produto";
		$dados = mysql_query($query,$conn) or die(mysql_error());
		$linha = mysql_fetch_assoc($dados);
		$total = mysql_num_rows($dados);	
		if ($total > 0){
			echo "<form action='sucesso.php' method='post'>";
			echo "<input type='hidden' name='tTipo' value='inserir' readonly/>";
			echo "<input type='hidden' name='tb' value='pedido' readonly/>";
			echo "<input type='submit' value='Inserir'/>";
			echo "<div class='row'><div class='col-xs-12'>";
			echo "<table class='table table-bordered table-striped table-hover' >";
			echo "<tr><th></th><th>Produto</th><th>Preço</th><th>Descrição</th></tr>";
			do{
				echo "<tr>";
				echo "<td><input type='radio' name='idProd' value='".$linha['id']."' />";
				echo "<td><input type='text' value='".$linha['nome']."' readonly/></td>";
				echo "<td><input type='text' value='".$linha['preco']."' readonly/></td>";
				echo "<td><input type='text' value='".$linha['descricao']."' readonly /></td>";
				echo "</tr>";
				
			}while($linha=mysql_fetch_assoc($dados));
			echo "</table>";
			echo "</div>";
			$query = "select * from cliente";
		
		$dados = mysql_query($query,$conn) or die(mysql_error());
		$linhaCli = mysql_fetch_assoc($dados);
		$total = mysql_num_rows($dados);	
		echo "<h1>".$linhaCli['nome']."</h1>";
		echo "<br/><div class='col-xs-12'>";
			echo "<table class='table table-bordered table-striped table-hover' >";
			echo "<tr><th></th><th>Cliente</th><th>Email</th><th>Telefone</th></tr>";
			do{
				echo "<tr>";
				echo "<td><input type='radio' name='idCli' value='".$linhaCli['id']."' readonly/></td>";
				echo "<td><input type='text' value='".$linhaCli['nome']."' readonly/></td>";
				echo "<td><input type='text' value='".$linhaCli['email']."' readonly/></td>";
				echo "<td><input type='text' value='".$linhaCli['telefone']."' readonly/></td>";
				echo "</tr>";
				
			}while($linhaCli=mysql_fetch_assoc($dados));
			echo "</table>";
			echo "</div></form>";
			echo "</div></div>";
		}
		
		


}

include("rodape.php");?>