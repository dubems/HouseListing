<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 2/21/16
 * Time: 2:41 PM
 */

namespace projectflyer\Repository;

use projectflyer\Repository\ICrudRepository;
use projectflyer\Flyer;
use projectflyer\User;


class FlyerRepository implements ICrudRepository
{

    /**
     * @var Flyer
     */
    private $flyer;

    public function __construct(Flyer $flyer){

        $this->flyer = $flyer;
    }

    public function create($data = [])
    {
      $flyer =  $this->flyer->create($data);
        return $flyer;
    }

    public function getFlyerByName($name){
        return $this->flyer->where(['name'=>$name])->first();

    }

    public function getAllFlyers(User $user){

        return Flyer::where('user_id',$user->id)
            ->get();

    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function update($id)
    {
        $flyer = Flyer::where('id',$id)->first();

    }

    public function delete($id)
    {
        $this->flyer = Flyer::where('id',$id)->first();
        $this->flyer->delete();
    }

    public function all($limit = 20)
    {
        // TODO: Implement all() method.
    }
}