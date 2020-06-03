<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'data_nasc', 'telephone', 'congregation'];
}
