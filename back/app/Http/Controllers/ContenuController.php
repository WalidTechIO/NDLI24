<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Contenu;

class ContenuController extends Controller
{
    //On a un modem 56k ou en a pas ;)
    public function get($nom, $start): JsonResponse
    {
        $nbcar = 20;

        $contenu = Contenu::where('nom', $nom)->firstOrFail();
        $text = $contenu->content;

        $final = substr($text, $start, $nbcar);

        $nextPart = ($start + $nbcar < strlen($text)) ? $start + $nbcar : null;

        if (strlen($final) < $nbcar) {
            $nextPart = null;
        }

        return response()->json([
            'title' => $contenu->nom,
            'text' => mb_convert_encoding($final, 'UTF-8', 'UTF-8'),
            'nextPart' => $nextPart
        ]);
    }

}
