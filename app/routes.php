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
});

Route::get('/loremipsum{paragraphData?}', function($paragraphData = '' )
{
	return View::make('loremipsum')->with('paragraphData', $paragraphData);
});

Route::post('/loremipsum', function()
{
	$postData = Input::get('paraNum');
	$generator = new LoremIpsum();
	$paragraphs = $generator->getParagraphs($postData);
	$paragraphData = implode('<p>', $paragraphs);

	return View::make('loremipsum')->with('paragraphData', $paragraphData);
});

Route::get('/user{userData?}', function($userData = array())
{
	return View::make('user')->with('userData', $userData);
});

Route::post('/user', function ()
{
	$users = array();
	$postData = Input::get('userNum');

	for($row=0; $row<$postData; $row++) {
		$faker = Faker::create();
		
		$users[$row][0] = $faker->name;

		if (isset($_POST['birthday'])){
			$users[$row][1] = $faker->date($format = 'Y-m-d', $max = '2000-12-30');
		}
		if (isset($_POST['profile'])) {
			$users[$row][2] = $faker->text;
		}
	}

	return View::make('user')->with('userData', $users);
});

Route::get('/password{result?}', function($result = '')
{
	return View::make('password')->with('result', $result);
});

Route::post('/password', function()
{
	//declaration of variables pulled from form
	$words = Input::get('words');
	$num = Input::get('num');
	$symbol = Input::get('symbol');
	$symNum = Input::get('symNum');
	$separation = Input::get('separation');
	$letter = Input::get('letter');
	
	//Scrape word list from paulnoll.com
	$data = file_get_contents('http://www.paulnoll.com/Books/Clear-English/words-03-04-hundred.html');
	$regex = '/<li>([^`]*?)<\/li>/';
	preg_match_all($regex,$data,$matches);

	//array to hold selected words
	$wordList = array();

	//Loop for number of words entered.
	for($x=0; $x<$words; $x++) {
		//Get a random number
		$random = rand(0, 159);
		//Check to see if array is empty
		if(sizeof($wordList) == 0) {
			$wordList[$x] = $matches[1][$random];
		} else {
			//check to see if the word has already been selected before adding it to the array.
			foreach($wordList as $key){
				//if the word has been used
				if($matches[1][$random] == $key){
					//reduce the word count to try again
					$x--;
				} else {
					//add the word to the word list
					$wordList[$x] = $matches[1][$random];
				}
			}
		}
	}


	//Format if user selected "delimited by spaces"
	if($separation == "spaces"){
		$wordString = implode(" ", $wordList);
	}
	//Format if user selected "delimited by camelCase"
	elseif($separation == "camelCase"){
		$wordImplode = implode("", $wordList);
		$wordCapital = ucwords($wordImplode);
		$wordString = preg_replace('/\s+/', '', $wordCapital);
	}
	//Format if user selected "delimited by hyphens"
	elseif($separation == "hyphens"){
		$wordString = implode("-", $wordList);
	}


	//Format if user selected "lowercase"
	if($letter == "lower") {
		$wordString = strtolower($wordString);
	}
	//Format if user selected "uppercase"
	elseif($letter == "upper") {
		$wordString = strtoupper($wordString);
	}
	//Format if user selected "capital"
	elseif($letter == "capital") {
		$wordString = ucwords($wordString);
	}


	//Format if user selected a number
	if (isset($num)) {
		$wordString = trim($wordString) . rand(0, 9);
	}
	//Format if user selected a symbol
	if (isset($symbol)) {
		for($i=0; $i<$symNum; $i++) {
			$symbolList = "!@#$%^&*";
			$rand = rand(0, 7);
			$randomSymb = $symbolList[$rand];
			$wordString = trim($wordString) . $randomSymb;
		}
	}

	return View::make('password')->with('result', $wordString);

});