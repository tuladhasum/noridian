@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.currency.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.currencies.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.currency.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($currency) ? $currency->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.currency.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="code">{{ trans('global.currency.fields.code') }}*</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('code', isset($currency) ? $currency->code : '') }}">
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.currency.fields.code_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('main_currency') ? 'has-error' : '' }}">
                <label for="main_currency">{{ trans('global.currency.fields.main_currency') }}</label>
                <input name="main_currency" type="hidden" value="0">
                <input value="1" type="checkbox" id="main_currency" name="main_currency" {{ old('main_currency', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('main_currency'))
                    <em class="invalid-feedback">
                        {{ $errors->first('main_currency') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.currency.fields.main_currency_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection