@extends('layout')

@section('content')

    <div class="row row-dubem">
        <div class="col-md-4 col-md-offset-4">
       @if($errors->any())
           <div class="alert alert-warning">
               @foreach($errors->all() as $error)
                   <ul>
                       <li>
                           {{$error}}
                       </li>
                   </ul>
                   @endforeach
           </div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">
                     <div class="panel-title">Register</div>
                    </div>
                    <div class="panel-body">


                        <form action="/auth/register" method="post">
                            {{csrf_field()}}
                          <div class="form-group input-group">
                             <span class="input-group-addon">
                                 <span class="ti ti-user"></span>
                             </span> <input type="text" placeholder="Username" name="name" class="form-control" required >
                          </div>
                            <div class="form-group input-group">
                             <span class="input-group-addon">
                                 <span class="ti ti-email"></span>
                             </span> <input type="email" placeholder="email" name="email" class="form-control" required >
                            </div>
                            <div class="form-group input-group">
                             <span class="input-group-addon">
                                 <span class="ti ti-key"></span>
                             </span> <input type="password" placeholder="Password" name="password" class="form-control" >
                            </div>
                            <div class="form-group input-group">
                             <span class="input-group-addon">
                                 <span class="ti ti-key"></span>
                             </span> <input type="password" placeholder="Password"  name="password_confirmation" class="form-control" >
                            </div>
                            <div class="form-group">
                                <button  type="submit" class="btn btn-primary">Sign Up</button>
                                </form>
                                <a href="{{route('login')}}" class="btn btn-link ">Sign In</a>
                            </div>

                        </div>

                   </div>
            </div>
        </div>

    @endsection