<?php include_once("../conn/conexao.php");?>
<?php
    $result = 'SELECT * FROM servicos order by nome asc';
    $result = mysqli_query($conn, $result);  

    if($_POST){
       $ok = "alt";
       $senha = $_POST['senha'];
       $res = 'select * from prestador where senha = "'.$senha.'"';
       $res = mysqli_query($conn, $res);
       $row = mysqli_fetch_assoc($res);

       
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MapViceRouter</title>
    
  </head>

  <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">

  <!-- Style timepicker -->
  <link rel="stylesheet" href="../css/min/timepicker.min.css">

  <link rel="stylesheet" href="../css/min/clockpicker.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="../css/min/style2.min.css">

  <!-- jQuery library -->
  <script src="../js/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="../js/bootstrap.min.js"></script>

  <script src="../js/nucleo2.js"></script>

  <!-- Timepicker library -->
  <!-- <script type="text/javascript" src="js/timepicker.min.js"></script>  -->

  <!-- Clockpicker library -->
  <script type="text/javascript" src="../js/clockpicker.min.js"></script>


<body> 

<div class="rodape">


<div id="floating-panel">

 <form id="form" class="form" action="processa_cad.php" method="post">

      <input  placeholder="Nome do seu serviço" required type="text" id="<?php if($_POST){echo 'nome';}else{echo "nome";}?>" name="nome" value="<?php if($_POST){echo $row['nome'];}?>">

      <input  placeholder="Contato" required type="number" id="<?php if($_POST){echo 'cel';}else{echo "cel";}?>" name="cel" value="<?php if($_POST){ echo $row['cel'];}?>">
      <?php if($_POST){?>
      <span class="spanS"><p>Essa é sua senha:</p></span>
      <?php }?>
      <div class="senhaCenter"><b>
      <input required type="<?php if($_POST){?>text<?php }else{?>hidden<?php }?>" id="senha" name="senha" value="<?php if($_POST){ echo $row['senha'];}?>"></b>
  	  </div>
      <input type="hidden" id="senhold" name="senhold" value="<?php if($_POST){ echo $row['senha'];}?>">
      <input type="hidden" value="<?php if($_POST){echo $ok;}?>" name="alt">
      
      <select class="select" name="servico" id="servico" onchange=""> 
            <option class="option0">Seguimento do Estabelecimento</option>
      <?php while ($rowS = mysqli_fetch_assoc($result)){ ?>
            <option class="option" id="<?php echo $rowS['id'];?>" <?php if($_POST){if($rowS['nome'] == $row['servico']){ echo "selected";}}?>  value="<?php echo $rowS['nome'];?>">
                <?php echo $rowS['nome'];?>
            </option>
      <?php }?>
      </select>
      <button type="button" class="descricao" data-toggle="modal" data-target="#mdl">
          Descrição
      </button> 
      <div class="pedido">
  	      <span class="span">Pedido de serviço  
          <input type="checkbox" <?php if($_POST){if($row['pedido'] != ''){?> checked <?php }}?>  id="pedido" name="pedido"  onclick="myFunction()">
          </span>
          <input type="text" readonly="true" required value="<?php if($_POST){echo $row['timeopen'];}?>" placeholder="Hrs Abrir" id="timeopen" name="timeopen" class="clockpicker" data-autoclose="true">
      </div>

      <div class="pedido">
  	      <span class="span">Exibir meu número 
  	      <input type="checkbox" <?php if($_POST){if($row['permissao'] != ''){?> checked <?php }}?> id="permissao" name="permissao"  onclick="myFunction()">
  	      </span>
          <input type="text" readonly="true" required value="<?php  if($_POST){echo $row['timeclose'];}?>" placeholder="Hrs Fechar" id="timeclose" name="timeclose" class="clockpicker" data-autoclose="true" >
      </div>
      <input type="hidden" name="local" id=local value="(<?php if($_POST){echo $row['localizacao'];}?>)">
      <input class="btn btn-primary efect" type="submit" onclick="<?php if(!$_POST){?> gerarSenha();<?php }?>" required 
          value="<?php if($_POST){echo "ATUALIZAR CADASTRO";}else{echo "CADASTRAR";}?>">


<!-- //////////////// -->

<!-- Modal -->
<div class="modal fade" id="mdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DESCRIÇÃO DO ESTABELECIMENTO</h5>
          <div class="modal-body">
              <div class="area">
                  <textarea  maxlength="30" id="areaDesc" name="descricao" rows="5" class="form-control" rows="15" cols="45" id="descricao"><?php if($_POST){echo $row['descricao'];}?></textarea>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="close reset" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
          <span aria-hidden="true">Ok</span>
        </button>
      </div>
    </div>
  </div>
</div>
</form> 




<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>


</div>
</div>

<!--  <div id="floating-panel">
  <input onclick="clearMarkers();" type=button value="Hide Markers">
  <input onclick="showMarkers();" type=button value="Show All Markers">
  <input onclick="deleteMarkers();" type=button value="Delete Markers">
</div> -->
<input type="hidden" id="atualL">
<div id="map" class="map"</div>  
<script type="text/javascript">
  $('#servico').change(function(){
    var form = $("#form_servicos");
    form.submit();
});
function gerarSenha(){
    var senhaP1 = document.getElementById('nome');
    var senhaP2 = document.getElementById('cel');
    var senhaP3 = document.getElementById('servico');
    var senhaP4 = document.getElementById('local');
    

    var senhaG = '';

    senhaG = senhaP1.value.substring(1,2);
    senhaG += senhaP2.value.substring(2,4);
    senhaG += senhaP3.value.substring(1,2);
    senhaG += senhaP4.value.substring(senhaP4.value.length-4,senhaP4.value.length-1);

    
    document.getElementById('senha').value = senhaG;
}
</script>
<script>   
// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
        var map;
        var markers = [];
              
function initMap() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

        var position = new google.maps.LatLng(pos.lat, pos.lng);
        document.getElementById('atualL').value = position;
        marker = new google.maps.Marker({
            title: 'VOCÊ',
            icon: '../icons/marker.png',
            //position: position
        });

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: position,
            mapTypeId: 'terrain'
        });
        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            deleteMarkers();
            addMarker(event.latLng);
        });

        marker.setMap(map);
        info.setPosition(pos);
        info.setContent('Location found.');
        map.setCenter(pos);

        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
        } else {
        // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

        var position = document.getElementById('atualL').value;
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
    var marker = new google.maps.Marker({
        icon: '../icons/marker.png',
        position: location,
        map: map
    });
    markers.push(marker);
    document.getElementById('local').value = marker.position;


}
document.getElementById('local') = marker.position;
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr1_71h8xanj7QbjFabQ1pOqKiIQe1iOw&callback=initMap">
</script>
<script type="text/javascript">
    $('#timeopen').timepicker();
</script>
<script type="text/javascript">
    $('#timeclose').timepicker();
     
</script>
</body>
</html>