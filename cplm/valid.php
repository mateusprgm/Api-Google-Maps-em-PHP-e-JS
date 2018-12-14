<?php if($_POST){?>
<?php include_once("../conn/conexao.php");?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MapViceRouter</title>
</head>
<script type="text/javascript" 
	src="http://maps.google.com/maps/api/js?key=AIzaSyCr1_71h8xanj7QbjFabQ1pOqKiIQe1iOw&callback"></script>

	<script type="text/javascript" src="../js/jquery.min.js"></script>

	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<link rel="stylesheet" href="../css/style.css">

	<script src="../js/bootstrap1.min.js"></script>
<body class="bodyper">
<?php 

	
	$res = 'select * from prestador where login = "'.$_POST['login'].'" and senha = "'.$_POST['senha'].'"';
	$res = mysqli_query($conn, $res);
	$row = mysqli_fetch_assoc($res);
	if(@$_POST['edita'] && $_POST['login']){
		if($row['senha']){?>
			<form id="form" name="form" action="cadastro.php" method="POST">
				<input type="hidden" id="senha" name="senha" value="<?php echo $_POST['senha'];?>">
			</form>
			<script>
				document.getElementById('form').submit();
			</script>	
<?php
		}else{
			echo "<h2 align='center'><div class='alert alert-danger'> Login ou senha inválidos!</div></h2>";
			header("refresh: 2;../index.php");
		}
	}else if(@$_POST['promocao']){
		if($row['pedido'] != 'on'){
			if($row['senha']){
				if($_POST['promoDesc'] != ''){
					$res = 'update prestador set promocao = "on", promodesc = "'.$_POST['promoDesc'].'"  where login = "'.$_POST['login'].'" and senha = "'.$_POST['senha'].'"';
					$res = mysqli_query($conn, $res);
					$row = @mysqli_fetch_assoc($res);
					echo "<h2 align='center'>
							<div class='alert alert-danger'> 
								Tudo certo! Seu estabelecimento está 
								<b style='color: red;'>com</b> promoções
							</div>
						  </h2>";
					header("refresh: 2;../index.php");
				}else{
					$res = 'update prestador set promocao = "", promodesc = "" where senha = "'.$_POST['senha'].'"';
					$res = mysqli_query($conn, $res);
					$row = @mysqli_fetch_assoc($res);
					echo "<h2 align='center'>
						  	<div class='alert alert-danger'> 
						  		Tudo certo! Seu estabelecimento está 
						  		<b style='color: red;'>sem</b> promoções
						  	</div>
						  </h2>";
					header("refresh: 2;../index.php");	  
				}
			}else{
				echo "<h2 align='center'><div class='alert alert-danger'> Login ou senha inválidos!</div></h2>";
				header("refresh: 2;../index.php");
			}

		}else{
			echo "<h2 align='center'><div class='alert alert-danger'>Você não pode colocar como promoção um pedido de serviço!</div></h2>";
			header("refresh: 2;../index.php");
		}
		
	}
?>
</body>


<script type="text/javascript" id="teste">
	document.getElementById('form').submit();
</script>
<?php 
}else{
	header("refresh: 0;../index.php");
}

?>