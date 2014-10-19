@extends('master')

@section('picture')
    <img id="toolbox" src="{{ asset('images/itToolbox.png')}}" alt="IT Toolbox" />
@stop

@section('h1')
    <h1>Developer Tools</h1>
@stop

@section('content')
    <div id="main">
        <div class="container">
            <div class="col2">
                <h2>Lorem Ipsum Generator</h2>
                <p>
                    This tool generates lorem ipsum text in the number of paragraphs specified by the user.
                    Lorem ipsum is filler text used to represent content on a page. It is used to show where
                    content will go without using content that might distract a client.
                </p>
            </div>
            <div class="col1">
                <img id="robot" src="{{ asset('images/robot.jpg') }}" alt="Robot" />
            </div>
        </div>
    </div>
    <div id="secondary">
        <div class="container">
            <div class="col1">
                <img id="cloud" src="{{ asset('images/cloud.png') }}" alt="Cloud" />
            </div>
            <div class="col2">
                <h2>Random User Generator</h2>
                <p>
                    This tool generates random user information. This is helpful for developers
                    who need dummy user information to test their applications.
                </p>
            </div>
        </div>
    </div>
    <div id="final">
        <div class="container">
            <div class="col2">
                <h2>XKCD Password Generator</h2>
                <p>
                    This tool generates four random words with the option to add a symbol and number.
                    This password idea is based on the assumption that four words are easy to remember 
                    but hard to guess.
                </p>
            </div>
            <div class="col1">
                <img id="wrench" src="{{ asset('images/wrench.jpg') }}" alt="Wrench" />
            </div>
        </div>
    </div>
@stop