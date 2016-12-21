@extends('layout')

@section('content')

@stop



<div class="container">
    @foreach($allFlyers as $flyer)
        <a href="{{route('show',[$flyer->name])}}">{{$flyer->name}}</a>
        <br>
        {{$flyer->street}}
        <br>
        {{$flyer->state}}
        <br>
    @endforeach
</div>
