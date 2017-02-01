<?php

namespace kelurahan;

use Illuminate\Database\Eloquent\Model;

class RukunWarga extends Model
{
    //

    public function kelurahan(){
        return $this->belongsTo('kelurahan\Kelurahan', 'kelurahan_id');
    }
}
