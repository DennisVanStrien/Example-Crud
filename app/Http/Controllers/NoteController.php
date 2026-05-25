<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Auth::user()->notes()->latest()->get();
        return view('notes.index')->with('notes', $notes);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ]);

        $note = Note::create($data);
        $note->users()->attach(Auth::id());

        return redirect()->route('notes.index');
    }

    public function show(Note $note)
    {
        $users = User::orderBy('name')->get();
        return view('notes.show')->with('note', $note)->with('users', $users);
    }

    public function attachUser(Request $request, Note $note)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $note->users()->syncWithoutDetaching($data['user_id']);

        return redirect()->route('notes.show', $note);
    }

    public function edit(Note $note)
    {
        return view('notes.edit')->with('note', $note);
    }

    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ]);

        $note->update($data);
        return redirect()->route('notes.show', $note);
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
}
