<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employeur extends Authenticatable

{
    protected $guarded =[];

    protected $guard = 'employeur';

    public function entreprise(){
        return $this->belongsTo(Entreprise::class);
    }
}
