<?php

namespace App\Listeners;

use App\Events\EventCreated;
use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class SendPushNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventCreated $event): void
    {
        $event = $event->event;

        $students = Student::with(['user'])->whereIn('grade_id', $event->grades()->pluck('grades.id')->toArray())->get();

        foreach ($students as $student) {
            $student->user->notify(new \App\Notifications\SendEmailNotification($event));
        }
    }
}
