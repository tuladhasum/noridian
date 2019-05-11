@extends('layouts.admin')
@section('content')
@can('crm_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.crm-documents.create") }}">
                {{ trans('global.add') }} {{ trans('global.crmDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.crmDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.crmDocument.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('global.crmDocument.fields.document_file') }}
                        </th>
                        <th>
                            {{ trans('global.crmDocument.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.crmDocument.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crmDocuments as $key => $crmDocument)
                        <tr data-entry-id="{{ $crmDocument->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $crmDocument->customer->first_name ?? '' }}
                            </td>
                            <td>
                                @if($crmDocument->document_file)
                                    <a href="{{ $crmDocument->document_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $crmDocument->name ?? '' }}
                            </td>
                            <td>
                                {{ $crmDocument->description ?? '' }}
                            </td>
                            <td>
                                @can('crm_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.crm-documents.show', $crmDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('crm_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.crm-documents.edit', $crmDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('crm_document_delete')
                                    <form action="{{ route('admin.crm-documents.destroy', $crmDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.crm-documents.massDestroy') }}",
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
@can('crm_document_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection