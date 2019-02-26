<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use OGetIt\OGetIt;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/bonjour/{name}', function ($name) use ($router) {
    return "Bonjour " . $name;
});


$router->get('/combatreport/{id}', function ($id) {

    $uni = '801';
    $lang = 'en';
    $apikey = env('OGAME_API_KEY', 'xxxxxxxxx');
    $ogetit = new OGetIt($uni, $lang, $apikey);

    //Get Combat report
    $cr = $ogetit->getCombatReport($id);

    return response()->json($cr);

});