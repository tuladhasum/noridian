@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.document.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.documents.update", [$document->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('global.document.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($document) && $document->project ? $document->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('document_file') ? 'has-error' : '' }}">
                <label for="document_file">{{ trans('global.document.fields.document_file') }}*</label>
                <div class="needsclick dropzone" id="document_file-dropzone">

                </div>
                @if($errors->has('document_file'))
                    <em class="invalid-feedback">
                        {{ $errors->first('document_file') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.document.fields.document_file_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.document.fields.name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($document) ? $document->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.document.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.document.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($document) ? $document->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.document.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
    Dropzone.options.documentFileDropzone = {
    url: '{{ route('admin.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').find('input[name="document_file"]').remove()
      $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="document_file"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($document) && $document->document_file)
      var file = {!! json_encode($document->document_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    }
}
</script>
@stop