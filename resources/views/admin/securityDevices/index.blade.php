@extends('layouts.admin')
@section('content')
@can('security_device_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a id="btn-new" class="btn btn-success" href="{{ route('admin.security-devices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.securityDevice.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.securityDevice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.securityDevice.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.securityDevice.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($securityDevices as $key => $securityDevice)
                        <tr data-entry-id="{{ $securityDevice->id }}">
                            <td>

                            </td>
                            <td>
                                <a href="{{ route('admin.security-devices.show', $securityDevice->id) }}">
                                {{ $securityDevice->name ?? '' }}
                                </a>
                            </td>
                            <td>
                                {!! $securityDevice->description ?? '' !!}
                            </td>
                            <td nowrap>
                                @can('security_device_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.security-devices.show', $securityDevice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('security_device_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.security-devices.edit', $securityDevice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('security_device_delete')
                                    <form action="{{ route('admin.security-devices.destroy', $securityDevice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@include('partials.datatable', array(
    'id' => '#dataTable',
    'title' => trans("cruds.securityDevice.title_singular"),
    'URL' => route('admin.security-devices.massDestroy'),
    'canDelete' => auth()->user()->can('security_device_delete') ? true : false
));
</script>
@endsection
