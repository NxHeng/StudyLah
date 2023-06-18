<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card as ModelsCard;
use App\Models\Deck as ModelsDeck;

class CardController extends Controller
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
    public function index($id)
    {
        $deck = ModelsDeck::findOrFail($id);
        $cards = ModelsCard::where('deck_id', $id)->get();

        return view(
            'cards.index',
            [
                'deck' => $deck,
                'cards' => $cards
            ]
        );
    }

    public function study($id)
    {
        $deck = ModelsDeck::findOrFail($id);
        $cards = ModelsCard::where('deck_id', $id)->get();

        return view(
            'cards.study',
            [
                'deck' => $deck,
                'cards' => $cards
            ]
        );
    }

    public function create($id)
    {
        $deck = ModelsDeck::findOrFail($id);

        return view('cards.create', ['deck' => $deck]);
    }

    public function store($id)
    {
        $card = new ModelsCard();

        $card->card_front = request('front');
        $card->card_back = request('back');
        $card->deck_id = $id;

        error_log($card);

        $card->save();

        return redirect('deck/' . $card->deck_id . '/card');
    }

    public function destroy($id, $card_id)
    {
        $card = ModelsCard::findOrFail($card_id);

        $card->delete();

        return redirect('deck/' . $id . '/card');
    }
}
