<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Hash;

class ComidaController extends Controller
{

    public function ingre()
    {
        $ingredients = Ingredient::all();

        return response()->json($ingredients, 200);
    }



    public function crear(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ingredients',
            'type' => 'required',
        ]);

        $ingredient = Ingredient::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return response()->json($ingredient, 201);
    }


//ACTUALIZAR INGREDISTES

    public function actualiz(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:ingredients,name,' . $id,
            'type' => 'required',
        ]);

        $ingredient->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return response()->json($ingredient, 200);
    }



    //ELIMINAR INGRE
    public function elimi($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return response()->json(['message' => 'Ingrediente eliminado'], 200);
    }


} 



