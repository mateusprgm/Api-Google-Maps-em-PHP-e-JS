
<?php if($_POST){?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MapViceRouter</title>
<script type="text/javascript" 
	src="http://maps.google.com/maps/api/js?key=AIzaSyCr1_71h8xanj7QbjFabQ1pOqKiIQe1iOw&callback"></script>

	<script type="text/javascript" src="../js/jquery.min.js"></script>

	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<link rel="stylesheet" href="../css/style.css">

	<script src="../js/bootstrap1.min.js"></script>
<body class="bodyper">	
<?php
session_start();
ob_start();
include_once("../conn/conexao.php");



$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if($dados['servico'] != "Seguimento do Estabelecimento"){
	if($dados['local'] != '()'){
	if($dados['alt'] != ''){
		$local = $dados['local']; 
		$local = substr($local, 1, -1);
		$dados['local'] = $local;

		$res = 'select * from prestador where cel = "'.$dados['cel'].'"and senha = "'.$dados['senhold'].'"';
		$res = mysqli_query($conn, $res);
		$row = mysqli_fetch_assoc($res);
	

		if($row['senha'] != ''){
			$res = '';

			if($dados['pedido'] == "on"){
				$r = 'update prestador set promocao = "" where cel = "'.$dados['cel'].'"and senha = "'.$dados['senhold'].'"';
				$r = mysqli_query($conn, $r);
			}

			$res = 'update prestador 
					set 
					nome = "'.$dados['nome'].'", 
					cel = "'.$dados['cel'].'", 
					login = "'.$dados['cel'].'", 
					timeopen = "'.$dados['timeopen'].'", 
					timeclose = "'.$dados['timeclose'].'", 
					senha = "'.$dados['senha'].'", 
					servico = "'.$dados['servico'].'", 
					pedido = "'.@$dados['pedido'].'", 
					permissao = "'.@$dados['permissao'].'",
					descricao = "'.@$dados['descricao'].'",
					localizacao = "'.$dados['local'].'"
					where id = "'.$row['id'].'"';

			$res = mysqli_query($conn, $res);?>
			<div align="center">
					<h2 align='center'><div class='alert alert-success'> 
						<b>Cadastro alterado com sucesso!</b><br> Sua nova senha é: 
						<b style='color: red;'><?php echo $dados['senha'];?></b>
						<br>
						<Br>Guarde essa senha pois somente com ela poderá alterar ou excluir seu registro!</div>
					</h2>
					<a href="../index.php">
						<button type='button' class='btn btn-info'>Voltar para o inicio</button>
					</a>
				</div>
		
<?php
   		}else{
			echo "<h2 align='center'><div class='alert alert-danger'> Não foi encontrado nenhum serviço com essa senha</div></h2>";
			header("refresh: 2;index.php");
		}
		

	}else{
		$res = 'select * from prestador where senha = "'.$dados['senha'].'"';
		$res = mysqli_query($conn, $res);
		$row = mysqli_fetch_assoc($res);
		
		if($row['senha'] == ''){
			$local = $dados['local']; 
			$local = substr($local, 1, -1);
			$dados['local'] = $local;

			$result_markers = "
			INSERT INTO prestador(nome, servico, cel, login, descricao, timeopen, timeclose, permissao, pedido, senha, localizacao) 
			VALUES 
			('".@$dados['nome']."', '".@$dados['servico']."', '".@$dados['cel']."', '".@$dados['cel']."', '".@$dados['descricao']."', '".@$dados['timeopen']."', '".@$dados['timeclose']."', '".@$dados['permissao']."', '".@$dados['pedido']."', '".@$dados['senha']."','".@$dados['local']."')";

			$resultado_markers = mysqli_query($conn, $result_markers);
			if(mysqli_insert_id($conn)){?>
				<div align="center">
					<h2 align='center'>
						<div class='alert alert-success'> 
							<b>Cadastrado com sucesso!</b>
							<br> Seu login é:
							<b style='color: red;'><?php echo @$dados['cel'];?></b>
							<br> Sua senha é: 
							<b style='color: red;'><?php echo @$dados['senha'];?></b>
							<br>
							<Br>Guarde essa senha pois somente com ela poderá alterar ou excluir seu registro!
							<br>Você poderá alterar sua senha indo ao menu principal editando seu serviço!
					 	</div>
					</h2>
					<a href="../index.php">
						<button type='button' class='btn btn-info'>Voltar para o inicio</button>
					</a>
				</div>

		<?php
			}else{
				echo "<h2 align='center'><div class='alert alert-danger'> Não foi possível se cadastrar, tente novamente!</div></h2>";
				header("refresh: 2;cadastro.php");
			}
		}else{
			echo "<h2 align='center'><div class='alert alert-danger'> Não foi possível se cadastrar, tente novamente!</div></h2>";
			header("refresh: 2;cadastro.php");
		}

	}
}else{
	echo "<h2 align='center'><div class='alert alert-danger'> Toque sobre o mapa para informar seu endereço!</div></h2>";
	echo "<script>window.setTimeout(function(){history.go(-1)},4000);</script>";
}
}else if($dados['local'] == '()' || $dados['local'] == ''){
	echo "<h2 align='center'><div class='alert alert-danger'> Toque sobre o mapa para informar seu endereço!</div></h2>";
	echo "<script>window.setTimeout(function(){history.go(-1)},4000);</script>";
}else{
	echo "<h2 align='center'><div class='alert alert-danger'> Informe o seguimento do serviço!</div></h2>";
	echo "<script>window.setTimeout(function(){history.go(-1)},4000);</script>";
}


?>
</body>
<?php
}else{
	header("refresh: 0;../index.php");
}
?>