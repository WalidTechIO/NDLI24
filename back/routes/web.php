<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\DataController;
use App\Models\Quizz;

//Pourquoi activer la reecriture d'URL quand on peut recoder un router dans un framework qui en possede un ??
Route::get('/', function () {
    $route = request()->query('route');

    if (preg_match('/^api\/quizz\/(.+)$/', $route, $matches)) {
        $nom = $matches[1];

        return (new QuizzController)->get($nom);
    }

    if (preg_match('/^api\/contenu\/(.+)\/(\d+)$/', $route, $matches)) {
        $nom = $matches[1];
        $part = $matches[2];
        return (new ContenuController)->get($nom, $part);
    }

    if (preg_match('/^api\/data$/', $route, $matches)) {
        return (new DataController)->get();
    }

    if(!$route) {
        return response()->file(public_path('dist/index.html'));
    }

    //Pourquoi renvoyer une 404 quand on peut faire une requete inutile puis envoyer une 404 ?
    return Quizz::findOrFail(-200);
});