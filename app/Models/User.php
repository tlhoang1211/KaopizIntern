<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class User extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = ['name', 'class'];

    protected $user = 'users';

    public function filterID($query, $value)
    {
        return $query->where('id', $value);
    }

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }

    public function filterClass($query, $value)
    {
        return $query->where('class', 'LIKE', '%' . $value . '%');
    }
}


