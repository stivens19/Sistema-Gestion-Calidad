<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function typedocuments()
    {
        return $this->hasMany(Typedocument::class);
    }
}
