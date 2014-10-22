@extends('master')

@section('picture')
    <div class="col1">
        <img id="wrench" src="{{ asset('images/wrench.png') }}" alt="Wrench" />
    </div>
@stop

@section('h1')
    <div class="col2">
        <h3>XKCD Password Generator</h3>
        <h4><a href="/" target="_blank">Home</a> | <a href="/loremipsum" target="_blank">Lorem Ipsum</a> | <a href="/user" target="_blank">Random User</a> | <a href="password" target="_blank">XKCD Password</a></h4>
    </div>
@stop

@section('links')
    <script src="Scripts/jquery-2.1.1.js"></script>
    <script src="Scripts/default.js"></script>
@stop

@section('bar')
    <div class="bar higher"></div>
@stop
 
@section('content')
    <div id="main">
        <div class="container">
				<h6>{{ $result }}</h6>
                <form action="/password" method="post">
                    <h2>Password Specifications</h2>
                <div class="col4 bordered">
                    <div class="para">Number of words: <input class="paragraph" name="words" type="number" min="1" max="9" required="required" value="4" /> (Max 9)</div>
                    <div class="para"><input class="checkbox" name="num" type="checkbox" /> Add a Number</div>
                    <div class="para"><input class="checkbox" name="symbol" id="sym" type="checkbox" /> Add a Symbol</div>
                    <div class="para" id="symNum">Number of symbols: <input class="paragraph" name="symNum" type="number" min="1" max="3" /> (Max 3)</div>
                    <br />
                </div>
                <h2>Display Options</h2>
                <div class="col6 bordered">
                    <h5>Separate Words By:</h5>
                    <div class="input para">
                        <input class="radio" type="radio" id="spaces" name="separation" value="spaces" checked="checked" />
                        <label for="spaces">Spaces</label>
                        <br />
                        <input class="radio" type="radio" id="camelCase" name="separation" value="camelCase" />
                        <label for="camelCase">Camel Case</label>
                        <br />
                        <input class="radio" type="radio" id="hyphens" name="separation" value="hyphens" />
                        <label for="hyphens">Hyphens</label>
                    </div>
                </div>
                <div class="col6 bordered">
                    <h5>Letters Should Appear:</h5>
                    <div class="input para">
                        <input class="radio" type="radio" id="lower" name="letter" value="lower" checked="checked" />
                        <label for="lower">Lower Case</label>
                        <br />
                        <input class="radio" type="radio" id="upper" name="letter" value="upper" />
                        <label for="upper">Upper Case</label>
                        <br />
                        <input class="radio" type="radio" id="capital" name="letter" value="capital" />
                        <label for="capital">Capitalize 1st Letter</label>
                    </div>
                </div>
                <div class="col1">
                    <button type="submit" class="button" name="XKCDsubmit">Generate</button>
                </div>
                </form>
            </div>
    </div>
@stop