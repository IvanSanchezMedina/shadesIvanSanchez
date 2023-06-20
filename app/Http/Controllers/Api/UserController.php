<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Validator;
class UserController extends Controller
{
    private $user;
    private $validator;

    //Constructor para llamado de instancias
    public function __construct(User $user, Validator $validator){
        $this->user = $user;
        $this->validator = $validator;
    }

     /** 
     * Funcion para registrar usuario mediante llamado de api,
     * Se ejecuta validacion previa 
     * @param desde Request
     * @param  string  $name,
     * @param  string  $email,
     * @param  string  $password,
     * @param  int     $edad(solo para consulta de prueba tecnica),
     * @return \Illuminate\Http\Response 
     */ 
    
    public function register(Request $request) 
    { 
        $validator = $this->validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required', 
            'edad'=>'required|integer'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'edad' => $request->edad,
            'password' => Hash::make($request->password),
        ]);
       
        $success['id'] =  $user->id;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['edad'] =  $user->edad;
        return response()->json(['success'=>$success], 200); 
    }

    /** 
     * Funcion para consultar un usuario mediante llamado de api,
     * Se ejecuta validacion previa 
     * @param desde Request
     * @param  int     $id,
     * @return \Illuminate\Http\Response 
     */ 
    public function getUser($id) 
    { 
        $user = $this->user->find($id);

        if(!$user){
            return response()->json(['error'=>'No existe usuario'], 401);   
        }
        $success['user'] =  $user;
        return response()->json(['success'=>$success], 200); 
    } 

     /** 
     * Funcion para actualizar usuario mediante llamado de api,
     * Se ejecuta validacion previa 
     * @param desde Request
     * @param  int     $id,
     * @param  string  $name,
     * @param  string  $email,
     * @param  string  $password,
     * @param  int     $edad(solo para consulta de prueba tecnica),
     * @return \Illuminate\Http\Response 
     */ 
    
    public function updateUser(Request $request) 
    { 
        $validator = $this->validator::make($request->all(), [ 
            'id' => 'required|integer|exists:users', 
            'name' => 'string', 
            'email' => 'mail|unique:users',  
            'edad'=>'required|integer'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $user = $this->user->find($request->id);
        $user->update([
            'name' => $request->name ? $request->name :$user->name,
            'email' => $request->email  ? $request->email :$user->email,
            'edad' => $request->edad  ? $request->edad :$user->edad,
            'password' => $request->password  ? Hash::make($request->password) :$user->password,
        ]);
       
        $success['user'] =  $user;

        return response()->json(['success'=>$success], 200); 
    }

  /** 
     * Funcion para eliminar usuario mediante llamado de api,
     * Se ejecuta validacion previa 
     * @param desde Request
     * @param  int     $id,
     * @return \Illuminate\Http\Response 
     */ 
    public function deleteUser($id) 
    { 
        $user = $this->user->find($id);
       
        if(!$user){
            return response()->json(['error'=>'No existe usuario'], 401);   
        }

        if( $user->delete()){
             $success =  'Usuario eliminado exitosamente';
        }
       
        return response()->json(['success'=>$success], 200); 
    } 




    
}
