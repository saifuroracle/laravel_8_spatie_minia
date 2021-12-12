<?php

namespace App\Models;

use App\Models\Districts;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';

    public function districts()
    {
        return $this->hasMany(Districts::class,  'division_id', 'id');
    }
}
