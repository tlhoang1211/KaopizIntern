<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceUser extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function phones()
    {
        return $this->hasOne('App\Models\Phone', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'role_id', 'user_id');
    }

}
