<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
   protected $table = 'membership';
   protected $primaryKey = 'id'; 
   use SoftDeletes;
}
