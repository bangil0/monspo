<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KodeBPS extends Model
{
    //
    protected $table = 't_kodebps';
    protected $primaryKey = 'bps_id';
    public function Pegawai(){
        return $this->belongsTo('App\User','kodebps', 'bps_kode');
    }
}
