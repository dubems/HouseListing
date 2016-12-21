@extends('layout')

@section('content')

    <h1>Selling your home</h1>
    <hr/>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
            @if($errors->any())
            <div class="alert alert-danger">

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                            @endforeach
                    </ul>
            </div>
                    @endif



    </div>
        </div>
    </div>



    @stop