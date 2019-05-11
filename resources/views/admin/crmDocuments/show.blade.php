@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.crmDocument.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.crmDocument.fields.customer') }}
                    </th>
                    <td>
                        {{ $crmDocument->customer->first_name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmDocument.fields.document_file') }}
                    </th>
                    <td>
                        {{ $crmDocument->document_file }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmDocument.fields.name') }}
                    </th>
                    <td>
                        {{ $crmDocument->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmDocument.fields.description') }}
                    </th>
                    <td>
                        {!! $crmDocument->description !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection