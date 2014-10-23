@extends('master')

@section('picture')
    <div class="col1">
        <img id="cloud" src="{{ asset('images/cloud.png') }}" alt="Cloud" />
    </div>
@stop

@section('col')
    <div class="col2">
@stop

@section('h1')
    <h3>Random User Generator</h3>
@stop

@section('bar')
    <div class="bar higher"></div>
@stop
 
@section('content')
    <div id="main">
        <div class="container">
            <h2>How many users do you want?</h2>
            <div class="col4">
                {{ Form::open(array('url' => '/user', 'method' => 'POST'));}}
                    {{-- Users to generate field. ------------------------}}
                    {{ Form::label('userNum', 'Users:'); }}
                    {{ Form::number('number', '4'); }}
                    {{ Form::label('userNum', '(Max: 99)'); }}
                    <div class="errors">
                        @foreach($errors->all() as $message)
                            {{ $message }}
                        @endforeach
                    </div>
                    <p>
                        Include...<br />
                        {{-- Checkbox to include birthday. ----------------}}
                        {{ Form::checkbox('birthday'); }}
                        {{ Form::label('birthday', 'Birthday'); }}
                        <br />
                        {{-- Checkbox to include profile. -----------------}}
                        {{ Form::checkbox('profile'); }}
                        {{ Form::label('profile', 'Profile'); }}
                    </p>
                     {{-- Form submit button. -----------------------------}}
                    {{ Form::submit('Generate', array('class' => 'RUsubmit')); }}
                {{ Form::close(); }}
            </div>
            <div class="col4">
                {{-- For each loop to display generated users. ------------}}
		@foreach ($userData as $users)
                    <p>
			@foreach ($users as $items)
                            {{ $items }}<br>
			@endforeach
                    </p>
		@endforeach
            </div>
        </div>
    </div>
@stop