<?php
  require_once "libs/dao.php";
  function agregarTransaccion($dscdonacion, $tiempo, $prcdonacion, $nombre,
  $telefono, $correo, $numeroTarjeta, $mes, $anno, $cvc) {
      $insSql = "INSERT INTO transacciones
      (`concepto`, `tiempo`, `pago`, `nombre`, `telefono`,
      `correo`, `numeroTarjeta`, `mes`, `anno`, `cvc`, `fecha`)
        values ('%s', '%s', %f, '%s', '%s', '%s', '%s', '%s', '%s', '%s', now());";
        if (ejecutarNonQuery(
            sprintf(
                $insSql,
                $dscdonacion,
                $tiempo,
                $prcdonacion,
                $nombre,
                $telefono,
                $correo,
                $numeroTarjeta,
                $mes,
                $anno,
                $cvc
            )))
        {
          return getLastInserId();
        } else {
            return false;
        }
  }
?>
