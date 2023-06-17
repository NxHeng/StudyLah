<?php

namespace App\Http\Controllers;

use App\Models\Deck as ModelsDeck;
use App\Models\Event as ModelsEvent;
use App\Models\Note as ModelsNote;

class HomeController extends Controller
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
        $decks_own = ModelsDeck::where('user_id', auth()->user()->id)
            ->latest()
            ->take(3)
            ->get();

        $events = ModelsEvent::latest()->take(5)->get();
        $notes = ModelsNote::latest()->take(8)->get();

        return view(
            'home',
            [
                'events' => $events,
                'notes' => $notes,
                'decks_own' => $decks_own
            ]
        );
    }
}
