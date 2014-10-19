<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
	
	

	/**$faker = Faker::create();
	echo $faker->name . '<br>';
	echo $faker->address . '<br>';
	echo $faker->text . '<br>';*/
});

Route::get('/loremipsum', function()
{
	return View::make('loremipsum');
});

Route::post('/loremipsum', function()
{
	/**$postData = Input::all();
	$generator = new LoremIpsum();
	$paragraphs = $generator->getParagraphs($postData["paraNum"]);
	$paragraphData = implode('<p>', $paragraphs);

	var_dump($paragraphData);*/
});

Route::get('/user', function()
{
	return View::make('user');
});

Route::get('/password', function()
{
	return View::make('password');
});