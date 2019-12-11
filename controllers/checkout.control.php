<?php
require_once 'libs/paypal.php';
require_once 'models/checkout.model.php';
/**
 * Renderizado de Documento
 *
 * @return void
 */
function run()
{
    $viewData = array();
    $concepto="";
    $tiempo="";
    $precio="";
    $nombre = "";
    $telefono = "";
    $correo = "";
    $numeroTarjeta = "";
    $mes ="";
    $anno ="";
    $cvc = "";
    //Esto lo saca de la carretilla de compras
    if (!isset($_POST["btnSubmit"]))
    {
      $viewData["precio"]=$_POST["valorPago"];
      $viewData["time"]=$_POST["valorTiempo"];
      $viewData["concepto"]=$_POST["valorDesc"];
    }
    $myItems = array(
      array(
          "sku"=>"PRD01",
          "name"=>$_POST["valorDesc"],
          "quantity"=>"1",
          "price"=>$_POST["valorPago"],
          "subtotal"=>"10",
          "tiempo"=>$_POST["valorTiempo"])
    );
    $viewData["items"] = $myItems;
    if (isset($_POST["btnSubmit"]))
    {
        $concepto=$_POST["name"];
        $tiempo=$_POST["time"];
        $precio=$_POST["price"];
        $nombre = $_POST["txtNombre"];
        $telefono = $_POST["txtPhone"];
        $correo = $_POST["txtMail"];
        $numeroTarjeta = $_POST["txtNumero"];
        $mes = $_POST["txtMes"];
        $anno = $_POST["txtAnno"];
        $cvc = $_POST["txtCVC"];
        $payPalReturn = createPaypalTransacction(0, $myItems);
        if ($payPalReturn) {
            redirectToUrl($payPalReturn);
        }
        $viewData["returndata"] = $payPalReturn;
        agregarTransaccion($concepto, $tiempo, $_POST["price"], $nombre,
        $telefono, $correo, $numeroTarjeta, $mes, $anno, $cvc);
        redirectWithMessage(
            "Pago realizado con éxito",
            "index.php?page=donaciones"
        );
    }
    renderizar("checkout", $viewData);
}

/**
 * Undocumented function
 *
 * @param [type] $_amount Cantidad a Realizar en la transacción
 * @param array  $_items  Productos a Solicitar Pago
 *
 * @return array datos de la transaccion por paypal
 */
function createPaypalTransacction( $_amount , $_items )
{
    $apiContext = getApiContext();
    $payer = new \PayPal\Api\Payer();
    $payer->setPaymentMethod('paypal');

    $items = new \PayPal\Api\ItemList();
    $_amount = 0 ;
    foreach ($_items as $_item) {
        $item = new \PayPal\Api\Item();
        $item->setSku($_item["sku"]);
        $item->setName($_item["name"]);
        $item->setQuantity($_item["quantity"]);
        $item->setPrice($_item["price"]);
        $_amount += floatval($_item["price"]);
        $item->setCurrency('USD');
        $items->addItem($item);
    }

    $amount = new \PayPal\Api\Amount();
    $amount->setTotal(strval($_amount));
    $amount->setCurrency('USD');

    $transaction = new \PayPal\Api\Transaction();
    $transaction->setAmount($amount);
    $transaction->setNoteToPayee("Venta de Paquete para un mes de EdnaModas");
    $transaction->setItemList($items);

    $redirectUrls = new \PayPal\Api\RedirectUrls();

    $redirectUrls
        ->setReturnUrl("http://localhost/mvc/index.php?page=checkoutapp")
        ->setCancelUrl("http://localhost/mvc/index.php?page=checkoutcnl");

    $payment = new \PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);

    try {
        $payment->create($apiContext);
        $_SESSION["paypalTrans"] = $payment;
        return $payment->getApprovalLink();
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        // This will print the detailed information on the exception.
        //REALLY HELPFUL FOR DEBUGGING
        error_log($ex->getData());
        return false;
    }
}

run();
?>
