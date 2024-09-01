<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'grade_id',
    ];
}
