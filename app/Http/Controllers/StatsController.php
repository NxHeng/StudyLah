<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Deck as ModelsDeck;
use App\Models\Card as ModelsCard;
use App\Models\Note as ModelsNote;
use App\Models\Event as ModelsEvent;
use App\Models\User as ModelsUser;

class StatsController extends Controller
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
        $deckChart = ModelsDeck::select('deck_topic', DB::raw('COUNT(*) as deck_count'))
            ->groupBy('deck_topic')
            ->get();

        $deckLabels = $deckChart->pluck('deck_topic');
        $deckCounts = $deckChart->pluck('deck_count');

        $decks = ModelsDeck::withCount('cards')->get();
        $totalCards = 0;
        $totalDecks = 0;

        foreach ($decks as $deck) {
            $cardCount = $deck->cards_count;
            $totalCards += $cardCount;
            $totalDecks++;
        }

        $noteChart = ModelsNote::select('note_topic', DB::raw('COUNT(*) as note_count'))
            ->groupBy('note_topic')
            ->get();

        $noteLabels = $noteChart->pluck('note_topic');
        $noteCounts = $noteChart->pluck('note_count');

        $totalNotes = ModelsNote::where('user_id', auth()->user()->id)->count();
        $totalEvents = ModelsEvent::where('user_id', auth()->user()->id)->count();

        $user = ModelsUser::findOrFail(auth()->user()->id);

        // Get the date 7 days ago
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        // Retrieve the login information for the past 7 days
        $logins = $user->where('last_login_at', '>=', $startDate)->get();
        // Create an array of labels for the past 7 days
        $dayLabels = [];
        // Create an array of data indicating the login status for each day
        $dayData = [];
        // Iterate over each of the past 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $dayLabels[] = "Day " . ($i + 1);
            $dayData[] = $logins->contains(function ($login) use ($date) {
                return $login->last_login_at->toDateString() === $date;
            }) ? 1 : 0;
        }

        return view('stats.index', compact('deckLabels', 'deckCounts', 'totalCards', 'totalDecks', 'noteLabels', 'noteCounts', 'totalNotes', 'totalEvents', 'user', 'dayLabels', 'dayData'));
    }
}
