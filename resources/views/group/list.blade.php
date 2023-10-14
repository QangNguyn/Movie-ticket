@extends('adminlte::page')
@section('title', 'Group')
@section('content_header')
    <h1>List groups</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <a href={{ route('group.create') }} class="btn btn-primary">Add new group</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Name</th>
                <th scope="col">Created by</th>
                <th scope="col">Permissions</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($groups->count() > 0)

                @foreach ($groups as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ !empty($value->user->name) ? $value->user->name : false }}</td>
                        <td><a href="{{ route('group.permission', $value) }}" class="btn btn-primary">Permissions</a></td>
                        <td>
                            <x-form-delete module="group" :value="$value" />
                            <a href="{{ route('group.edit', $value) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No groups</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $groups->links() }}
@stop
