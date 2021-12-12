<?php

namespace App\Models;

use App\Models\Districts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thanas extends Model
{
    use SoftDeletes;

    protected $softDelet = true;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id', 'id');
    }

}
