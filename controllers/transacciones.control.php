<?php
/* Modas Controller
 * 2019-07-01
 * Created By OJBA
 */

/**
 * Controla la lista del Patron Trabajar Con
 *
 * @return void
 */
require 'models/transacciones.model.php';
function run()
{
    $viewData = array();
    $viewData["xcfrt"] = md5(microtime());
    $_SESSION["xcfrt"] = $viewData["xcfrt"];
    $viewData["transacciones"] = obtenerTransacciones();
    renderizar("transacciones", $viewData);
}
  run();
?>
