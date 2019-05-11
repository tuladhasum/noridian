<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CrmDocument;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCrmDocumentRequest;
use App\Http\Requests\UpdateCrmDocumentRequest;

class CrmDocumentApiController extends Controller
{
    public function index()
    {
        $crmDocuments = CrmDocument::all();

        return $crmDocuments;
    }

    public function store(StoreCrmDocumentRequest $request)
    {
        return CrmDocument::create($request->all());
    }

    public function update(UpdateCrmDocumentRequest $request, CrmDocument $crmDocument)
    {
        return $crmDocument->update($request->all());
    }

    public function show(CrmDocument $crmDocument)
    {
        return $crmDocument;
    }

    public function destroy(CrmDocument $crmDocument)
    {
        return $crmDocument->delete();
    }
}
