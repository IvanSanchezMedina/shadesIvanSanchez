<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Http\Requests\StoreProductosRequest;
class ProductosController extends Controller
{
    private $productos;
    
    //funcion construct para ejecutar instacinas

    public function __construct( Productos $productos){
        $this->productos = $productos;
    }

    /**
     * Muestra la lista de productos y se pasan
     * como parametros a la vista listaProductos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaProductos = $this->productos->all();
        return view('dashboard', compact('listaProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Se registran los valores ingresados en el formulario
     * se realiza validacion con respuesta en caso de error.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductosRequest $request)
    { 
     
      if($request->validated()){
        if(isset($request->archivo )){
            $request->file('archivo')->store('public');
        }
      
        $this->productos->create([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'cantidad'=>$request->cantidad,
            'archivo'=>isset($request->archivo ) ? $request->file('archivo')->store('public') : '',
        ]);
        return back()->with('success','Producto guardado correctamente');
      }else{
        return back()->with('error',$request->validated());
      }
        

    }

    /**
     * Muestra vista especifica basada en
     * producto seleccionado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = $this->productos->find($id);
        return view('productos.show',compact('producto'));
    }

    /**
     * Muestra la vista para editar con los datos precargados
     * en el formulario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = $this->productos->find($id);
        return view('productos.edit',compact('producto'));
    }

    /**
     * Actualiza los datos del formulario y vallida el request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductosRequest $request, $id)
    {
 
        $producto = $this->productos->find($id);
      
      if($request->validated()){
        // if( $request->hasFile('archivo')){
        //   $request->file('archivoo')->store('public');
        // //     if(File::exists($producto->archivo)){
        // //       File::delete($producto->archivo);
        // //     }
        // // }
       
        $producto->update([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'cantidad'=>$request->cantidad,
            //  'archivo'=>$request->file('archivoo')->store('public')
        ]);

        return back()->with('success','Producto actualizado correctamente');

      }else{

        return back()->with('error',$request->validated());
      }
       
    }

    /**
     *Se elimina un producto recibiendo como parametro Id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = $this->productos->find($id);
        $producto->delete();
        return redirect()->back();
    }
}
