<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note as ModelsNote;

class NoteController extends Controller
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
        $notes = ModelsNote::all();
        $notes_own = ModelsNote::where('user_id', auth()->user()->id)->get();

        return view(
            'notes.index',
            [
                'notes' => $notes,
                'notes_own' => $notes_own
            ]
        );
    }

    public function show($id)
    {
        $noteDetails = ModelsNote::findOrFail($id);
        return view('notes.show', ['noteDetails' => $noteDetails]);
    }

    public function edit($id)
    {
        $noteDetails = ModelsNote::findOrFail($id);
        return view('notes.edit', ['noteDetails' => $noteDetails]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store()
    {
        $note = new ModelsNote();

        $note->note_title = request('title');
        $note->note_caption = request('caption');
        $note->note_topic = request('topic');
        $note->user_id = auth()->user()->id;

        $note->save();

        return redirect('note');
    }

    public function destroy($id)
    {
        $event = ModelsNote::findOrFail($id);
        $event->delete();

        return redirect('note');
    }

    public function update(Request $request, $id)
    {
        $note = ModelsNote::findOrFail($id);

        $note->note_title = $request->input('title');
        $note->note_caption = $request->input('caption');
        $note->note_topic = $request->input('topic');

        $note->save();

        return redirect('note');
    }
}
