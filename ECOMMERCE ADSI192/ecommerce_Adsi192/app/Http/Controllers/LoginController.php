<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class LoginController extends Controller
{
    //Retornamos a la vista del login
    public function getLogin(){
        return view('connect.login');
    }

    //Retornamos a la vista para registrar a un usuario
    public function getRegister(){
        return view('connect.register');
    }


    public function postRegister(Request $request){

        //Uso de validaciones con laravel
        //Se pone primero el nombre del campo y luego las validaciones
        $rules =[
            'name1' => 'required',
            'lastname1' => 'required',
            'email' => 'required|email|unique:App\Models\PersonaContacto,valor',
            'password' => 'required|min:8'
        ];

        //Mensajes personalizados
        $messages =[
            'name.required' => 'El nombre es requerido.',
            'lastname.required' => 'El apellido es requerido.',
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'El correo electrónico no cumple con el formato.',
            'email.unique' => 'El correo electrónico ya está asociado a otra cuenta.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Error al hacer login')
            ->with('typealert', 'danger');
        else:

        endif;

    }

    public function getRecover(){
        return view('connect.recover');
    }
}
