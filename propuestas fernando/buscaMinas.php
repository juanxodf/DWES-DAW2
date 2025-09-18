<?php
// Clase que representa una celda
class Celda
{
    public $mina;       // true si tiene mina
    public $numero;     // cantidad de minas alrededor
    public $revelada;   // true si está revelada

    public function __construct()
    {
        $this->mina = false;
        $this->numero = 0;
        $this->revelada = false;
    }
}

// Clase tablero, usando vector lineal
class Tablero
{
    private $ancho;
    private $alto;
    private $celdas = [];

    public function __construct($ancho, $alto, $cantidadMinas = 1)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;

        // Crear celdas vacías
        for ($i = 0; $i < $ancho * $alto; $i++) {
            $this->celdas[$i] = new Celda();
        }

        // Colocar minas aleatorias
        $totalCeldas = $ancho * $alto;
        $colocadas = 0;
        while ($colocadas < $cantidadMinas) {
            $indiceMina = rand(0, $totalCeldas - 1);
            if (!$this->celdas[$indiceMina]->mina) {
                $this->celdas[$indiceMina]->mina = true;
                $colocadas++;
            }
        }

        // Calcular números alrededor
        $this->calcularNumeros();
    }

    // Convierte coordenadas (x,y) en índice del vector
    private function indice($x, $y)
    {
        return $y * $this->ancho + $x;
    }

    // Devuelve la celda en (x,y)
    private function getCelda($x, $y)
    {
        return $this->celdas[$this->indice($x, $y)];
    }

    // Calcular números de minas vecinas
    private function calcularNumeros()
    {
        for ($y = 0; $y < $this->alto; $y++) {
            for ($x = 0; $x < $this->ancho; $x++) {
                $celda = $this->getCelda($x, $y);
                if ($celda->mina) continue;

                $contador = 0;
                for ($dy = -1; $dy <= 1; $dy++) {
                    for ($dx = -1; $dx <= 1; $dx++) {
                        if ($dx == 0 && $dy == 0) continue;
                        $nx = $x + $dx;
                        $ny = $y + $dy;
                        if ($nx >= 0 && $nx < $this->ancho && $ny >= 0 && $ny < $this->alto) {
                            if ($this->getCelda($nx, $ny)->mina) {
                                $contador++;
                            }
                        }
                    }
                }
                $celda->numero = $contador;
            }
        }
    }

    // Revelar celda
    public function revelar($x, $y)
    {
        $celda = $this->getCelda($x, $y);
        $celda->revelada = true;
        return $celda->mina; // true si es mina
    }

    // Mostrar tablero
    public function mostrar($mostrarTodo = false)
    {
        for ($y = 0; $y < $this->alto; $y++) {
            for ($x = 0; $x < $this->ancho; $x++) {
                $celda = $this->getCelda($x, $y);

                if ($mostrarTodo || $celda->revelada) {
                    if ($celda->mina) {
                        echo "* ";
                    } else {
                        echo $celda->numero . " ";
                    }
                } else {
                    echo "# "; // no revelada
                }
            }
            echo PHP_EOL;
        }
    }
}

// ---------------- PRUEBA -----------------
$tablero = new Tablero(5, 5, 5); // tablero 5x5 con 5 minas
echo "Tablero inicial (oculto):\n";
$tablero->mostrar();
$continua = true;
echo "\nRevelo (2,2):\n";
$mina = $tablero->revelar(2, 2);
$tablero->mostrar();

while ($continua && !$mina) {
    $x = rand(0, 4);
    $y = rand(0, 4);
    echo "\nRevelo ($x,$y):\n";
    $mina = $tablero->revelar($x, $y);
    $tablero->mostrar();
    if ($mina) {
        echo "\n💥 ¡Has pisado una mina!\n";
        echo "\nTablero completo:\n";
        $tablero->mostrar(true);
    } else {
        echo "\n✅ Seguro, sigue jugando...\n";
    }
}
