@extends('layouts.admin')
@section('content')
@can('example_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.examples.create") }}">
                {{ trans('global.add') }} {{ trans('global.example.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.example.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.example.fields.fullname') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.email') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.secret') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.meal_preference') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.terms_agreement') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.no_of_siblings') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.height') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.expected_salary') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.discharge_date') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.time_of_birth') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.upload_docs') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.additional_documents') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.additional_photos') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.tags') }}
                        </th>
                        <th>
                            {{ trans('global.example.fields.hospital') }}
                        </th>
                        <th>
                            {{ trans('global.hospital.fields.address') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($examples as $key => $example)
                        <tr data-entry-id="{{ $example->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $example->fullname ?? '' }}
                            </td>
                            <td>
                                {{ $example->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Example::SECRET_RADIO[$example->secret] ?? '' }}
                            </td>
                            <td>
                                {{ App\Example::MEAL_PREFERENCE_SELECT[$example->meal_preference] ?? '' }}
                            </td>
                            <td>
                                {{ $example->terms_agreement ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                {{ $example->no_of_siblings ?? '' }}
                            </td>
                            <td>
                                {{ $example->height ?? '' }}
                            </td>
                            <td>
                                {{ $example->expected_salary ?? '' }}
                            </td>
                            <td>
                                {{ $example->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ $example->discharge_date ?? '' }}
                            </td>
                            <td>
                                {{ $example->time_of_birth ?? '' }}
                            </td>
                            <td>
                                @if($example->upload_docs)
                                    <a href="{{ $example->upload_docs->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($example->additional_documents)
                                    @foreach($example->additional_documents as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($example->profile_picture)
                                    <a href="{{ $example->profile_picture->getUrl() }}" target="_blank">
                                        <img src="{{ $example->profile_picture->getUrl() }}" width="150px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($example->additional_photos)
                                    @foreach($example->additional_photos as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @foreach($example->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $example->hospital->name ?? '' }}
                            </td>
                            <td>
                                {{ $example->hospital->address ?? '' }}
                            </td>
                            <td>
                                @can('example_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.examples.show', $example->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('example_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.examples.edit', $example->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('example_delete')
                                    <form action="{{ route('admin.examples.destroy', $example->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.examples.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('example_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection