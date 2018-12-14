<?php include_once("../conn/conexao.php");?>
<?php

	$del = $_POST['id'];

	$res = 'delete from servicos where id = "'.$del.'" ';
	$res = mysqli_query($conn, $res);		

	header("refresh: 0;../index.php");	

?>