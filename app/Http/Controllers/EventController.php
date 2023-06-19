<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event as ModelsEvent;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = ModelsEvent::paginate(4, ['*'], 'events');
        $events_own = ModelsEvent::where('user_id', auth()->user()->id)->paginate(4, ['*'], 'events_own');

        return view(
            'events.index',
            [
                'events' => $events,
                'events_own' => $events_own
            ]
        );
    }

    public function show($id)
    {
        $eventDetails = ModelsEvent::findOrFail($id);
        return view('events.show', ['eventDetails' => $eventDetails]);
    }

    public function edit($id)
    {
        $eventDetails = ModelsEvent::findOrFail($id);
        return view('events.edit', ['eventDetails' => $eventDetails]);
    }

    public function create()
    {
        return view('events.create');
    }

    // public function store(Request $request)
    // {
    //     $event = new ModelsEvent();

    //     $event->event_title = request('title');
    //     $event->event_text = request('descr');
    //     $event->date = request('date');
    //     $event->link = request('link');
    //     $event->user_id = auth()->user()->id;

    //     if ($request->hasFile('image')) {
    //         $destinationPath = 'public/images/events';
    //         $image = $request->file('image');
    //         $image_name = $image->getClientOriginalName();
    //         $request->file('image')->storeAs($destinationPath, $image_name);
    //         $event->event_image = $image_name;
    //     }

    //     $event->save();

    //     return redirect('event');
    // }

    public function store(Request $request)
    {
        // log($request);

        $request->validate([
            "title" => ['required'],
            "descr" => ['required'],
            "date" => ['required'],
            "link" => ['required'],
            "image" => ['required'],
        ]);

        $title = $request->input('title');
        $descr = $request->input('descr');
        $date = $request->input('date');
        $link = $request->input('link');



        $event = new ModelsEvent();
        $event->event_title = $title;
        $event->event_text = $descr;
        $event->date = $date;
        $event->link = $link;
        $event->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $destinationPath = 'public/images/events';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $request->file('image')->storeAs($destinationPath, $image_name);
            $event->event_image = $image_name;
        }

        $event->save();

        return redirect('event')->with("message", "Update successfully");
    }

    public function destroy($id)
    {
        $event = ModelsEvent::findOrFail($id);
        $event->delete();

        return redirect('event');
    }

    public function update(Request $request, $id)
    {

        $event = ModelsEvent::findOrFail($id);

        $event->event_title = $request->input('title');
        $event->event_text = $request->input('descr');
        if ($request->hasFile('image')) {
            $destinationPath = 'public/images/events';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $request->file('image')->storeAs($destinationPath, $image_name);
            $event->event_image = $image_name;
        }

        $event->save();

        return redirect('event');
    }
}
