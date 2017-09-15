<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'permissions'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_groups');
    }
}
