<?php

namespace App\app\Http\Models;

use App\config\Model;

class User extends Model
{

    // make the foll two not enforced
   public $table ="users";

   public $fillable = [''] ;


}
