<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentRequest;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('document_access'), 403);

        $documents = Document::all();

        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('document_create'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documents.create', compact('projects'));
    }

    public function store(StoreDocumentRequest $request)
    {
        abort_unless(\Gate::allows('document_create'), 403);

        $document = Document::create($request->all());

        if ($request->input('document_file', false)) {
            $document->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
        }

        return redirect()->route('admin.documents.index');
    }

    public function edit(Document $document)
    {
        abort_unless(\Gate::allows('document_edit'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $document->load('project');

        return view('admin.documents.edit', compact('projects', 'document'));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        abort_unless(\Gate::allows('document_edit'), 403);

        $document->update($request->all());

        if ($request->input('document_file', false)) {
            if (!$document->document_file || $request->input('document_file') !== $document->document_file->file_name) {
                $document->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
            }
        } elseif ($document->document_file) {
            $document->document_file->delete();
        }

        return redirect()->route('admin.documents.index');
    }

    public function show(Document $document)
    {
        abort_unless(\Gate::allows('document_show'), 403);

        $document->load('project');

        return view('admin.documents.show', compact('document'));
    }

    public function destroy(Document $document)
    {
        abort_unless(\Gate::allows('document_delete'), 403);

        $document->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentRequest $request)
    {
        Document::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
