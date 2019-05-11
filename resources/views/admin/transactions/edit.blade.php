@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.transactions.update", [$transaction->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('global.transaction.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->project ? $transaction->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('transaction_type_id') ? 'has-error' : '' }}">
                <label for="transaction_type">{{ trans('global.transaction.fields.transaction_type') }}*</label>
                <select name="transaction_type_id" id="transaction_type" class="form-control select2">
                    @foreach($transaction_types as $id => $transaction_type)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->transaction_type ? $transaction->transaction_type->id : old('transaction_type_id')) == $id ? 'selected' : '' }}>{{ $transaction_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction_type_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('transaction_type_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('income_source_id') ? 'has-error' : '' }}">
                <label for="income_source">{{ trans('global.transaction.fields.income_source') }}*</label>
                <select name="income_source_id" id="income_source" class="form-control select2">
                    @foreach($income_sources as $id => $income_source)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->income_source ? $transaction->income_source->id : old('income_source_id')) == $id ? 'selected' : '' }}>{{ $income_source }}</option>
                    @endforeach
                </select>
                @if($errors->has('income_source_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('income_source_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('global.transaction.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($transaction) ? $transaction->amount : '') }}" step="0.01">
                @if($errors->has('amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.transaction.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('currency_id') ? 'has-error' : '' }}">
                <label for="currency">{{ trans('global.transaction.fields.currency') }}*</label>
                <select name="currency_id" id="currency" class="form-control select2">
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->currency ? $transaction->currency->id : old('currency_id')) == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('currency_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('transaction_date') ? 'has-error' : '' }}">
                <label for="transaction_date">{{ trans('global.transaction.fields.transaction_date') }}*</label>
                <input type="text" id="transaction_date" name="transaction_date" class="form-control date" value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date : '') }}">
                @if($errors->has('transaction_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('transaction_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.transaction.fields.transaction_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.transaction.fields.name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($transaction) ? $transaction->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.transaction.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.transaction.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($transaction) ? $transaction->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.transaction.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection