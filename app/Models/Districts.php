<?php

namespace App\Models;

use App\Models\Thanas;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $table = 'districts';
    protected $primaryKey  = 'id';

    public function thanas()
    {
        return $this->hasMany(Thanas::class,  'district_id', 'id');
    }

    public function division()
    {
        return $this->belongsTO(Division::class,  'division_id', 'id');
    }

}
