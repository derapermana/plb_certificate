<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\GuruResetPasswordNotification;

class Guru extends Authenticatable
{
    use Notifiable;

    protected $guard = 'guru';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active',
        'nip', 'sekolah', 'alamat', 'alamat', 'tmp_lahir',
        'tgl_lahir', 'last_login', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new GuruResetPasswordNotification($token));
    }

    public function guru_pelatihans()
    {
        return $this->hasMany('App\GuruPelatihan');
    }


}
