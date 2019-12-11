<?php
/* Modas Controller
 * 2019-07-01
 * Created By OJBA
 */

require 'models/mantenimiento_donaciones.model.php';
/**
 * Controla la lista del Patron Trabajar Con
 *
 * @return void
 */
function run()
{
  $hasError = false;
  $tiempo = "";
  $pago = "";
  $desc="";
  if (isset($_POST["btnCarrito"]))
  {
    $hasError = true;
    $tiempo = $_POST["valorTiempo"];
    $pago = $_POST["valorPago"];
    $desc=$_POST["valorDesc"];
  }

  if (isset($_POST["btnEliminar"]))
  {
    $hasError = false;
    $tiempo ="";
    $pago ="";
    $desc="";
  }

    $viewData = array();
    $viewData["xcfrt"] = md5(microtime());
    $_SESSION["xcfrt"] = $viewData["xcfrt"];
    $viewData["donaciones"] = obtenerDonaciones();
    $viewData["hasErrors"] = $hasError;
    $viewData["valorTiempo"] = $tiempo;
    $viewData["valorDesc"] = $desc;
    $viewData["valorPrecio"] = $pago;
    renderizar("donaciones", $viewData);
}
run();
?>
