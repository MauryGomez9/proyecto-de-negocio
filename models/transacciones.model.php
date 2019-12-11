
<?php
    require_once "libs/dao.php";
    function obtenerTransacciones()
    {
        $sqlstr = "select `transacciones`.`idtransacciones`,
          `transacciones`.`concepto`,
          `transacciones`.`tiempo`,
          `transacciones`.`pago`,
          `transacciones`.`nombre`,
          `transacciones`.`telefono`,
          `transacciones`.`correo`,
          `transacciones`.`numeroTarjeta`,
          `transacciones`.`mes`,
          `transacciones`.`anno`,
          `transacciones`.`cvc`,
          `transacciones`.`fecha`
      from `ari_db`.`transacciones`;";
        $donaciones = array();
        $donaciones = obtenerRegistros($sqlstr);
        return $donaciones;
    }
?>
