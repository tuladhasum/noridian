@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.client.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.client.fields.first_name') }}
                    </th>
                    <td>
                        {{ $client->first_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.last_name') }}
                    </th>
                    <td>
                        {{ $client->last_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.company') }}
                    </th>
                    <td>
                        {{ $client->company }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.email') }}
                    </th>
                    <td>
                        {{ $client->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.phone') }}
                    </th>
                    <td>
                        {{ $client->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.website') }}
                    </th>
                    <td>
                        {{ $client->website }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.skype') }}
                    </th>
                    <td>
                        {{ $client->skype }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.country') }}
                    </th>
                    <td>
                        {{ $client->country }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.client.fields.status') }}
                    </th>
                    <td>
                        {{ $client->status->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection