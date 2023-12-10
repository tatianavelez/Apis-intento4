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




} 



