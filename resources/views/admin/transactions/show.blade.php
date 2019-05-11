@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.transaction.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.project') }}
                    </th>
                    <td>
                        {{ $transaction->project->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.transaction_type') }}
                    </th>
                    <td>
                        {{ $transaction->transaction_type->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.income_source') }}
                    </th>
                    <td>
                        {{ $transaction->income_source->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.amount') }}
                    </th>
                    <td>
                        ${{ $transaction->amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.currency') }}
                    </th>
                    <td>
                        {{ $transaction->currency->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.transaction_date') }}
                    </th>
                    <td>
                        {{ $transaction->transaction_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.name') }}
                    </th>
                    <td>
                        {{ $transaction->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.transaction.fields.description') }}
                    </th>
                    <td>
                        {!! $transaction->description !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection