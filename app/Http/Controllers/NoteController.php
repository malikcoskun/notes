<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use App\Models\User;
use App\Models\Note;
use App\Http\Requests\NoteUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->select('id', 'title', 'content')->get();
        return view('notes.index', ['notes' => $notes]);
    }

    public function create()
    {
        $this->authorize('create', Note::class);
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Note::class);

        $note = new Note();

        $note->user_id = auth()->id();

        $note->title = $request->title;
        $note->content = $request->content;

        activity()->log('New note added: ' . $note->title);
        $note->save();

        return redirect()->route('notes.index');
    }

    public function destroy(Request $request, $id)
    {
        $note = Note::find($id);
        $this->authorize('delete', $note);

        activity()->log('Note deleted: ' . $note->title);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note has been deleted successfully');
    }
    
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $this->authorize('update', $note);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $this->authorize('update', $note);

        activity()->log('Note updated: ' . $note->title);
        $note->update($request->all());

        return redirect()->route('notes.index')->with('success', 'Note has been updated successfully');
    }
}
