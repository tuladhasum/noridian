<?php

namespace App\Http\Controllers\Admin;

use App\CrmCustomer;
use App\CrmDocument;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCrmDocumentRequest;
use App\Http\Requests\StoreCrmDocumentRequest;
use App\Http\Requests\UpdateCrmDocumentRequest;

class CrmDocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('crm_document_access'), 403);

        $crmDocuments = CrmDocument::all();

        return view('admin.crmDocuments.index', compact('crmDocuments'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('crm_document_create'), 403);

        $customers = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmDocuments.create', compact('customers'));
    }

    public function store(StoreCrmDocumentRequest $request)
    {
        abort_unless(\Gate::allows('crm_document_create'), 403);

        $crmDocument = CrmDocument::create($request->all());

        if ($request->input('document_file', false)) {
            $crmDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
        }

        return redirect()->route('admin.crm-documents.index');
    }

    public function edit(CrmDocument $crmDocument)
    {
        abort_unless(\Gate::allows('crm_document_edit'), 403);

        $customers = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmDocument->load('customer');

        return view('admin.crmDocuments.edit', compact('customers', 'crmDocument'));
    }

    public function update(UpdateCrmDocumentRequest $request, CrmDocument $crmDocument)
    {
        abort_unless(\Gate::allows('crm_document_edit'), 403);

        $crmDocument->update($request->all());

        if ($request->input('document_file', false)) {
            if (!$crmDocument->document_file || $request->input('document_file') !== $crmDocument->document_file->file_name) {
                $crmDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
            }
        } elseif ($crmDocument->document_file) {
            $crmDocument->document_file->delete();
        }

        return redirect()->route('admin.crm-documents.index');
    }

    public function show(CrmDocument $crmDocument)
    {
        abort_unless(\Gate::allows('crm_document_show'), 403);

        $crmDocument->load('customer');

        return view('admin.crmDocuments.show', compact('crmDocument'));
    }

    public function destroy(CrmDocument $crmDocument)
    {
        abort_unless(\Gate::allows('crm_document_delete'), 403);

        $crmDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmDocumentRequest $request)
    {
        CrmDocument::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
