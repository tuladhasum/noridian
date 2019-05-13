@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.tag.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.tag.fields.name') }}
                    </th>
                    <td>
                        {{ $tag->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection