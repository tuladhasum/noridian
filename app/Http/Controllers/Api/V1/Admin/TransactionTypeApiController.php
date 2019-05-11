<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionTypeRequest;
use App\Http\Requests\UpdateTransactionTypeRequest;
use App\TransactionType;

class TransactionTypeApiController extends Controller
{
    public function index()
    {
        $transactionTypes = TransactionType::all();

        return $transactionTypes;
    }

    public function store(StoreTransactionTypeRequest $request)
    {
        return TransactionType::create($request->all());
    }

    public function update(UpdateTransactionTypeRequest $request, TransactionType $transactionType)
    {
        return $transactionType->update($request->all());
    }

    public function show(TransactionType $transactionType)
    {
        return $transactionType;
    }

    public function destroy(TransactionType $transactionType)
    {
        return $transactionType->delete();
    }
}
