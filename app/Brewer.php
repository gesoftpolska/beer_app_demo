<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewer extends Model
{


    public function beers(){
        return $this->hasMany(Beer::class, 'id_brewer');
    }

}
