<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Quizz;

class QuizzController extends Controller
{
    public function get($nom): JsonResponse
    {
        $quizz = Quizz::where('nom', $nom)->firstOrFail();
        return response()->json([
            'nom' => $quizz->nom,
            'quizz' => json_decode($quizz->data, true)
        ]);
    }
}