<?php

require_once "libs/dao.php";
/*
    idmoda bigint(15) AI PK
    dscmoda varchar(60)
    blogmoda mediumtext
    bannermod varchar(512)
    thumbmoda varchar(512)
    modelmoda varchar(512)
    prcmoda decimal(15,2)
    ivamoda decimal(5,2)
    estmoda char(3)
    idcategoria bigint(15)

    `modas`.`idmoda`,
    `modas`.`dscmoda`,
    `modas`.`blogmoda`,
    `modas`.`bannermod`,
    `modas`.`thumbmoda`,
    `modas`.`modelmoda`,
    `modas`.`prcmoda`,
    `modas`.`ivamoda`,
    `modas`.`estmoda`,
    `modas`.`idcategoria`
*/
/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerDonaciones()
{
    $sqlstr = "select `donaciones`.`iddonaciones`,
    `donaciones`.`descripcion_donacion`,
    `donaciones`.`tiempo`,
    `donaciones`.`pago`
    from `ari_db`.`donaciones`";
    $donaciones = array();
    $donaciones = obtenerRegistros($sqlstr);
    return $donaciones;
}

/**
 * Obtiene una moda por ID
 *
 * @param number $id identificador de la moda
 *
 * @return void
 */
function obtenerDonacionPorId($id)
{
    $sqlstr = "select `donaciones`.`iddonaciones`,
    `donaciones`.`descripcion_donacion`,
    `donaciones`.`tiempo`,
    `donaciones`.`pago`
    from `ari_db`.`donaciones`
    where `donaciones`.`iddonaciones`";

    $donaciones = array();
    $donaciones = obtenerUnRegistro(sprintf($sqlstr, $id));
    return $donaciones;
}

/*function obtenerTiempoPorId($id)
{
    $sqlstr"select `donaciones` . `tiempo`
            from `donaciones` . `donaciones` where iddonaciones=%d";
            $donaciones = array();
            $donaciones = obtenerUnRegistro(sprintf($sqlstr, $id));
            return $donaciones;   
}*/

function obtenerTiempo()
{
    return array(
        array("cod"=>"MEN", "dsc"=>"Mensual"),
        array("cod"=>"SEM", "dsc"=>"Semestral"),
        array("cod"=>"ANU", "dsc"=>"Anual")
    );
}
/**
 * Agrega nuevo Moda a la tabla
 *
 * @param string $dscmoda Descripción de la Moda
 * @param double $prcmoda Precio de la moda
 * @param double $ivamoda Impuesto de la moda 0 - 1
 * @param string $estmoda Estado de la Moda [ACT, INA, PLN, RET]
 *
 * @return integer affected rows
 */

function agregarNuevaDonacion($dscdonacion, $tiempo, $prcdonacion) {
    $insSql = "INSERT INTO donaciones(descripcion_donacion, tiempo, pago)
      values ('%s', '%s', %f);";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $dscdonacion,
              $tiempo,
              $prcdonacion
          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificarDonacion($dscdonacion, $estdonacion, $prcdonacion, $iddonacion)
{
    $updSQL = "UPDATE donaciones set descripcion_donacion='%s', tiempo='%s',
    pago=%f where iddonaciones=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $dscdonacion,
            $estdonacion,
            $prcdonacion,
            $iddonacion
        )
    );
}
function eliminarDonacion($iddonacion)
{
    $delSQL = "DELETE FROM donaciones where iddonaciones=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $iddonacion
        )
    );
}


?>
