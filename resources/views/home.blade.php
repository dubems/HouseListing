@extends('layout')

@section('content')


    <div class="jumbotron">
        <h1>Sell a House</h1>
        <p>Register with us and get to sell your house online.</p>
        @if($isSignedIn)
        <a  href="/flyers/create" class="btn btn-primary">Create Flyer</a>
        @else
            <a  href="/auth/register" class="btn btn-primary">Sign Up</a>
            @endif
    </div>




@stop