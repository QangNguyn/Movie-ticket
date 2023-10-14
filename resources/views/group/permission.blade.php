@extends('adminlte::page')
@section('title', 'Permission ' . $group->name)
@section('content_header')
    <h1>Permission: {{ $group->name }}</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <form method="post">
        @csrf
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th width="20%">Module</th>
                    <th>Permission</th>
                </tr>
            </thead>
            <tbody>
                @if ($modules->count() > 0)
                    @foreach ($modules as $module)
                        <tr>
                            <td>{{ $module->title }}</td>
                            <td>
                                <div class="row">
                                    @if (!empty(json_decode($module->role)))
                                        @foreach (json_decode($module->role) as $roleName => $roleLabel)
                                            <div class="col-2">
                                                <label for="role_{{ $module->name }}_{{ $roleName }}">
                                                    <input type="checkbox" name="role[{{ $module->name }}][]"
                                                        id="role_{{ $module->name }}_{{ $roleName }}"
                                                        value="{{ $roleName }}"
                                                        {{ isRole($roleArr, $module->name, $roleName) ? 'checked' : 'false' }}>
                                                    {{ $roleLabel }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Permission</button>
    </form>
@stop
