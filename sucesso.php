<?php
//Inserir
if($_POST['tTipo']=="inserir"){
	if($_POST['tb']=="produto"){
		$varProdNome = $_POST['tProd'];
		$varProdPreco = $_POST['tPrec'];
		$varProdDesc = $_POST['tDesc'];
	include("conf.php");
	$inserir = "INSERT INTO produto (nome,preco,descricao) VALUES ('".$varProdNome."','".$varProdPreco."','".$varProdDesc."')";
	$sucesso = mysql_query($inserir) or die(mysql_error());
	mysql_close($conn);
	header("location:produto.php");
	}elseif($_POST['tb']=="cliente"){
				$varCliNome = $_POST['tNome'];
		$varCliEmail = $_POST['tEmail'];
		$varCliTel = $_POST['tTel'];
	include("conf.php");
	$inserir = "INSERT INTO cliente (nome,email,telefone) VALUES ('".$varCliNome."','".$varCliEmail."','".$varCliTel."')";
	
	$sucesso = mysql_query($inserir) or die(mysql_error());
	mysql_close($conn);
	header("location:cliente.php");
	}elseif($_POST['tb']=="pedido"){
		include("conf.php");
		$prod = $_POST['idProd'];
		$cli = $_POST['idCli'];
		$query = "insert into pedido(id_produto,id_cliente) values ('".$prod."', '".$cli."')";
		$sucesso = mysql_query($query) or die(mysql_error());
	mysql_close($conn);
	header("location:pedido.php");
	}
}elseif($_POST['tTipo']=="update"){
	if($_POST['tb']=="produto"){
		include("conf.php");
		$id = $_POST['tID'];
		$nome = $_POST['tProd'];
		$preco = $_POST['tPrec'];
		$desc = $_POST['tDesc'];
		$query="update produto set nome='".$nome."', preco='".$preco."', descricao='".$desc."' where id='".$id."'";
		$sucesso = mysql_query($query) or die(mysql_error());
		mysql_close($conn);
		header("location:produto.php");
	}elseif($_POST['tb']=="cliente"){
		include("conf.php");
		$id = $_POST['tID'];
		$nome = $_POST['tNome'];
		$email = $_POST['tEmail'];
		$tel = $_POST['tTel'];
		$query="update cliente set nome='".$nome."', email='".$email."', telefone='".$tel."' where id='".$id."'";
		$sucesso = mysql_query($query) or die(mysql_error());
		mysql_close($conn);
		header("location:cliente.php");
	}elseif($_POST['tb']=="pedido"){
		include("conf.php");
		$id = $_POST['tID'];
		$prod = $_POST['tProd'];
		$cli = $_POST['tCli'];
		$query="update pedido set id_produto='".$prod."', id_cliente='".$cli."' where id='".$id."'";
		$sucesso = mysql_query($query) or die(mysql_error());
		mysql_close($conn);
		header("location:pedido.php");
	}
}elseif($_POST['tTipo']=="delete"){
	if($_POST['tb']=="produto"){
		include("conf.php");
		$id = $_POST['tID'];
		$query="delete from produto where id='".$id."'";
		$sucesso = mysql_query($query) or die(mysql_error());
		mysql_close($conn);
		header("location:produto.php");
	}elseif($_POST['tb']=="cliente"){
		include("conf.php");
		$id = $_POST['tID'];
		$query="delete from cliente where id='".$id."'";
		$sucesso = mysql_query($query) or die(mysql_error());
		mysql_close($conn);
		header("location:cliente.php");
	}elseif($_POST['tb']=="pedido"){
		include("conf.php");
		$id = $_POST['tID'];
		$query="delete from pedido where id=".$id."";
		$sucesso = mysql_query($query) or die(mysql_error());
		mysql_close($conn);
		header("location:pedido.php");
	}
}
		

		include("rodape.php");


?>