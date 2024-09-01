<?php

namespace App\Models;

use App\Observers\EventObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(EventObserver::class)]
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'from',
        'to',
        'location',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'event_grades');
    }
}
