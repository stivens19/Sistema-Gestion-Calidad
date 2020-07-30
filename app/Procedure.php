<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $fillable=[
        'name',
        'description',
        'archivo',
        'proceso_id',
    ];
    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
