<?php

namespace kelurahan;

use Illuminate\Database\Eloquent\Model;

class KelurahanDetail extends Model
{
    //

    public function kelurahan(){
        return $this->belongsTo('App\Kelurahan', 'kelurahan_id');
    }
}
