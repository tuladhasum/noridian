@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.project.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.project.fields.name') }}
                    </th>
                    <td>
                        {{ $project->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.project.fields.client') }}
                    </th>
                    <td>
                        {{ $project->client->first_name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.project.fields.description') }}
                    </th>
                    <td>
                        {!! $project->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.project.fields.start_date') }}
                    </th>
                    <td>
                        {{ $project->start_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.project.fields.budget') }}
                    </th>
                    <td>
                        {{ $project->budget }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.project.fields.status') }}
                    </th>
                    <td>
                        {{ $project->status->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection