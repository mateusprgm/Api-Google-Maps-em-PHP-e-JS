 <?php
	$servidor = "";
	$usuario = "";
	$senha = "";
	$dbname = "";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}else{
		//echo "connection sucess!";
	}
?>

