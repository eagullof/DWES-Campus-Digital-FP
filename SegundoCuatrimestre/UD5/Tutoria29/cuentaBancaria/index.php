<?php
class CuentaBancaria
{
    public $titular; // Nombre del titular de la cuenta
    private $saldo;  // Saldo de la cuenta (acceso privado)

    // Constructor para inicializar la cuenta con titular y saldo inicial
    public function __construct($titular, $saldoInicial)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Método para depositar dinero en la cuenta
    public function depositar($cantidad)
    {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "Se han depositado $cantidad €. Nuevo saldo: " . $this->mostrarSaldo() . " €<br>";
        } else {
            echo "La cantidad a depositar debe ser mayor que 0.<br>";
        }
    }

    // Método para retirar dinero de la cuenta
    public function retirar($cantidad)
    {
        if ($cantidad > 0 && $cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
            echo "Se han retirado $cantidad €. Nuevo saldo: " . $this->mostrarSaldo() . " €<br>";
        } else {
            echo "Fondos insuficientes o cantidad no válida.<br>";
        }
    }

    // Método protegido para obtener el saldo actual
    protected function mostrarSaldo()
    {
        return $this->saldo;
    }

    // Método público para mostrar la información de la cuenta
    public function mostrarInformacion()
    {
        echo "Titular: $this->titular, Saldo: " . $this->mostrarSaldo() . " €<br>";
    }
}

// Crear una cuenta bancaria con 1000€ de saldo inicial
$cuenta = new CuentaBancaria("Juan Pérez", 1000);

// Mostrar la información inicial
$cuenta->mostrarInformacion();

// Depositar dinero
$cuenta->depositar(500);

// Intentar retirar dinero
$cuenta->retirar(300);

// Intentar retirar más dinero del disponible
$cuenta->retirar(2000);

// Mostrar la información final
$cuenta->mostrarInformacion();
