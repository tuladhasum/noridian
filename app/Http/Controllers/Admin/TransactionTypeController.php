<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionTypeRequest;
use App\Http\Requests\StoreTransactionTypeRequest;
use App\Http\Requests\UpdateTransactionTypeRequest;
use App\TransactionType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionTypeController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('transaction_type_access'), 403);

        $transactionTypes = TransactionType::all();

        return view('admin.transactionTypes.index', compact('transactionTypes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('transaction_type_create'), 403);

        return view('admin.transactionTypes.create');
    }

    public function store(StoreTransactionTypeRequest $request)
    {
        abort_unless(\Gate::allows('transaction_type_create'), 403);

        $transactionType = TransactionType::create($request->all());

        return redirect()->route('admin.transaction-types.index');
    }

    public function edit(TransactionType $transactionType)
    {
        abort_unless(\Gate::allows('transaction_type_edit'), 403);

        return view('admin.transactionTypes.edit', compact('transactionType'));
    }

    public function update(UpdateTransactionTypeRequest $request, TransactionType $transactionType)
    {
        abort_unless(\Gate::allows('transaction_type_edit'), 403);

        $transactionType->update($request->all());

        return redirect()->route('admin.transaction-types.index');
    }

    public function show(TransactionType $transactionType)
    {
        abort_unless(\Gate::allows('transaction_type_show'), 403);

        return view('admin.transactionTypes.show', compact('transactionType'));
    }

    public function destroy(TransactionType $transactionType)
    {
        abort_unless(\Gate::allows('transaction_type_delete'), 403);

        $transactionType->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionTypeRequest $request)
    {
        TransactionType::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
