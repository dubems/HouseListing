<?php

namespace projectflyer;

use Illuminate\Database\Eloquent\Model;
use projectflyer\Photo;


// $flyer->photo
class Flyer extends Model

{


    /**
     *
     */

    protected $guarded = [''];

  public function photos(){
      return $this->hasMany('projectflyer\Photo');
  }

    public function user(){
        return $this->belongsTo('projectflyer\User');
    }
public static function locatedAt($name){

    $flyer= Flyer::where(['name'=>$name])->firstOrFail();
    return $flyer;
}

    /**
     * @param \projectflyer\Photo $photo
     * @return Model
     */
    public function addPhoto(Photo $photo){
//
        return $this->photos()->save($photo);

    }

    public function ownedBy(User $user){
        return $this->user_id == $user->id;
    }
}
