<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empleado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User :: all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        
        $data->validate([
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

            $url=$data->url;
            $data->nombre=strtoupper($data->nombre);
            $data->apellido=strtoupper($data->apellido);
            $empleado = new Empleado();
            $empleado->nombre=$data->nombre;
            $empleado->apellido=$data->apellido;
            $empleado->save();

            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = Hash::make($data->password);
            $user->save();  
            $user->empleado()->save($empleado);
            
            return  redirect('usuarios');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


    public function edit(User $usuario){
        
        return view('usuarios.edit')->with('usuario',$usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $usuario)
    {
        
        $usuario->name = request()->name;
        $usuario->email = request()->email;
        $usuario->password = Hash::make(request()->password);
        
        $usuario->save();
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect('usuarios');
    }

   
}
