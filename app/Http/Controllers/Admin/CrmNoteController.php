<?php

namespace App\Http\Controllers\Admin;

use App\CrmCustomer;
use App\CrmNote;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrmNoteRequest;
use App\Http\Requests\StoreCrmNoteRequest;
use App\Http\Requests\UpdateCrmNoteRequest;

class CrmNoteController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('crm_note_access'), 403);

        $crmNotes = CrmNote::all();

        return view('admin.crmNotes.index', compact('crmNotes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('crm_note_create'), 403);

        $customers = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmNotes.create', compact('customers'));
    }

    public function store(StoreCrmNoteRequest $request)
    {
        abort_unless(\Gate::allows('crm_note_create'), 403);

        $crmNote = CrmNote::create($request->all());

        return redirect()->route('admin.crm-notes.index');
    }

    public function edit(CrmNote $crmNote)
    {
        abort_unless(\Gate::allows('crm_note_edit'), 403);

        $customers = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmNote->load('customer');

        return view('admin.crmNotes.edit', compact('customers', 'crmNote'));
    }

    public function update(UpdateCrmNoteRequest $request, CrmNote $crmNote)
    {
        abort_unless(\Gate::allows('crm_note_edit'), 403);

        $crmNote->update($request->all());

        return redirect()->route('admin.crm-notes.index');
    }

    public function show(CrmNote $crmNote)
    {
        abort_unless(\Gate::allows('crm_note_show'), 403);

        $crmNote->load('customer');

        return view('admin.crmNotes.show', compact('crmNote'));
    }

    public function destroy(CrmNote $crmNote)
    {
        abort_unless(\Gate::allows('crm_note_delete'), 403);

        $crmNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmNoteRequest $request)
    {
        CrmNote::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
