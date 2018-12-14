<?php include_once("../conn/conexao.php");?>
<?php
	$seg = $_POST['seg'];

	$res = 'insert into servicos(nome)
			values("'.$seg.'")';
	$res = mysqli_query($conn, $res);		

	header("refresh: 0;../index.php");	
?>