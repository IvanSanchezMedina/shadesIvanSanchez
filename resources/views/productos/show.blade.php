<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url()->previous() }}" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Regresar</a>


                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Password requirements:</h2>
                      <!-- Listado de informacion de producto se muestran, Nombre, Precio, Cantidad, y archivo, 
                    el archivo se visualiza ya se imagen o pdf-->
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <li>
                            <a class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Nombre de producto:</a>
                            {{ $producto->nombre }}
                        </li>
                        <li>
                            <a class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Precio:</a>
                            {{ $producto->precio }}
                        </li>
                        <li>
                            <a class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Cantidad:</a>
                            {{ $producto->cantidad }}
                        </li>
                        <li>
                              <!-- Visualizacion de archivo segun su extension-->
                            <a class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Archivo:</a>
                            @if (pathinfo($producto->archivo, PATHINFO_EXTENSION) == 'jpg' ||
                                    pathinfo($producto->archivo, PATHINFO_EXTENSION) == 'png')
                                <img src="{{ Storage::url($producto->archivo) }}" width="50%" alt="">
                            @else
                                <iframe src="{{ Storage::url($producto->archivo) }}" style="width:600px; height:500px;"
                                    frameborder="0"></iframe>
                            @endif

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
