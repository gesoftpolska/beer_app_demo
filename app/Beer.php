<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    public function brewer(){
        return $this->belongsTo(Brewer::class, 'id_brewer');
    }
}
