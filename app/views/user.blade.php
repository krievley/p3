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
                <form action="/user" method="post">
                    <p>Users: <input class="paragraph" type="number" min="1" max="99" value="4" name="userNum" /> (Max: 99)</p>
                    <p>
                        Include...<br />
                        <input class="checkbox" type="checkbox" name="birthday" /><label for="birthday">Birthday</label><br />
                        <input class="checkbox" type="checkbox" name="profile" /><label for="profile">Profile</label>
                    </p>
                    <button type="submit" class="button" name="RUsubmit">Generate</button>
                </form>
            </div>
            <div class="col4">
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