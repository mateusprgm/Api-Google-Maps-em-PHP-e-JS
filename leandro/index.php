<?php include_once("conn/conexao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>inserir seguimentos</title>
</head>
<body>
	<form action="cd/insert.php" method="POST">
		<input type="text" name="seg">
	</form>
	
</body>
</html>


<?php

$res = "select * from servicos order by nome asc";
$res = mysqli_query($conn, $res);

while($row = mysqli_fetch_assoc($res)){

	echo "<br>".$row['nome'];?>

	<form action="cd/deletar.php" method="POST">
		<input type="submit" name="del" value="deletar">
		<input type="hidden" value="<?php echo $row['id'];?>" name="id">
	</form>
<?php
}


?>