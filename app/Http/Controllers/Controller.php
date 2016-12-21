<?php

namespace projectflyer\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

/**
 * @property  user
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $user;


    public function __construct(){
        $this->user = \Auth::user();
        view()->share('isSignedIn',Auth::check());
        view()->share('user',$this->user);

    }
}

