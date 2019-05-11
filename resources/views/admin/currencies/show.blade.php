@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.currency.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.currency.fields.name') }}
                    </th>
                    <td>
                        {{ $currency->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.currency.fields.code') }}
                    </th>
                    <td>
                        {{ $currency->code }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.currency.fields.main_currency') }}
                    </th>
                    <td>
                        <input type="checkbox" disabled {{ $currency->main_currency ? "checked" : "" }}>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection