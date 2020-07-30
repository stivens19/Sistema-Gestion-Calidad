<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typedocument extends Model
{
    protected $fillable=[
        'name',
        'description',
    ];
}
