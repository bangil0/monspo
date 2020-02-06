<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarOpd extends Model
{
    //
    protected $table = 't_opd';
    protected $primaryKey = 'opd_id';
    public function KodeBPS(){
        return $this->hasOne('App\KodeBPS','bps_kode', 'opd_kodebps');
    }
}
