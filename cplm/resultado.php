
<?php
require("../conn/conexao.php");

function parseToXML($htmlStr){
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}

// Select all the rows in the markers table
$result_markers = "SELECT id, nome, localizacao, promodesc, promocao, permissao, descricao, timeopen, timeclose, cel, servico, pedido FROM prestador";
$resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row_markers['nome']) . '" ';
  echo 'local="' . $row_markers['localizacao'] . '" ';
  echo 'servico="' . $row_markers['servico'] . '" ';
  echo 'pedido="' . $row_markers['pedido'] . '" ';
  echo 'permissao="' . $row_markers['permissao'] . '" ';
  echo 'promocao="' . $row_markers['promocao'] . '" ';
  echo 'promodesc="' . $row_markers['promodesc'] . '" ';
  echo 'descricao="' . $row_markers['descricao']. '" ';
  echo 'timeopen="' . $row_markers['timeopen'] . '" ';
  echo 'timeclose="' . $row_markers['timeclose'] . '" ';
  echo 'cel="' . $row_markers['cel'] . '" ';
  echo 'id="' . $row_markers['id'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

