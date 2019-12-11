<?php
/* Moda Controller
 * 2019-07-01
 * Created By OJBA
 */

require 'models/mantenimiento_donaciones.model.php';
/**
 * Controla la vista de Moda (Un Registro) en modo INS, UPD, DEL, DSP
 *
 * @return void
 */
function run()
{
    $tiempoDonaciones = obtenerTiempo();
    $selectedEst = 'PLN';
    $mode = "";
    $errores=array();
    $hasError = false;

    $modeDesc = array(
      "DSP" => "Forma de donación ",
      "INS" => "Creando nueva forma de donación",
      "UPD" => "Actualizando forma de donación ",
      "DEL" => "Eliminando forma de donación"
    );
    $viewData = array();
    $viewData["showIdDonacion"] = true;
    $viewData["showBtnConfirmar"] = true;
    $viewData["readonly"] = '';
    $viewData["selectDisable"] = '';

    if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
        redirectWithMessage(
            "Petición Solicitada no es Válida",
            "index.php?page=mantenimiento_donaciones"
        );
        die();
    }
    $viewData["xcfrt"] = $_SESSION["xcfrt"];
    if (isset($_POST["btnDsp"])) {
        $mode = "DSP";
        $moda = obtenerDonacionPorId($_POST["iddonacion"]);
        $viewData["showBtnConfirmar"] = false;
        $viewData["readonly"] = 'readonly';
        $viewData["selectDisable"] = 'disabled';
        mergeFullArrayTo($moda, $viewData);
        $viewData["donacionDsc"] = $modeDesc[$mode] . $viewData["dscdonacion"];
    }
    if (isset($_POST["btnUpd"])) {
        $mode = "UPD";
        //Vamos A Cargar los datos
        $moda = obtenerDonacionPorId($_POST["iddonacion"]);
        mergeFullArrayTo($moda, $viewData);
        $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscdonacion"];
    }
    if (isset($_POST["btnDel"])) {
        $mode = "DEL";
        //Vamos A Cargar los datos
        $moda = obtenerDonacionPorId($_POST["iddonacion"]);
        $viewData["readonly"] = 'readonly';
        $viewData["selectDisable"] = 'disabled';
        mergeFullArrayTo($moda, $viewData);
        $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscdonacion"];
    }
    if (isset($_POST["btnIns"])) {
        $mode = "INS";
        //Vamos A Cargar los datos
        $viewData["modeDsc"] = $modeDesc[$mode];
        $viewData["showIdDonacion"]  = false;
    }
    // if ($mode == "") {
    //     print_r($_POST);
    //     die();
    // }
    if (isset($_POST["btnConfirmar"])) {
        $mode = $_POST["mode"];
        $selectedEst = $_POST["estdonacion"];
         mergeFullArrayTo($_POST, $viewData);
        switch($mode)
        {
        case 'INS':
            $viewData["showIdDonacion"] = false;
            $viewData["modeDsc"] = $modeDesc[$mode];
            //validaciones
            if (floatval($viewData["prcdonacion"]) <= 0) {
                $errores[] = "El pago solicitado por donación no puede ser 0";
                $hasError = true;
            }
            if (!$hasError && agregarNuevaDonacion(
                $viewData["dscdonacion"],
                $viewData["estdonacion"],
                $viewData["prcdonacion"]
            )
            ) {
                redirectWithMessage(
                    "Forma de donación Guardada Exitosamente",
                    "index.php?page=mantenimiento_donaciones"
                );
                die();
            }
            break;
        case 'UPD':
            $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscdonacion"];
            if (modificarDonacion(
                $viewData["dscdonacion"],
                $viewData["estdonacion"],
                $viewData["prcdonacion"],
                $viewData["iddonacion"]
            )
            ) {
                redirectWithMessage(
                    "Forma de donación Actualizada Exitosamente",
                    "index.php?page=mantenimiento_donaciones"
                );
                die();
            }
            break;
        case 'DEL':
            $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscdonacion"];
            $viewData["readonly"] = 'readonly';
            $viewData["selectDisable"] = 'disabled';
            if (eliminarDonacion(
                $viewData["iddonacion"]
            )
            )
            {
                redirectWithMessage(
                    "Forma de donación Eliminada Exitosamente",
                    "index.php?page=mantenimiento_donaciones"
                );
                die();
            }
            break;
        }
    }
    $viewData["mode"] = $mode;
    $viewData["tiempoDonaciones"] = addSelectedCmbArray($tiempoDonaciones, 'cod', $selectedEst);
    $viewData["hasErrors"] = $hasError;
    $viewData["errores"] = $errores;
    renderizar("Admin_donacion", $viewData);
}
run();
?>
