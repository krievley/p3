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

//Display home page.
Route::get('/', function()
{
        return View::make('index');
});

//Display lorem ipsum page with no lorem ipsum text.
Route::get('/loremipsum{paragraphData?}', function($paragraphData = '' )
{
        return View::make('loremipsum')->with('paragraphData', $paragraphData);
});

//Process loremipsum form.
Route::post('/loremipsum', function()
{
        //Array to hold validation rules.
        $rules = array('number' => 'numeric|integer|max:99|min:1');
        //Array of error messages
        $messages = array(
        'min' => 'Please enter a number greater than 0.',
        'max' => 'Please enter a number less than 100.',
        'numeric' => 'Please enter a number between 1 and 99.',
        'integer' => 'Please enter a whole number between 1 and 99.',    
        );
        
        // Create a new validator instance.
        $validator = Validator::make(Input::all(), $rules, $messages);
        //Validate the user's input.
        if($validator->passes()) {
            $postData = Input::get('number');
            //Create new lorem ipsum object.
            $generator = new LoremIpsum();
            //Generate array of paragraphs.
            $paragraphs = $generator->getParagraphs($postData);
            //Format paragraphs for view.
            $paragraphData = implode('<p>', $paragraphs);
            //Return data to view.
            return View::make('loremipsum')->with('paragraphData', $paragraphData);
        }
        //If input is not validated.
        // get the error messages from the validator
        $messages = $validator->messages();
        return Redirect::to('/loremipsum')->withErrors($validator);
});

//Display user page with no users.
Route::get('/user{userData?}', function($userData = array())
{
	return View::make('user')->with('userData', $userData);
});

//Process user generator form
Route::post('/user', function ()
{
        //Array to hold validation rules.
        $rules = array('number' => 'numeric|integer|max:99|min:1');
        $messages = array(
        'min' => 'Please enter a number greater than 0.',
        'max' => 'Please enter a number less than 100.',
        'numeric' => 'Please enter a number between 1 and 99.',
        'integer' => 'Please enter a whole number between 1 and 99.',    
        );
        
        // Create a new validator instance.
        $validator = Validator::make(Input::all(), $rules, $messages);
        //Validate the user's input.
        if($validator->passes()) {
            //Array to hold users
            $users = array();
            //Get user entered data
            $postData = Input::get('number');
        
        //For loop to create users
	for($row=0; $row<$postData; $row++) {
                //Object of faker class.
		$faker = Faker::create();
		
                //Add generated names to array.
		$users[$row][0] = $faker->name;
                
                //Add generated birthday if user selected.
		if (isset($_POST['birthday'])){
			$users[$row][1] = $faker->date($format = 'Y-m-d', $max = '2000-12-30');
		}
                //Add generated profile if user selected.
		if (isset($_POST['profile'])) {
			$users[$row][2] = $faker->text;
		}
	}
            //Return view with users.
            return View::make('user')->with('userData', $users);
        }
        //If input is not validated.
        // get the error messages from the validator
        $messages = $validator->messages();
        return Redirect::to('/user')->withErrors($validator);    
});

//Display page with no password.
Route::get('/password{result?}', function($result = '')
{
	return View::make('password')->with('result', $result);
});

//Process password form
Route::post('/password', function()
{
        //Array to hold validation rules.
        $rules = array('words' => 'numeric|integer|max:9|min:1',
                        'symbols' => 'numeric|integer|max:3|min:1');
        $messages = array(
        'min' => 'Please enter a number greater than 0.',
        'words.max' => 'Please enter a number less than 10.',
        'words.numeric' => 'Please enter a number between 1 and 9.',
        'words.integer' => 'Please enter a whole number between 1 and 9.',
        'symbols.max' => 'Please enter a number less than 4.',
        'symbols.numeric' => 'Please enter a number between 1 and 3.',
        'symbols.integer' => 'Please enter a whole number between 1 and 3.',    
        );
        
        // Create a new validator instance.
        $validator = Validator::make(Input::all(), $rules, $messages);
        //Validate the user's input.
        if($validator->passes()) {
        
            //declaration of variables pulled from form
            $words = Input::get('words');
            $num = Input::get('num');
            $symbol = Input::get('symbol');
            $symNum = Input::get('symbols');
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
    }
    //If input is not validated.
    // get the error messages from the validator
    $messages = $validator->messages();
    return Redirect::to('/password')->withErrors($validator); 
});