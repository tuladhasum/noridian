@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.transactionType.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.transactionType.fields.name') }}
                    </th>
                    <td>
                        {{ $transactionType->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection