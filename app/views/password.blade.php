@extends('master')

@section('picture')
    <div class="col1">
        <img id="wrench" src="{{ asset('images/wrench.png') }}" alt="Wrench" />
    </div>
@stop

@section('col')
    <div class="col2">
@stop

@section('h1')
    <h3>XKCD Password Generator</h3>
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
                {{ Form::open(array('url' => '/password', 'method' => 'POST')); }}                
                    <h2>Password Specifications</h2>
                <div class="col4 bordered">
                    {{-- Words to generate field. ----------------------------}}
                    {{ Form::label('words', 'Number of words:'); }}
                    {{ Form::number('words', '4'); }}
                    {{ Form::label('words', '(Max: 9)'); }}
                    <br>
                    {{-- Add a number checkbox. ------------------------------}}
                    {{ Form::checkbox('num'); }}
                    {{ Form::label('num', 'Add a Number'); }}
                    <br>
                    {{-- Add a symbol checkbox. ------------------------------}}
                    {{ Form::checkbox('symbol'); }}
                    {{ Form::label('symbol', 'Add a Symbol'); }}
                    <br>
                    <div id="symNum">
                        {{-- Number of symbols to add field ------------------}}
                        {{ Form::label('symbolNum', 'Number of symbols:'); }}
                        {{ Form::number('symbols', '1'); }}
                        {{ Form::label('symbolNum', '(Max: 3)'); }}
                        <br />
                    </div>
                    <div class="errors">
                        @foreach($errors->all() as $message)
                            {{ $message }}
                        @endforeach
                    </div>
                </div>    
                <h2>Display Options</h2>
                <div class="col6 bordered">
                    <h5>Separate Words By:</h5>
                    <div class="input para">
                        {{-- Letter separation choices. ----------------------}}
                        {{ Form::radio('separation', 'spaces', true); }}
                        {{ Form::label('spaces', 'Spaces'); }}
                        <br />
                        {{ Form::radio('separation', 'camelCase'); }}
                        {{ Form::label('camelCase', 'Camel Case'); }}
                        <br />
                        {{ Form::radio('separation', 'hyphens'); }}
                        {{ Form::label('hyphens', 'Hyphens'); }}
                    </div>
                </div>
                <div class="col6 bordered">
                    <h5>Letters Should Appear:</h5>
                    <div class="input para">
                        {{-- Letter capitalization choices. ------------------}}
                        {{ Form::radio('letter', 'lower', true); }}
                        {{ Form::label('lower', 'Lower Case'); }}
                        <br />
                        {{ Form::radio('letter', 'upper'); }}
                        {{ Form::label('lower', 'Upper Case'); }}
                        <br />
                        {{ Form::radio('letter', 'capital'); }}
                        {{ Form::label('capital', 'Capitalize 1st Letter'); }}
                    </div>
                </div>
                <div class="col1">
                    {{-- Form submit button. ---------------------------------}}
                    {{ Form::submit('Generate', array('class' => 'XKCDsubmit')); }}
                </div>
                {{ Form::close(); }}
            </div>
    </div>
@stop