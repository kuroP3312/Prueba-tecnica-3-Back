<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request){
        try {
            $request['password'] = Hash::make($request->password);
            $user = User::create($request->all());
            return response()->json(['status' => 'success', 'message' => 'Usuario creado con exito !']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'fail', 'message' => 'Usuario no creado', 'error' => $th]);
        }
    }

    public function update(Request $request){
        try {
            $user = User::find($request->id)->update($request->all());
            return response()->json(['status' => 'success', 'message' => 'Usuario actualizado con exito !']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'fail', 'message' => 'algo salio mal', 'error' => $th]);
        }
    }

    public function delete(Request $request){
        return response()->json(['status' => 'fail', 'message' => 'La contraseña es incorrecta']);
    }

    public function getAll(Request $request){
        try {
            $users = User::select('id','name','email')->lazy();
            return response()->json(['status' => 'success', 'message' => 'La consulta fue exitosa!','response' => $users]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Algo fue mal! ','response' => $th]);
        }
    }

    public function getOne(Request $request){
        try {
            $users = User::select('id','name','email')->where('id',$request->id)->lazy();
            return response()->json(['status' => 'success', 'message' => 'La consulta fue exitosa!','response' => $users]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Algo fue mal! ','response' => $th]);
        }
    }

    public function changePassword(Request $request){
        if (Hash::check($request->password, $user->password)) {
            $newPass = Hash::make($request->newPassword);
            $verify = UsersPlatform::where('correo', $request->user)->update(['password' => $newPass]);
            return response()->json(['status' => 'success', 'user' => $user]);
        }
    }
}
