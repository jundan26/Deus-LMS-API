<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Models\Materials;
use App\Models\User;
use App\Models\Videos;
use App\Models\Quiz;
use App\Models\QuizOption;
use App\Models\Note;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');

$router->post('/materials', 'MaterialsController@store');
$router->get('/materials', 'MaterialsController@index');
$router->get('/materials/{id}','MaterialsController@show');
$router->put('/materials/{id}', 'MaterialsController@update');
$router->delete('/materials/{id}', "MaterialsController@destroy");
$router->post('/materials/{id}/register', 'MaterialsController@register');
$router->get('/my-materials','MaterialsController@myMaterials');

$router->post('/materials/{id}/video', 'MaterialsController@uploadVideo');
$router->get('/materials/{id}/video', 'MaterialsController@getVideo');
$router->put('/materials/{id}/video', 'MaterialsController@updateVideo');
$router->delete('/materials/{id}/video', 'MaterialsController@deleteVideo');

$router->post('/materials/{id}/quiz', 'MaterialsController@createQuiz');
$router->get('/materials/{id}/quiz', 'MaterialsController@getQuiz'); 
$router->put('/materials/{id}/quiz', 'MaterialsController@updateQuiz'); 
$router->delete('/materials/{id}/quiz', 'MaterialsController@deleteQuiz'); 


$router->post('/my-materials/{id}/note', 'MaterialsController@createNote');
$router->get('/my-materials/{id}/note', 'MaterialsController@getNotes');
$router->put('/my-materials-note/{noteId}', 'MaterialsController@updateNote');
$router->delete('/my-materials-note/{noteId}', 'MaterialsController@deleteNote');
$router->get('/my-materials-note/{noteId}/download/{format}', 'MaterialsController@downloadNote');

$router->post('/feedback', 'MaterialsController@createFeedback');
$router->get('/feedback', 'MaterialsController@getFeedback');

$router->post('/help', 'HelpController@submitHelpForm');
$router->get('/help','HelpController@getHelpForm');

$router->post('/admin/login','AdminController@login');