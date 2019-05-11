@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.crmNote.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.crmNote.fields.customer') }}
                    </th>
                    <td>
                        {{ $crmNote->customer->first_name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.crmNote.fields.note') }}
                    </th>
                    <td>
                        {!! $crmNote->note !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection