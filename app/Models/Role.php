<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function advanceUsers()
    {
        return $this->belongsToMany('App\AdvanceUser', 'role_users', 'user_id', 'role_id');
    }
}
