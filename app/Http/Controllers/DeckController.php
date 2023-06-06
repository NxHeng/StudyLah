<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deck as ModelsDeck;
use App\Models\Card as ModelsCard;

class DeckController extends Controller
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
        $decks_own = ModelsDeck::where('user_id', auth()->user()->id)->get();

        return view(
            'decks.index',
            [
                'decks_own' => $decks_own
            ]
        );
    }

    public function create()
    {
        return view('decks.create');
    }

    public function store()
    {
        $deck = new ModelsDeck();

        $deck->deck_name = request('name');
        $deck->deck_topic = request('topic');
        $deck->user_id = auth()->user()->id;

        $deck->save();

        return redirect('deck');
    }

    public function destroy($id)
    {
        $deck = ModelsDeck::findOrFail($id);
        $cards = ModelsCard::where('deck_id', $id)->get();

        $cards->each->delete();
        $deck->delete();

        return redirect('deck');
    }
}
