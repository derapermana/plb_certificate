<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihans';
    protected $fillable = ['name', 'tmp', 'tgl_mulai', 'tgl_selesai', 'keterangan'];

    public function guru_pelatihans()
    {
        return $this->hasMany('App\GuruPelatihan');
    }
}
