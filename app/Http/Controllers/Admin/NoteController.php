<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNoteRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Note;
use App\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NoteController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('note_access'), 403);

        $notes = Note::all();

        return view('admin.notes.index', compact('notes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('note_create'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notes.create', compact('projects'));
    }

    public function store(StoreNoteRequest $request)
    {
        abort_unless(\Gate::allows('note_create'), 403);

        $note = Note::create($request->all());

        return redirect()->route('admin.notes.index');
    }

    public function edit(Note $note)
    {
        abort_unless(\Gate::allows('note_edit'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $note->load('project');

        return view('admin.notes.edit', compact('projects', 'note'));
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        abort_unless(\Gate::allows('note_edit'), 403);

        $note->update($request->all());

        return redirect()->route('admin.notes.index');
    }

    public function show(Note $note)
    {
        abort_unless(\Gate::allows('note_show'), 403);

        $note->load('project');

        return view('admin.notes.show', compact('note'));
    }

    public function destroy(Note $note)
    {
        abort_unless(\Gate::allows('note_delete'), 403);

        $note->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoteRequest $request)
    {
        Note::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
