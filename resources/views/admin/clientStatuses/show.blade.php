@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.clientStatus.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.clientStatus.fields.name') }}
                    </th>
                    <td>
                        {{ $clientStatus->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection