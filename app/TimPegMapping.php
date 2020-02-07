<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimPegMapping extends Model
{
    //
    protected $table = 't_mapping';
    protected $primaryKey = 'map_id';
    public function Pegawai(){
        return $this->hasOne('App\User','nipbps', 'peg_nipbps');
    }
}
