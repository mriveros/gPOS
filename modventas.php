<?php

include("tool.php");
if (!getSesionDato("IdTienda")){
  session_write_close();
  //header("Location: #");
  exit();
}
$IdLocal = getSesionDato("IdTienda");
$modo    = CleanText($_GET["modo"]);
$locales = getLocalesPrecios($IdLocal);
switch($modo) {
        case "mostrarPedidos":
	  include("xulpedidosventa.php"); 
	  break;
	case "mostrarComprobantes":
	  include("xulventas.php"); 
	  break;
}

?>


