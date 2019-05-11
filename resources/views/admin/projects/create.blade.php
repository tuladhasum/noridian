@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.project.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projects.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.project.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($project) ? $project->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.project.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('global.project.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2">
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($project) && $project->client ? $project->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('client_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.project.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($project) ? $project->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.project.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                <label for="start_date">{{ trans('global.project.fields.start_date') }}</label>
                <input type="text" id="start_date" name="start_date" class="form-control date" value="{{ old('start_date', isset($project) ? $project->start_date : '') }}">
                @if($errors->has('start_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.project.fields.start_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                <label for="budget">{{ trans('global.project.fields.budget') }}</label>
                <input type="number" id="budget" name="budget" class="form-control" value="{{ old('budget', isset($project) ? $project->budget : '') }}" step="0.01">
                @if($errors->has('budget'))
                    <em class="invalid-feedback">
                        {{ $errors->first('budget') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.project.fields.budget_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('global.project.fields.status') }}</label>
                <select name="status_id" id="status" class="form-control select2">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (isset($project) && $project->status ? $project->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_id') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection