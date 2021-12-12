<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registration';
    protected $guarded = ['id'];

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }
}
