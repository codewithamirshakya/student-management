<?php

namespace App\Http\Controllers;

use App\Events\EventCreated;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Grade;
use Illuminate\Http\Request;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Event/Calendar', [
            'events' => Event::get()
        ]);
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return Inertia::render('Event/Create', ['grades' => Grade::all()]);
    }

    /**
     * Show the form for creating a new event.
     */
    public function store(StoreEventRequest $request)
    {
        $params = $request->all();
        $data = [
            'name' => $params['name'],
            'from' => $params['from'],
            'to' => $params['to'],
            'location' => $params['location'],
            'user_id' => auth()->user()->id,
        ];

        $event = Event::create($data);
        $event->grades()->sync($params['grade_ids']);
        EventCreated::dispatch($event);
        return redirect()->route('events.index');
    }


    /**
     * Show the event details
     */
    public function show(Event $event)
    {
        $qrCode = $event->name. ' '. $event->from. ' '. $event->to;
        return QrCode::generate($qrCode);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return Inertia::render(
            'Event/Edit',
            [
                'event' => $event
            ]
        );
    }

    /**
     * Update the event
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $params = $request->all();
        $data = [
            'name' => $params['name'],
            'from' => $params['from'],
            'to' => $params['to'],
            'location' => $params['location'],
        ];
        $event->update($data);

        $event->grades()->sync($params['grade_ids']);

        return redirect()->route('event.index');
    }

    /**
     * Delete event
     */
    public function delete(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
