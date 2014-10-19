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
	
	/**$generator = new LoremIpsum();
	$paragraphs = $generator->getParagraphs(5);
	echo implode('<p>', $paragraphs);*/

	/**$faker = Faker::create();
	echo $faker->name . '<br>';
	echo $faker->address . '<br>';
	echo $faker->text . '<br>';*/
});
