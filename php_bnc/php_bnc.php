<?php include_once("conn/conexao.php");?>
<?php

$result = 'SELECT * FROM servicos order by nome asc';

$result = mysqli_query($conn, $result);
?>
<?php
$todos = '';
$promo = '';

if($_POST){
	$on = '';
	
	$promo = $_POST['servicoPromo'];
	$todos = $_POST['servicoOnline'];
    $servicoF = $_POST['servico'];


    if($servicoF != '' && ($servicoF != 'PEDIDO DE SERVIÇO')){
    	$resultF = 'SELECT * FROM prestador where servico = "'.$servicoF.'"';
    }else{
    	$resultF = 'SELECT * FROM prestador';
    }
    
    $resultF = mysqli_query($conn, $resultF);
    
}else{
	
	$servicoF = '';
    
    $resultF = 'SELECT * FROM prestador';

    $resultF = mysqli_query($conn, $resultF);
}
?>


<script>
     abrt = '';
</script> 
<?php 
 if($todos != ''){?>
	<script>
   		 var abrt = 'true';
	</script>     
<?php
    }
?>
<script>
     promo = '';
</script> 
<?php 
 if(($promo != '') && ($promo != 'PEDIDO(S) DE SERVIÇO') && ($promo != 'APENAS SERVIÇOS')){?>
	<script>
   		 var promo = 'true';
	</script>     
<?php
    }else if($promo == 'PEDIDO(S) DE SERVIÇO'){?>
    <script>
   		 var promo = 'PEDIDO DE SERVIÇO';
	</script> 
<?php
    }else if($promo == 'APENAS SERVIÇOS'){?>
    <script>
   		 var promo = 'APENAS SERVIÇOS';
	</script> 
<?php
    }
?>