@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.document.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.document.fields.project') }}
                    </th>
                    <td>
                        {{ $document->project->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.document.fields.document_file') }}
                    </th>
                    <td>
                        {{ $document->document_file }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.document.fields.name') }}
                    </th>
                    <td>
                        {{ $document->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.document.fields.description') }}
                    </th>
                    <td>
                        {!! $document->description !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection