
@inject('countries','projectflyer\Http\Utilities\Country')

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

                    <form action="/flyers"  method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="street">Flyer Name:</label>
                            <input type="text" name="name" id="name" placeholder="name" class="form-control" value="{{old('name')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="street">Street:</label>
                            <input type="text" name="street" id="street" placeholder="street" class="form-control" value="{{old('street')}}"/>
                        </div>

                        <div class="form-group">
                            <label for="city">city:</label>
                            <input type="text" name="city" id="city" placeholder="city" class="form-control" value="{{old('city')}}"/>
                        </div>

                        <div class="form-group">
                            <label for="zip">zip:</label>
                            <input type="text" name="zip" id="zip" placeholder="zip" class="form-control" value="{{old('zip')}}"/>
                        </div>

                        <div class="form-group">
                            <label for="country">country:</label>
                            <select name="country" id="country" class="form-control">
                                @foreach($countries::all() as $code => $country)
                                    <option value="{{$code}}">{{$country}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" name="state" id="state" placeholder="state" class="form-control" value="{{old('state')}}"/>
                        </div>
                        <hr/>

                        <div class="form-group">
                            <label for="price"> Sale price:</label>
                            <input type="text" name="price" id="price" placeholder="price" class="form-control" value="{{old('price')}}"/>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">description:</label>
        <textarea type="text" name="description" id="description" placeholder="description" class="form-control"
                  rows="10" value="{{old('description')}}">

        </textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Flyer</button>
                            </div>

</div>
                    </form>

        </div>
    </div>


@stop
