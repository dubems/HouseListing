<?php

namespace projectflyer\Http\Controllers;

use projectflyer\Repository\FlyerRepository;
use Illuminate\Http\Request;
use projectflyer\Http\Requests\AddPhotoRequest;
use projectflyer\Photo;
use projectflyer\Http\Requests\FlyerRequest;
use projectflyer\Flyer;
use projectflyer\Http\Alert;
use projectflyer\User;



class flyersController extends Controller
{


    /**
     * @var Flyer
     */
    protected $flyer;
    /**
     * @var FlyerRepository
     */
    private $flyerRepository;

    /**55
     * Display a listing of the resource.
     *
     * @param Flyer $flyer
     * @param FlyerRepository $flyerRepository
     */

    public function __construct(Flyer $flyer ,FlyerRepository $flyerRepository){
        $this->middleware('auth',['except'=>['show','getAllUsers']]);
        $this->flyer = $flyer;
        parent::__construct();
        $this->flyerRepository = $flyerRepository;
    }


    public function home(){
        return view('/home');
    }
    public function index(Request $request)
    {
         $allFlyers = $this->flyerRepository->getAllFlyers($request->user());

         return view('flyers.index')->with('allFlyers',$allFlyers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('flyers.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FlyerRequest|Request $request
     * @param Alert $alert
     * @param $city
     * @param $zip
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request,Alert $alert)
    {
        $request->user()->flyers()->create($request->all());

        $alert->success('Flyer creation','Your flyer has been created sucessfully');
          return redirect()->Route('show',[$request->name]);
    }

    /**
     * Display the specified resource.
     *
     * @param $zip
     * @param $city
     * @return \Illuminate\Http\Response

     */
    public function show($name)
    {
        $flyer  = $this->flyerRepository->getFlyerByName($name);

        if($flyer == null){
            abort(404);
        }

        return view('flyers.show')->with('flyer',$flyer);
    }



    public function addPhoto( $name,AddPhotoRequest $request )
    {

        $photo = Photo::FromFile($request->file('file'))->saveToDir();
        Flyer::locatedAt($name)->addPhoto($photo);
    }


    public function getAllUsers(){

        return response()->json(User::all());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $token = $request->get('token');

        $api = '';

        $url = '';

        $guzzle = null;

        $response = $guzzle->post($url,['token'=> $token,'api'=> $api]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->flyerRepository->delete($id);
        return redirect('/');
    }
}
