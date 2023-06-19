<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
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
        $notes = ModelsNote::paginate(4, ['*'], 'notes');
        $notes_own = ModelsNote::where('user_id', auth()->user()->id)->paginate(4, ['*'], 'notes_own');

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

    public function preview($id)
    {
        $noteDetails = ModelsNote::findOrFail($id);
        return view('notes.preview', ['noteDetails' => $noteDetails]);
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

    public function store(Request $request)
    {
        $note = new ModelsNote();

        $note->note_title = request('title');
        $note->note_caption = request('caption');
        $note->note_topic = request('topic');
        $note->user_id = auth()->user()->id;

        if ($request->hasFile('document')) {
            $destinationPath = 'public/documents';
            $doc = $request->file('document');
            $doc_name = $doc->getClientOriginalName();
            $request->file('document')->storeAs($destinationPath, $doc_name);
            $note->note_file = $doc_name;
        }

        if ($request->hasFile('image')) {
            $destinationPath = 'public/images/notes';
            $img = $request->file('image');
            $img_name = $img->getClientOriginalName();
            $request->file('image')->storeAs($destinationPath, $img_name);
            $note->note_img = $img_name;
        }

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

        if ($request->hasFile('document')) {
            $destinationPath = 'public/documents/';
            $doc = $request->file('document');
            $doc_name = $doc->getClientOriginalName();
            $request->file('document')->storeAs($destinationPath, $doc_name);
            $note->note_file = $doc_name;
        }

        if ($request->hasFile('image')) {
            $destinationPath = 'public/images/notes/';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $request->file('image')->storeAs($destinationPath, $image_name);
            $note->note_img = $image_name;
        }

        $note->save();

        return redirect('note');
    }

    public function download($filename)
    {
        $path = storage_path('app/public/documents/');
        if (file_exists($path)) {
            return response()->download($path . $filename);
        }
        abort(404);
    }
}
