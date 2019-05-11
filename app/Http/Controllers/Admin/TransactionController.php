<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\IncomeSource;
use App\Project;
use App\Transaction;
use App\TransactionType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('transaction_access'), 403);

        $transactions = Transaction::all();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('transaction_create'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction_types = TransactionType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income_sources = IncomeSource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transactions.create', compact('projects', 'transaction_types', 'income_sources', 'currencies'));
    }

    public function store(StoreTransactionRequest $request)
    {
        abort_unless(\Gate::allows('transaction_create'), 403);

        $transaction = Transaction::create($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_unless(\Gate::allows('transaction_edit'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction_types = TransactionType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income_sources = IncomeSource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('project', 'transaction_type', 'income_source', 'currency');

        return view('admin.transactions.edit', compact('projects', 'transaction_types', 'income_sources', 'currencies', 'transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        abort_unless(\Gate::allows('transaction_edit'), 403);

        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_unless(\Gate::allows('transaction_show'), 403);

        $transaction->load('project', 'transaction_type', 'income_source', 'currency');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_unless(\Gate::allows('transaction_delete'), 403);

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
