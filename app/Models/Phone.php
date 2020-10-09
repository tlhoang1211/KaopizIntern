<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    use Filterable;

    public function advanceUser()
    {
        return $this->belongsTo('App\AdvanceUser');
    }
}
