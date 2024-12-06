<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Data;

class DataController extends Controller
{
    public function get(): JsonResponse
    {
        $data = Data::all();
        return response()->json($data);
    }
}
