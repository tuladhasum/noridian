@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.hospital.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.hospital.fields.name') }}
                    </th>
                    <td>
                        {{ $hospital->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.hospital.fields.address') }}
                    </th>
                    <td>
                        {{ $hospital->address }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection