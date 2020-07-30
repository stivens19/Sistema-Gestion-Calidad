<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $fillable=[
        'name',
        'description',
    ];
    public function users()
   {
       return $this->belongsToMany(User::class);
   }
   public function documents()
   {
       return $this->hasMany(Document::class);
   }
   public function procedures()
   { 
       return $this->hasMany(Procedure::class);
   }
}
