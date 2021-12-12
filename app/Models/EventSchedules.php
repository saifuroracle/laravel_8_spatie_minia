<?php

namespace App\Models;

use App\Models\Division;
use App\Models\Districts;
use Illuminate\Database\Eloquent\Model;

class EventSchedules extends Model
{
    protected $table = 'event_schedules';
    protected $guarded = ['id'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id', 'id');
    }


}
