@extends('master')

@section('picture')
    <div class="col1">
        <img id="robot" src="{{ asset('images/robot.png') }}" alt="Robot" />
    </div>
@stop

@section('col')
    <div class="col2">
@stop

@section('h1')
    <h3>Lorem Ipsum Generator</h3>
@stop

@section('bar')
    <div class="bar higher"></div>
@stop
 
@section('content')
    <div id="main">
        <div class="container">
            <h2>How many paragraphs do you want?</h2>
            <div class="col4">
                {{ Form::open(array('url' => '/loremipsum', 'method' => 'POST')); }}
                    {{-- Paragraphs of lorem ipsum to generate field. ----}}
                    {{ Form::label('paragraph', 'Paragraphs:'); }}
                    {{ Form::number('number', '4'); }}
                    {{ Form::label('paragraph', '(Max: 99)'); }}
                    <div class="errors">
                        @foreach($errors->all() as $message)
                            {{ $message }}
                        @endforeach
                    </div>
                    <br><br>
                    {{-- Form submit button. -----------------------------}}
                    {{ Form::submit('Generate', array('class' => 'LIsubmit')); }}
                {{ Form::close(); }}
            </div>
            <div class="col4">
                {{-- Dislay Lorem Ipsum field. ---------------------------}}
               <p>{{ $paragraphData }}</p>
            </div>
        </div>
    </div>
@stop