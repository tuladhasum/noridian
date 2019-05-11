@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.incomeSource.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.income-sources.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.incomeSource.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($incomeSource) ? $incomeSource->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.incomeSource.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fee_percent') ? 'has-error' : '' }}">
                <label for="fee_percent">{{ trans('global.incomeSource.fields.fee_percent') }}</label>
                <input type="number" id="fee_percent" name="fee_percent" class="form-control" value="{{ old('fee_percent', isset($incomeSource) ? $incomeSource->fee_percent : '') }}" step="0.01">
                @if($errors->has('fee_percent'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fee_percent') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.incomeSource.fields.fee_percent_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection