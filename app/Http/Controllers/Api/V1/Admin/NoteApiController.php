<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Note;

class NoteApiController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return $notes;
    }

    public function store(StoreNoteRequest $request)
    {
        return Note::create($request->all());
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        return $note->update($request->all());
    }

    public function show(Note $note)
    {
        return $note;
    }

    public function destroy(Note $note)
    {
        return $note->delete();
    }
}
