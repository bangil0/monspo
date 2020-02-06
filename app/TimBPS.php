<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimBPS extends Model
{
    //
    protected $table = 't_tim';
    protected $primaryKey = 'tim_id';
    public function KodeBPS(){
        return $this->hasOne('App\KodeBPS','bps_kode', 'tim_kodebps');
    }
}
