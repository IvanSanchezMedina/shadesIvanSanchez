<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Http\Requests\StoreProductosRequest;
class ProductosController extends Controller
{
    private $productos;
    
    public function __construct( Productos $productos){
        $this->productos = $productos;
    }
    /**
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
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
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
