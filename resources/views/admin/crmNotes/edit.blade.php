@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.crmNote.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.crm-notes.update", [$crmNote->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
                <label for="customer">{{ trans('global.crmNote.fields.customer') }}*</label>
                <select name="customer_id" id="customer" class="form-control select2">
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ (isset($crmNote) && $crmNote->customer ? $crmNote->customer->id : old('customer_id')) == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                <label for="note">{{ trans('global.crmNote.fields.note') }}*</label>
                <textarea id="note" name="note" class="form-control ">{{ old('note', isset($crmNote) ? $crmNote->note : '') }}</textarea>
                @if($errors->has('note'))
                    <em class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.crmNote.fields.note_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection