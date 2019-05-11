<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClientStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientStatusRequest;
use App\Http\Requests\UpdateClientStatusRequest;

class ClientStatusApiController extends Controller
{
    public function index()
    {
        $clientStatuses = ClientStatus::all();

        return $clientStatuses;
    }

    public function store(StoreClientStatusRequest $request)
    {
        return ClientStatus::create($request->all());
    }

    public function update(UpdateClientStatusRequest $request, ClientStatus $clientStatus)
    {
        return $clientStatus->update($request->all());
    }

    public function show(ClientStatus $clientStatus)
    {
        return $clientStatus;
    }

    public function destroy(ClientStatus $clientStatus)
    {
        return $clientStatus->delete();
    }
}
