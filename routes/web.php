<?php

use App\Models\Survey;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questionnaires', 'QuestionnaireController');

Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');
Route::get('/thankyou', 'SurveyController@finishSurvey');

Route::get('test', function () {

    $survey = Survey::with('responses', 'questionnaire')->find(7);

    dd($survey);

    Mail::to('krunal@appdividend.com')->send(new App\Mail\SendSurveyResponseMail());
    return 'done';
});
