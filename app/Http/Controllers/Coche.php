<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Coche extends Controller
{
    //variables a tomar
    public $marca;
    public $modelo;


    public function informacionCoche() {
        //se declara estructura de como retornara informacion recibida
        echo "Marca: " . $this->marca ;
        echo '<br>';
        echo "Modelo: " . $this->modelo ;
    }

    public function nuevoCoche(){
        // Crear una instancia de la clase Coche
        $miCoche = new Coche();

        // Establecer valores de las propiedades
        $miCoche->marca = "Toyota";
        $miCoche->modelo = "Corolla";

        // Llamar al método para mostrar la información del coche
       return $miCoche->informacionCoche();
    }

}
