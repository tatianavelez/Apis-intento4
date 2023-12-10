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


} 



