@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.crmCustomer.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.first_name') }}
                    </th>
                    <td>
                        {{ $crmCustomer->first_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.last_name') }}
                    </th>
                    <td>
                        {{ $crmCustomer->last_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.status') }}
                    </th>
                    <td>
                        {{ $crmCustomer->status->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.email') }}
                    </th>
                    <td>
                        {{ $crmCustomer->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.phone') }}
                    </th>
                    <td>
                        {{ $crmCustomer->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.address') }}
                    </th>
                    <td>
                        {{ $crmCustomer->address }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.skype') }}
                    </th>
                    <td>
                        {{ $crmCustomer->skype }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.website') }}
                    </th>
                    <td>
                        {{ $crmCustomer->website }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmCustomer.fields.description') }}
                    </th>
                    <td>
                        {!! $crmCustomer->description !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection