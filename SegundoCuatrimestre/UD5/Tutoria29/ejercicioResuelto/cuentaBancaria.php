<?php

class CuentaBancaria
{
    const DIGITOS_IBAN = 4;
    public $titular;
    private $saldo;
    private $iban;

    function get_iban()
    {
        return $this->iban;
    }

    function set_iban($iban)
    {
        if (strlen($iban) != $this::DIGITOS_IBAN) {
            echo "IBAN incorrecto. Prueba de nuevo.";
        } else {
            $this->iban = $iban;
        }
    }

    function __construct($titular, $saldoInicial)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function depositar($cantidad)
    {
        $this->saldo += $cantidad;
    }

    public function retirar($cantidad)
    {
        if ($this->saldo >= $cantidad) {
            $this->saldo -= $cantidad;
        } else {
            echo "<p>No es posible retirar esa cantidad</p>";
        }
    }

    protected function mostrarSaldo()
    {
        return $this->saldo;
    }

    public function mostrarInformacion()
    {
        echo "El titular es: " . $this->titular . ". El saldo actual es: " . $this->mostrarSaldo() . ". <br>";
    }
}
