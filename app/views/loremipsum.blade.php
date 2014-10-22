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
                <form action="/loremipsum" method="post">
                    <p>Paragraphs: <input class="paragraph" type="number" min="1" max="99" value="4" name="paraNum" /> (Max: 99)</p>
                    <button type="submit" class="button" name="LIsubmit">Generate</button>
                </form>
            </div>
			<div class="col4">
               <p>{{ $paragraphData }}</p>
            </div>
        </div>
    </div>
@stop