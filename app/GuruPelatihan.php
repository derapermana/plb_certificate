<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruPelatihan extends Model
{
    protected $table = 'guru_pelatihans';
    protected $fillable = ['guru_id', 'pelatihan_id', 'eval_point'];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function pelatihan()
    {
        return $this->belongsTo('App\Pelatihan');
    }
}
