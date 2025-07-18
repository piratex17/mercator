@extends('layouts.admin')
@section('content')
@can('dnsserver_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a id="btn-new" class="btn btn-success" href="{{ route("admin.dnsservers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.dnsserver.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dnsserver.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Dnsserver">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dnsserver.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.dnsserver.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.dnsserver.fields.address_ip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dnsservers as $dnsserver)
                        <tr data-entry-id="{{ $dnsserver->id }}"
                        @if ($dnsserver->address_ip==null)
                            class="table-warning"
                        @endif
                            >
                            <td>

                            </td>
                            <td>
                                <a href="{{ route('admin.dnsservers.show', $dnsserver->id) }}">
                                {{ $dnsserver->name ?? '' }}
                                </a>
                            </td>
                            <td>
                              {!! $dnsserver->description !!}
                            </td>
                            <td>
                                {{ $dnsserver->address_ip ?? '' }}
                            </td>
                            <td>
                                @can('dnsserver_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dnsservers.show', $dnsserver->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dnsserver_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dnsservers.edit', $dnsserver->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dnsserver_delete')
                                    <form action="{{ route('admin.dnsservers.destroy', $dnsserver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dnsserver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dnsservers.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100, stateSave: true,
  });
  $('.datatable-Dnsserver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
