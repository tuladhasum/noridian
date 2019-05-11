<?php

namespace App\Http\Controllers\Admin;

use App\ClientStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientStatusRequest;
use App\Http\Requests\StoreClientStatusRequest;
use App\Http\Requests\UpdateClientStatusRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientStatusController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('client_status_access'), 403);

        $clientStatuses = ClientStatus::all();

        return view('admin.clientStatuses.index', compact('clientStatuses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('client_status_create'), 403);

        return view('admin.clientStatuses.create');
    }

    public function store(StoreClientStatusRequest $request)
    {
        abort_unless(\Gate::allows('client_status_create'), 403);

        $clientStatus = ClientStatus::create($request->all());

        return redirect()->route('admin.client-statuses.index');
    }

    public function edit(ClientStatus $clientStatus)
    {
        abort_unless(\Gate::allows('client_status_edit'), 403);

        return view('admin.clientStatuses.edit', compact('clientStatus'));
    }

    public function update(UpdateClientStatusRequest $request, ClientStatus $clientStatus)
    {
        abort_unless(\Gate::allows('client_status_edit'), 403);

        $clientStatus->update($request->all());

        return redirect()->route('admin.client-statuses.index');
    }

    public function show(ClientStatus $clientStatus)
    {
        abort_unless(\Gate::allows('client_status_show'), 403);

        return view('admin.clientStatuses.show', compact('clientStatus'));
    }

    public function destroy(ClientStatus $clientStatus)
    {
        abort_unless(\Gate::allows('client_status_delete'), 403);

        $clientStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientStatusRequest $request)
    {
        ClientStatus::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
