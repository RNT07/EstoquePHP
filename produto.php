<?php
	include("cabecalho.php");
	include("conf.php");
		if( $_SERVER['REQUEST_METHOD']=='POST' ){
			$where = Array();
			$nome = getPost('tNome');
			$preco = getPost('tPreco');
			if( $nome ){ $where[] = " `nome` like '%".$nome."%'"; }
			if( $preco ){ $where[] = " `preco` like '%".$preco."%'"; }
			$query = "SELECT * FROM produto ";
			if( sizeof( $where ) )
				$query .= ' WHERE '.implode( ' AND ',$where );
		}else{
				$query = "select * from produto";
		}
		function filter( $str ){
			return addslashes( $str );
		}
		function getPost( $key ){
			return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
		}
		$dados = mysql_query($query,$conn) or die(mysql_error());
		$linha = mysql_fetch_assoc($dados);
		$total = mysql_num_rows($dados);	
		if ($total == 0){
			echo "Ainda não há dados cadastrados";
			echo"<br/><form action='inserir.php' method='post'><input type='hidden' name='tb' value='produto'/><input type='submit' value='Inserir'/></form> <br/>";
		}else{?>
			<br/>
			<div class='jumbotron'>
			<form action="produto.php#selectFilter" method='post'>
			<input type="text" name="tNome" id="cNome" placeholder="Nome do produto"/>
			<input type="text" name="tPreco" id="cPreco" placeholder="Preço do produto"/>
			<input type='hidden' name='tb' value='produto'/>
			<input type='submit' value='Filtrar'/>
			</form>
			<form action="insert.php" method='post'>
			<input type='hidden' name='tb' value='produto'/>
			<input type='submit' value='Inserir'/>
			</form>
			</div>
			<?php
			echo "<div class='row'><div class='col-xs-12'>";
			echo "<div id='selectFilter'>";
			echo "<table class='table table-bordered table-striped table-hover' >";
			echo "<tr><th>Produto</th><th>Preço</th><th>Descrição</th><th></th></tr>";
			do{
				echo "<tr><td><input type='text' value='".$linha['nome']."' readonly/></td>";
				echo "<td><input type='text' value='".$linha['preco']."' readonly/></td>";
				echo "<td><input type='text' value='".$linha['descricao']."' readonly /></td>";
				echo "<td><form action='update.php' method='post'>";
				echo "<input type='hidden' name='tb' value='produto'/>";
				echo "<input type='hidden' name='tTipo' value='update'/>";
				echo "<input type='hidden' name='id' value='".$linha['id']."' />";
				echo "<input type='submit' value='Editar'/>";
				echo "</form></td>";
				echo"<td><form action='sucesso.php' method='post'>";
				echo "<input type='hidden' name='tID' value='".$linha['id']."'/>";
				echo "<input type='hidden' name='tb' value='produto'/>";
				echo "<input type='hidden' name='tTipo' value='delete'/>";
				echo "<input type='submit' value='Apagar'/>";
				echo "</form></td></tr>";
				
			}while($linha=mysql_fetch_assoc($dados));
			echo "</table>";
			echo "</div></div></div>";
		}
		mysql_close($conn);
		
		include("rodape.php");
		?>

  
