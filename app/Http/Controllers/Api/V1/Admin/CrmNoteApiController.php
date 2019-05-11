<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CrmNote;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCrmNoteRequest;
use App\Http\Requests\UpdateCrmNoteRequest;

class CrmNoteApiController extends Controller
{
    public function index()
    {
        $crmNotes = CrmNote::all();

        return $crmNotes;
    }

    public function store(StoreCrmNoteRequest $request)
    {
        return CrmNote::create($request->all());
    }

    public function update(UpdateCrmNoteRequest $request, CrmNote $crmNote)
    {
        return $crmNote->update($request->all());
    }

    public function show(CrmNote $crmNote)
    {
        return $crmNote;
    }

    public function destroy(CrmNote $crmNote)
    {
        return $crmNote->delete();
    }
}
