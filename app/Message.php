<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function saveMessage($name, $description,$phone){
    $this->name = $name;
    $this->description = $description;
    $this->phone = $phone;
    if($this->save()) return true;
    else return false;
    }
}
