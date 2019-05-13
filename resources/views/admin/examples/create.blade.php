@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.example.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.examples.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                <label for="fullname">{{ trans('global.example.fields.fullname') }}</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ old('fullname', isset($example) ? $example->fullname : '') }}">
                @if($errors->has('fullname'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fullname') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.fullname_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.example.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($example) ? $example->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('global.example.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control ckeditor">{{ old('notes', isset($example) ? $example->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <em class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.notes_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('secret') ? 'has-error' : '' }}">
                <label>{{ trans('global.example.fields.secret') }}*</label>
                @foreach(App\Example::SECRET_RADIO as $key => $label)
                    <div>
                        <input id="secret_{{ $key }}" name="secret" type="radio" value="{{ $key }}" {{ old('secret', null) === (string)$key ? 'checked' : '' }}>
                        <label for="secret_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('secret'))
                    <em class="invalid-feedback">
                        {{ $errors->first('secret') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('meal_preference') ? 'has-error' : '' }}">
                <label for="meal_preference">{{ trans('global.example.fields.meal_preference') }}*</label>
                <select id="meal_preference" name="meal_preference" class="form-control">
                    <option value="" disabled {{ old('meal_preference', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Example::MEAL_PREFERENCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('meal_preference', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('meal_preference'))
                    <em class="invalid-feedback">
                        {{ $errors->first('meal_preference') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('terms_agreement') ? 'has-error' : '' }}">
                <label for="terms_agreement">{{ trans('global.example.fields.terms_agreement') }}*</label>
                <input name="terms_agreement" type="hidden" value="0">
                <input value="1" type="checkbox" id="terms_agreement" name="terms_agreement" {{ old('terms_agreement', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('terms_agreement'))
                    <em class="invalid-feedback">
                        {{ $errors->first('terms_agreement') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.terms_agreement_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('no_of_siblings') ? 'has-error' : '' }}">
                <label for="no_of_siblings">{{ trans('global.example.fields.no_of_siblings') }}</label>
                <input type="number" id="no_of_siblings" name="no_of_siblings" class="form-control" value="{{ old('no_of_siblings', isset($example) ? $example->no_of_siblings : '') }}" step="1">
                @if($errors->has('no_of_siblings'))
                    <em class="invalid-feedback">
                        {{ $errors->first('no_of_siblings') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.no_of_siblings_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('height') ? 'has-error' : '' }}">
                <label for="height">{{ trans('global.example.fields.height') }}</label>
                <input type="number" id="height" name="height" class="form-control" value="{{ old('height', isset($example) ? $example->height : '') }}" step="0.01">
                @if($errors->has('height'))
                    <em class="invalid-feedback">
                        {{ $errors->first('height') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.height_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('expected_salary') ? 'has-error' : '' }}">
                <label for="expected_salary">{{ trans('global.example.fields.expected_salary') }}*</label>
                <input type="number" id="expected_salary" name="expected_salary" class="form-control" value="{{ old('expected_salary', isset($example) ? $example->expected_salary : '') }}" step="0.01">
                @if($errors->has('expected_salary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('expected_salary') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.expected_salary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                <label for="date_of_birth">{{ trans('global.example.fields.date_of_birth') }}*</label>
                <input type="text" id="date_of_birth" name="date_of_birth" class="form-control date" value="{{ old('date_of_birth', isset($example) ? $example->date_of_birth : '') }}">
                @if($errors->has('date_of_birth'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.date_of_birth_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('discharge_date') ? 'has-error' : '' }}">
                <label for="discharge_date">{{ trans('global.example.fields.discharge_date') }}*</label>
                <input type="text" id="discharge_date" name="discharge_date" class="form-control datetime" value="{{ old('discharge_date', isset($example) ? $example->discharge_date : '') }}">
                @if($errors->has('discharge_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('discharge_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.discharge_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('time_of_birth') ? 'has-error' : '' }}">
                <label for="time_of_birth">{{ trans('global.example.fields.time_of_birth') }}*</label>
                <input type="text" id="time_of_birth" name="time_of_birth" class="form-control timepicker" value="{{ old('time_of_birth', isset($example) ? $example->time_of_birth : '') }}">
                @if($errors->has('time_of_birth'))
                    <em class="invalid-feedback">
                        {{ $errors->first('time_of_birth') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.time_of_birth_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('upload_docs') ? 'has-error' : '' }}">
                <label for="upload_docs">{{ trans('global.example.fields.upload_docs') }}</label>
                <div class="needsclick dropzone" id="upload_docs-dropzone">

                </div>
                @if($errors->has('upload_docs'))
                    <em class="invalid-feedback">
                        {{ $errors->first('upload_docs') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.upload_docs_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('additional_documents') ? 'has-error' : '' }}">
                <label for="additional_documents">{{ trans('global.example.fields.additional_documents') }}</label>
                <div class="needsclick dropzone" id="additional_documents-dropzone">

                </div>
                @if($errors->has('additional_documents'))
                    <em class="invalid-feedback">
                        {{ $errors->first('additional_documents') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.additional_documents_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('profile_picture') ? 'has-error' : '' }}">
                <label for="profile_picture">{{ trans('global.example.fields.profile_picture') }}</label>
                <div class="needsclick dropzone" id="profile_picture-dropzone">

                </div>
                @if($errors->has('profile_picture'))
                    <em class="invalid-feedback">
                        {{ $errors->first('profile_picture') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.profile_picture_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('additional_photos') ? 'has-error' : '' }}">
                <label for="additional_photos">{{ trans('global.example.fields.additional_photos') }}</label>
                <div class="needsclick dropzone" id="additional_photos-dropzone">

                </div>
                @if($errors->has('additional_photos'))
                    <em class="invalid-feedback">
                        {{ $errors->first('additional_photos') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.additional_photos_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                <label for="tags">{{ trans('global.example.fields.tags') }}
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                    @foreach($tags as $id => $tags)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || isset($example) && $example->tags->contains($id)) ? 'selected' : '' }}>{{ $tags }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.example.fields.tags_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hospital_id') ? 'has-error' : '' }}">
                <label for="hospital">{{ trans('global.example.fields.hospital') }}</label>
                <select name="hospital_id" id="hospital" class="form-control select2">
                    @foreach($hospitals as $id => $hospital)
                        <option value="{{ $id }}" {{ (isset($example) && $example->hospital ? $example->hospital->id : old('hospital_id')) == $id ? 'selected' : '' }}>{{ $hospital }}</option>
                    @endforeach
                </select>
                @if($errors->has('hospital_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hospital_id') }}
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
@section('scripts')
<script>
    Dropzone.options.uploadDocsDropzone = {
    url: '{{ route('admin.examples.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="upload_docs"]').remove()
      $('form').append('<input type="hidden" name="upload_docs" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="upload_docs"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($example) && $example->upload_docs)
      var file = {!! json_encode($example->upload_docs) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="upload_docs" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedAdditionalDocumentsMap = {}
Dropzone.options.additionalDocumentsDropzone = {
    url: '{{ route('admin.examples.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="additional_documents[]" value="' + response.name + '">')
      uploadedAdditionalDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAdditionalDocumentsMap[file.name]
      }
      $('form').find('input[name="additional_documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($example) && $example->additional_documents)
          var files =
            {!! json_encode($example->additional_documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="additional_documents[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.profilePictureDropzone = {
    url: '{{ route('admin.examples.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="profile_picture"]').remove()
      $('form').append('<input type="hidden" name="profile_picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="profile_picture"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($example) && $example->profile_picture)
      var file = {!! json_encode($example->profile_picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_picture" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    var uploadedAdditionalPhotosMap = {}
Dropzone.options.additionalPhotosDropzone = {
    url: '{{ route('admin.examples.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="additional_photos[]" value="' + response.name + '">')
      uploadedAdditionalPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAdditionalPhotosMap[file.name]
      }
      $('form').find('input[name="additional_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($example) && $example->additional_photos)
      var files =
        {!! json_encode($example->additional_photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="additional_photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop