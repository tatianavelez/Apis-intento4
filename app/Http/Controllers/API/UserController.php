<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


//LOGIN
public function login(Request $request)
{
    // Validar
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Las credenciales proporcionadas son incorrectas.'],
        ]);
    }

    $user->tokens()->delete();

    $token = $user->createToken('authToken-' . $user->id)->plainTextToken;

    return response()->json(['message' => 'Inicio de sesión exitoso', 'token' => $token, 'user' => $user]);
}


public function registro(Request $request)
{
    // Validar los datos users 
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        ]);

    // Crear nuevo usuario
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);


    $user->save();

    return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
}











public function traertodos()
{
    
    $users = User::all();
    
    return response()->json(['users' => $users]);
}





//VER PERFIL
public function getProfile(Request $request)
{
    $user = $request->user();
    return response()->json([
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ]);
}


//ACTUALIZAR PERFIL
public function updateProfile(Request $request)
{
$user = $request->user();

$this->validate($request, [
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email,' . $user->id,
    'password' => 'nullable|string|min:6', 
]);

$user->name = $request->input('name');
$user->email = $request->input('email');

if ($request->filled('password')) {
    $user->password = Hash::make($request->input('password'));
}

$user->save();

return response()->json([
    'message' => 'Perfil actualizado con éxito',
    'user' => [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ],
]);
}










} 



