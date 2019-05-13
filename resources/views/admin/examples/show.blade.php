@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.example.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.example.fields.fullname') }}
                    </th>
                    <td>
                        {{ $example->fullname }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.email') }}
                    </th>
                    <td>
                        {{ $example->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.notes') }}
                    </th>
                    <td>
                        {!! $example->notes !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.secret') }}
                    </th>
                    <td>
                        {{ App\Example::SECRET_RADIO[$example->secret] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.meal_preference') }}
                    </th>
                    <td>
                        {{ App\Example::MEAL_PREFERENCE_SELECT[$example->meal_preference] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.terms_agreement') }}
                    </th>
                    <td>
                        <input type="checkbox" disabled {{ $example->terms_agreement ? "checked" : "" }}>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.no_of_siblings') }}
                    </th>
                    <td>
                        {{ $example->no_of_siblings }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.height') }}
                    </th>
                    <td>
                        {{ $example->height }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.expected_salary') }}
                    </th>
                    <td>
                        ${{ $example->expected_salary }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.date_of_birth') }}
                    </th>
                    <td>
                        {{ $example->date_of_birth }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.discharge_date') }}
                    </th>
                    <td>
                        {{ $example->discharge_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.time_of_birth') }}
                    </th>
                    <td>
                        {{ $example->time_of_birth }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.upload_docs') }}
                    </th>
                    <td>
                        {{ $example->upload_docs }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.additional_documents') }}
                    </th>
                    <td>
                        {{ $example->additional_documents }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.profile_picture') }}
                    </th>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.additional_photos') }}
                    </th>
                </tr>
                <tr>
                    <th>
                        Tags
                    </th>
                    <td>
                        @foreach($example->tags as $id => $tags)
                            <span class="label label-info label-many">{{ $tags->name }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.example.fields.hospital') }}
                    </th>
                    <td>
                        {{ $example->hospital->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection