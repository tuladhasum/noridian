@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.note.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.notes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('global.note.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($note) && $note->project ? $note->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('note_text') ? 'has-error' : '' }}">
                <label for="note_text">{{ trans('global.note.fields.note_text') }}*</label>
                <textarea id="note_text" name="note_text" class="form-control ">{{ old('note_text', isset($note) ? $note->note_text : '') }}</textarea>
                @if($errors->has('note_text'))
                    <em class="invalid-feedback">
                        {{ $errors->first('note_text') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.note.fields.note_text_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection