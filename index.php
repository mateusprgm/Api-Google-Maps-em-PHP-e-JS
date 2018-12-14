<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MapViceRouter</title>
<?php include_once("php_bnc/php_bnc.php");?>

	<script type="text/javascript" 
	src="http://maps.google.com/maps/api/js?libraries=geometry&key=AIzaSyCr1_71h8xanj7QbjFabQ1pOqKiIQe1iOw&callback"></script>

	<script type="text/javascript" src="js/jquery.min.js"></script>

	<link rel="stylesheet" href="css/min/bootstrap.min.css">

	<link rel="stylesheet" href="css/min/style.min.css">

	<script src="js/bootstrap1.min.js"></script>

	

<?php //include_once("js/corevice.min.js");?>
<?php include_once("cplm/corevice.php");?>

</head>	

<body onload="initialize()"> 

<div class="rodape">
	<div id="floating-panel">
		<a href="cplm/cadastro.php">
			<input type="button" class="btn btn-sucess cadastrar" value="CADASTRAR SERVIÇO/PEDIDO">
		</a>
				<form  id="form_servicos" action="#" method="POST">
				    <select name="servico" id="servico"  class="btn-primary"> 
				    	   <option id="option0" value="">SERVIÇOS</option>
								<?php while ($row = mysqli_fetch_assoc($result)){ ?>
				           <option id="option" <?php if($_POST){if($row['nome'] == $_POST['servico']){?> selected <?php }}?> value="<?php echo $row['nome'];?>">
				           		<?php echo $row['nome'];?>	
				           </option>
								<?php }?>
				    </select>
				    <select name="servicoOnline" id="servicoOnline" class="btn-primary"> 
				    	   <option id="option0" value="" >TODOS</option>
				    	   <option id="option0" value="ABERTOS" <?php if($_POST){if($_POST['servicoOnline'] == 'ABERTOS'){?> selected <?php }}?> >ABERTOS</option>
				    </select>
				    <select name="servicoPromo" id="servicoPromo"  class="btn-primary"> 
				    	   <option id="option1" value="" >TODOS</option>
				    	   <option id="option1" value="PROMOCOES"  <?php if($_POST){if($_POST['servicoPromo'] == 'PROMOCOES'){?> selected <?php }}?> >PROMOÇÕES</option>

				    	    <option id="option1" value="PEDIDO(S) DE SERVIÇO" <?php if($_POST){if($_POST['servicoPromo'] == "PEDIDO(S) DE SERVIÇO"){?> selected <?php }}?>>PEDIDO DE SERVIÇO</option> 

				    	    <option id="option1" value="APENAS SERVIÇOS" <?php if($_POST){if($_POST['servicoPromo'] == "APENAS SERVIÇOS"){?> selected <?php }}?>>APENAS SERVIÇOS</option> 
				    </select>
				</form>
				<button type="button" class="btn btn-warning acao" data-toggle="modal" data-target="#mdl">
  					EXCLUIR/ALTERAR SERVIÇOS
				</button>	
	</div>
</div>
	
	<input type="hidden" id="info" onchange="getval(this);">
	<form action="#" method="POST" id="form_route">
		
		<input class="invisible" type="submit" id="selecionar" name="selecionar" value="selecionar" />
		<input class="invisible" type="button" id="submit"  value="Traçar rota" />

	</form>
	<div id="floating-panel1">

		<?php if($servicoF != ''){
			echo  "<b id='dres' ><b style='color: red;'>".$servicoF."</b> nas proximidades</b>";
		}else{echo "<b id='dres'>Todos os serviços nas proximidades </b>";}?>
		

		
	</div>	

	<div id="map_content"></div>

<!-- Modal -->
<div class="modal fade" id="mdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AÇÃO DE SERVIÇOS</h5>
        <div class="modal-body">
        <form action="cplm/deletar.php" method="POST">
        	<input placeholder="Login" type="number" required name="login" id="login">
			<input placeholder="Senha" type="password" required name="senha" id="senha">
			<input type="submit" class="btn btn-danger" id="btn_exe" value="EXCLUIR SERVIÇO" onclick="exal();">
		</form>
		<form action="cplm/valid.php" method="POST" name="formAlterar" id="formAlterar">
			<input placeholder="Login" type="hidden" required name="login" id="login1">
			<input placeholder="Senha" type="hidden" required name="senha" id="senha1">
			<input type="submit" class="btn btn-primary" id="btn_ex" value="EDITAR SERVIÇO" onclick="exal();">
			<input type="hidden" name="edita" value="edita">
		</form>
		<form action="cplm/valid.php" method="POST" name="formPro" id="formPro">		
			<input placeholder="Login" type="hidden" required name="login" id="login2">
			<input placeholder="Informe senha" type="hidden" required name="senha" id="senha2">

			<input type="button" class="btn btn-sucess" id="btn_Pro" value="EXIBIR/OCULTAR PROMOÇÃO" onclick="exal();" data-toggle="modal" data-target="#mdls">
	        

			<input name="promocao" type="hidden" value="promocao">
			<div class="modal fade" id="mdls" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">DESCRIÇÃO DA PROMOÇÂO</h5>
			          <div class="modal-body">
			              <div class="area">
			                  <textarea  maxlength="30" id="promoDesc" name="promoDesc" rows="5" class="form-control" rows="15" cols="45" id="descricao"></textarea>
			              </div>
			          </div>
			      </div>
			      <div class="modal-footer">
			          <input type="submit" class="btn btn-sucess" id="btn_Pro2" value="PUBLICAR PROMOÇÂO" onclick="exal();">
			      </div>
			    </div>
			  </div>
			</div>
		</form>
      </div>
      </div>
      <div class="modal-footer">
        	<button type="button" class="close reset" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('H:i');
?>
<input id="hrAtual" type="hidden" value="<?php echo $date; ?>">
</body>
</html>
