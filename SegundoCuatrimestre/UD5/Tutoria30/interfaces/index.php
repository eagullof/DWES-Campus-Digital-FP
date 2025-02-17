<?php
// Definimos la interfaz MetodoPago
interface MetodoPago
{
    public function pagar($monto);
}

// Implementamos la interfaz en la clase PagoTarjeta
class PagoTarjeta implements MetodoPago
{
    public function pagar($monto)
    {
        echo "Pago de $monto € realizado con tarjeta de crédito.<br>";
    }
}

// Implementamos la interfaz en la clase PagoPayPal
class PagoPayPal implements MetodoPago
{
    public function pagar($monto)
    {
        echo "Pago de $monto € realizado con PayPal.<br>";
    }
}

// Implementamos la interfaz en la clase PagoBitcoin
class PagoBitcoin implements MetodoPago
{
    public function pagar($monto)
    {
        echo "Pago de $monto € realizado con Bitcoin.<br>";
    }
}

// Función para procesar un pago sin importar el método
function procesarPago(MetodoPago $metodo, $monto)
{
    $metodo->pagar($monto);
}

// Probamos con distintos métodos de pago
$tarjeta = new PagoTarjeta();
$paypal = new PagoPayPal();
$bitcoin = new PagoBitcoin();

procesarPago($tarjeta, 50);
procesarPago($paypal, 75);
procesarPago($bitcoin, 120);
