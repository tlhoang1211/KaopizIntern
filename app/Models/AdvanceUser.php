<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
    }

    function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function filterID($query, $value)
    {
        return $query->where('advance_users.id', $value);
    }

    public function filterPhoneNumber($query, $value)
    {
        return $query->where('number', 'LIKE', '%' . $value . '%');
    }

    public function filterName($query, $value)
    {
        return $query->where(DB::raw("CONCAT(advance_users.first_name,' ',advance_users.last_name)"), 'LIKE', '%' . $value . '%');
    }
}
