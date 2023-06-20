<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
class PruebaTecnicaController extends Controller
{
    public function holaMundo(){

        //se imprime un hola mundo
        return 'Hola Mundo';
    }

    function sumar($valorUno, $valorDos){

        //operacion de suma de valores recibidos por parametros
       $resultado =$valorUno + $valorDos;

       //se retorna el resultado
       return $resultado;

    }

    public function operaciones(){
        //declaracion de valores
        $valorUno=134;
        $valorDos=4;

        //retorno de resultado de operaciona 
        return $this->sumar($valorUno,$valorDos);
    }

    public function consulta(){
        //consulta en query selecciona todo los usuario que tengan 18 o mas años
        $query = DB::select('SELECT * FROM users WHERE edad >= 18');

        //se ejecuta consulta
        return $query;
    }

    public function numerosPares(){
        //array de numeros aleatorios
        $numeros=[
            1,2,5,3,44,56,76,3,6,8,6,4,9,2,3,4,5,14,24,67,98,97,86,47,5,7,9,0,8,4,2,5,2354,42,46,2,3,4,6,4,232,34,135676,4
        ];

        //array donde se almacenaran los numero pares encontrados
        $numeroPares=[];

        //ciclo para recorrer el array de numeros
        foreach ($numeros as $numero) {

            //condicion para saber si un numero es para, operacion matematica
           if( ($numero % 2)==0){

            //se agregan los valores que sean pares al array NumeroPares
            array_push($numeroPares,$numero);
           }
        }

        //Se retorna resultado de array con todos los numeros pares encontrados
        return $numeroPares;
    }

        // DIFERENCIA ENTRE VARIABLES LOCALES Y GLOBALES

    // Variables locales: Son variables utilizadas dentro de una función o método en PHP y
    //  tienen un alcance limitado y solo están disponibles dentro de la función donde se declaran. 

    //   Variables globales: Son variables declaradas fuera de cualquier función o método en PHP. 
    //   Estas variables tienen un alcance global y se pueden acceder a estas y modificar desde cualquier parte del código,
    //   


    public function leerArchivo(){

        //Con estorage se puede mostrar directamente en caso de que sea un archivo de texto

        // $archivo=Storage::get('public/datos.txt');
        // return $archivo;


        //ruta del archivo
       $archivo = 'storage/datos.txt'; // Ruta al archivo de texto

        // Abre el archivo en modo lectura
        $manejador = fopen($archivo, 'r');

        // Lee el contenido del archivo y lo guarda en una variable
        $contenido = fread($manejador, filesize($archivo));

        // Cierra el archivo
        fclose($manejador);

        // Muestra el contenido del archivo
        return $contenido;

    }

    public function consultaUpdate(){
        //Query que actualiza un producto con el id numero 5 y pasar nuevo valor al campo nombre
        $query = DB::select("UPDATE productos SET nombre = 'Nuevo Producto' WHERE id = 5");

        //se ejecuta consulta
        return $query;
    }


}

