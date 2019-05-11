@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.incomeSource.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.incomeSource.fields.name') }}
                    </th>
                    <td>
                        {{ $incomeSource->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.incomeSource.fields.fee_percent') }}
                    </th>
                    <td>
                        {{ $incomeSource->fee_percent }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection