<?php
namespace projectflyer\Http\Controllers\Traits;


use projectflyer\Flyer;
use Illuminate\Http\Request;



trait AuthorizesUsers {


    public function userCreatedFlyer(Request $request){
        return Flyer::where([
            'zip'=> $request->zip,
            'city'=> $request->city,
            'user_id'=> $this->user->id
        ])->exists();
    }

    public function unauthorized(Request $request){
        if($request->ajax()){
            abort(403,'You want to add a photo, okay!.But are you the owner?');
        }
        \Session::flash('message','are you the owner?');
        return redirect('/');
    }



}