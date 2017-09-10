<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    protected $table = "class";
    protected $fillable = ['user_id','class'];
}
