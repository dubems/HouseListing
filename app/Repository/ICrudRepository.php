<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 2/21/16
 * Time: 4:02 PM
 */

namespace projectflyer\Repository;


interface ICrudRepository
{
  public function create($data = []);

    public function read($id);

    public function update($id);

    public function delete($id);


}