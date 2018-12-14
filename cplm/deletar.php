<?php if($_POST){?>
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


<?PHP
include_once("../conn/conexao.php");
$senha = $_POST['senha'];
$res = 'select * from prestador where senha = "'.$senha.'"';
$res = mysqli_query($conn, $res);
$row = mysqli_fetch_assoc($res);

$result_t = 'delete from prestador where senha = "'.$senha.'"';
$resultado = mysqli_query($conn, $result_t);

header("refresh: 3;../index.php");
?>
<body class="bodyper">
	<?php 
		if($row['senha'] != ''){
			echo "<h2 align='center'><div class='alert alert-success'> O serviço foi excluido com êxito!</div></h2>";
		}else{
			echo "<h2 align='center'><div class='alert alert-danger'> Login ou senha inválidos!</div></h2>";
		}
	?>
</body>
<?php 
}else{
	header("refresh: 0;../index.php");
}
?>
