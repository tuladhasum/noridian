@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.crmStatus.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.crmStatus.fields.name') }}
                    </th>
                    <td>
                        {{ $crmStatus->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection