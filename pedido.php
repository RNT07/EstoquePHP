		<?php
		include("cabecalho.php");
		include("conf.php");
		if( $_SERVER['REQUEST_METHOD']=='POST' )
	{
		$where = Array();
		$idProduto = getPost('idProduto');
		$idCliente = getPost('idCliente');


		if( $idProduto ){ $where[] = " `id_produto` like '%".$idProduto."%'"; }
		if( $idCliente ){ $where[] = " `id_cliente` like '%".$idCliente."%'"; }

		$query = "SELECT * FROM pedido ";
		if( sizeof( $where ) )
			$query .= ' WHERE '.implode( ' AND ',$where );
	}else{
		$query = "select * from pedido";
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
		?>
		<div class='jumbotron'>
		<form action="" method="POST">
			<input type="text" name="idProduto" id="idProduto" placeholder="ID do Produto"/>
			<input type="text" name="idCliente" id="idCliente" placeholder="ID do Cliente"/>
			<input type="submit" value="Filtrar"/>
		</form>
		<form action="insert.php" method='post'>
			<input type='hidden' name='tb' value='pedido'/>
			<input type='submit' value='Inserir'/>
			</form>
		</div>
		<?php
		if ($total > 0){
			echo "<div class='row'><div class='col-xs-12'>";
			echo "<table class='table table-bordered table-striped table-hover' >";
			echo "<tr><th colspan='2'>Produto</th><th colspan='2'>Cliente</th><th>Apagar Informação</th></tr>";
			echo "<tr><th>ID</th><th>Nome</th><th>ID</th><th>Nome</th></tr>";
			do{
				echo "<tr><td>".$linha['id_produto']."</td><td>";
				$queryProd = "select * from produto where id='".$linha['id_produto']."'";
				$prod = mysql_query($queryProd,$conn);
				$linhaProd = mysql_fetch_assoc($prod);
				echo $linhaProd['nome']."</td><td>".$linha['id_cliente']."</td><td>";
				$queryCli = "select * from cliente where id='".$linha['id_cliente']."'";
				$cli = mysql_query($queryCli,$conn);
				$linhaCli = mysql_fetch_assoc($cli);
				echo $linhaCli['nome']."</td>";
				echo"<td><form action='sucesso.php' method='post'>";
				echo "<input type='hidden' name='tID' value='".$linha['id']."'/>";
				echo "<input type='hidden' name='tb' value='pedido'/>";
				echo "<input type='hidden' name='tTipo' value='delete'/>";
				echo "<input type='submit' value='Apagar'/>";
				echo "</form></td></tr>";
				
			}while($linha = mysql_fetch_assoc($dados));
			echo "</table></div></div>";
		}else{
			echo "Ainda não há dados cadastrados";
		}
		 include("rodape.php");
		?>
