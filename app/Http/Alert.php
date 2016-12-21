<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 1/31/16
 * Time: 5:15 AM
 */

namespace projectflyer\Http;



  class Alert
 {
     public function create_flash($title,$message,$type){
         return session()->flash('flash_message',[
             "title" => $title,
             "text" => $message,
             "type" => $type
         ]) ;
     }

      public function info($title,$message){
          return $this->create_flash($title,$message,$type = 'info');
      }

      public function success($title,$message){
          return $this->create_flash($title,$message,$type = 'success');
      }
      public function warning($title,$message){
          return $this->create_flash($title,$message,$type = 'warning');
      }
      public function overlay($title,$message){
          return $this->create_flash($title,$message,$type = 'info');
      }

 }



