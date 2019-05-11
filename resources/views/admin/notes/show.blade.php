@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.note.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.note.fields.project') }}
                    </th>
                    <td>
                        {{ $note->project->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.note.fields.note_text') }}
                    </th>
                    <td>
                        {!! $note->note_text !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection