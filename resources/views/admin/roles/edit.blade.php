@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route("admin.roles.update", [$role->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
        </div>
        <div class="card-body">
            <div class="form-check">
                <div class="row">
                    <div class="col-md-4">
                        <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $role->title) }}" required autofocus/>
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['gdpr'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.gdpr.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        @php($permission = $permissions_sorted['data_processing_register'])
                        <label>{{ trans('cruds.dataProcessing.title') }}</label>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-check">
                        @php($permission = $permissions_sorted['security_controls'])
                        <label>{{ trans('cruds.securityControl.title') }}</label>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['ecosystem'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.ecosystem.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        @php($permission = $permissions_sorted['entity'])
                        <!-- input class="check-all-wrapper" type="checkbox" id="{{ $permission['name'] }}"-->
                        <label>{{ trans('cruds.entity.title') }}</label>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.relation.title') }}</label>
                        @php($permission = $permissions_sorted['relation'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['metier'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.metier.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.macroProcessus.title') }}</label>
                        @php($permission = $permissions_sorted['macro_processus'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.process.title') }}</label>
                        @php($permission = $permissions_sorted['process'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.activity.title') }}</label>
                        @php($permission = $permissions_sorted['activity'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.operation.title') }}</label>
                        @php($permission = $permissions_sorted['operation'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.task.title') }}</label>
                        @php($permission = $permissions_sorted['task'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.actor.title') }}</label>
                        @php($permission = $permissions_sorted['actor'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.information.title') }}</label>
                        @php($permission = $permissions_sorted['information'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['application'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.application.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.applicationBlock.title') }}</label>
                        @php($permission = $permissions_sorted['application_block'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.application.title') }}</label>
                        @php($permission = $permissions_sorted['m_application'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.applicationService.title') }}</label>
                        @php($permission = $permissions_sorted['application_service'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.applicationModule.title') }}</label>
                        @php($permission = $permissions_sorted['application_module'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.database.title') }}</label>
                        @php($permission = $permissions_sorted['database'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.flux.title') }}</label>
                        @php($permission = $permissions_sorted['flux'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['administration'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.administration.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.zoneAdmin.title') }}</label>
                        @php($permission = $permissions_sorted['zone_admin'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.annuaire.title') }}</label>
                        @php($permission = $permissions_sorted['annuaire'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.forestAd.title') }}</label>
                        @php($permission = $permissions_sorted['forest_ad'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.domaineAd.title') }}</label>
                        @php($permission = $permissions_sorted['domaine_ad'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.adminUser.title') }}</label>
                        @php($permission = $permissions_sorted['admin_user'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['infrastructure'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.logical_infrastructure.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.network.title') }}</label>
                        @php($permission = $permissions_sorted['network'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.subnetwork.title') }}</label>
                        @php($permission = $permissions_sorted['subnetwork'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.gateway.title') }}</label>
                        @php($permission = $permissions_sorted['gateway'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.externalConnectedEntity.title') }}</label>
                        @php($permission = $permissions_sorted['external_connected_entity'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.networkSwitch.title') }}</label>
                        @php($permission = $permissions_sorted['network_switch'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.router.title') }}</label>
                        @php($permission = $permissions_sorted['router'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.securityDevice.title') }}</label>
                        @php($permission = $permissions_sorted['security_device'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.dhcpServer.title') }}</label>
                        @php($permission = $permissions_sorted['dhcp_server'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                        <span class="help-block">{{ trans('global.deprecated') }}</span>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.dnsserver.title') }}</label>
                        @php($permission = $permissions_sorted['dnsserver'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                        <span class="help-block">{{ trans('global.deprecated') }}</span>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.cluster.title_short') }}</label>
                        @php($permission = $permissions_sorted['cluster'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.logicalServer.title') }}</label>
                        @php($permission = $permissions_sorted['logical_server'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.container.title') }}</label>
                        @php($permission = $permissions_sorted['container'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.logicalFlow.title') }}</label>
                        @php($permission = $permissions_sorted['logical_flow'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.vlan.title_short') }}</label>
                        @php($permission = $permissions_sorted['vlan'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.certificate.title') }}</label>
                        @php($permission = $permissions_sorted['certificate'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['physicalinfrastructure'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.physical_infrastructure.title_short') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.site.title') }}</label>
                        @php($permission = $permissions_sorted['site'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.building.title') }}</label>
                        @php($permission = $permissions_sorted['building'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.bay.title') }}</label>
                        @php($permission = $permissions_sorted['bay'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.physicalServer.title') }}</label>
                        @php($permission = $permissions_sorted['physical_server'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.workstation.title') }}</label>
                        @php($permission = $permissions_sorted['workstation'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.storageDevice.title') }}</label>
                        @php($permission = $permissions_sorted['storage_device'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            &nbsp;
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.peripheral.title') }}</label>
                        @php($permission = $permissions_sorted['peripheral'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.phone.title') }}</label>
                        @php($permission = $permissions_sorted['phone'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.physicalSwitch.title') }}</label>
                        @php($permission = $permissions_sorted['physical_switch'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.physicalRouter.title') }}</label>
                        @php($permission = $permissions_sorted['physical_router'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.wifiTerminal.title') }}</label>
                        @php($permission = $permissions_sorted['wifi_terminal'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            &nbsp;
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.physicalSecurityDevice.title') }}</label>
                        @php($permission = $permissions_sorted['physical_security_device'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.physicalLink.title') }}</label>
                        @php($permission = $permissions_sorted['physical_link'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.wan.title') }}</label>
                        @php($permission = $permissions_sorted['wan'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.man.title') }}</label>
                        @php($permission = $permissions_sorted['man'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.lan.title') }}</label>
                        @php($permission = $permissions_sorted['lan'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            <label><b>{{ trans('panel.menu.tools') }}</b></label>
        </div>

        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">

            <div class="row">

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.graph.title') }}</label>
                        @php($permission = $permissions_sorted['graph'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.tools.patching') }}</label>
                        @php($permission = $permissions_sorted['patching'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-header">
            @php($permission = $permissions_sorted['configure'])
            <div class="form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.configuration.title') }}</b></label>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group form-check">
                        <label>Password</label>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="profile_password_edit" id="profile_password_edit" value="256" {{ in_array('profile_password_edit', old('permissions', [])) || $role->permissions->contains(256) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_profile_password_edit }}">edit</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.user.title') }}</label>
                        @php($permission = $permissions_sorted['user'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.role.title') }}</label>
                        @php($permission = $permissions_sorted['role'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][4][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][3][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][2][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.configuration.title') }}</label>
                        @php($permission = $permissions_sorted['configuration'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.auditLog.title') }}</label>
                        @php($permission = $permissions_sorted['audit_log'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <label>{{ trans('cruds.tools.patching') }}</label>
                        @php($permission = $permissions_sorted['patching'])
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][0][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ $permission['name'] }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) || $role->permissions->contains($permission['actions'][1][0]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>
@endsection
