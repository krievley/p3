@extends('master')

@section('picture')
    <div class="col1">
        <img id="robot" src="{{ asset('images/robot.png') }}" alt="Robot" />
    </div>
@stop

@section('h1')
    <div class="col2">
        <h3>Lorem Ipsum Generator</h3>
        <h4><a href="/" target="_blank">Home</a> | <a href="/loremipsum" target="_blank">Lorem Ipsum</a> | <a href="/user" target="_blank">Random User</a> | <a href="password" target="_blank">XKCD Password</a></h4>
    </div>
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
                
            </div>
        </div>
    </div>
@stop