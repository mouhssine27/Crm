<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $guarded =[];


    public function employeurs(){
        return $this->hasMany(Employeur::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
