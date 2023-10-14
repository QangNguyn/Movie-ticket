@extends('adminlte::page')
@section('title', 'Users')
@section('content_header')
    <h1>List users</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    @can('create', App\Models\User::class)
        <a href={{ route('user.create') }} class="btn btn-primary">Add new user</a>
    @endcan
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="30%">Name</th>
                <th scope="col" width="40%">Email</th>
                <th scope="col">Group</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)

                @foreach ($users as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            {{ $value->email }}
                        </td>
                        <td>{{ $value->group ? $value->group->name : '' }}</td>
                        <td>
                            @can('delete', App\User::class)
                                @if (Auth::user()->id != $value->id)
                                    <x-form-delete module="user" :value="$value" />
                                @endif
                            @endcan
                            @can('update', App\User::class)
                                <a href="{{ route('user.edit', $value) }}" class="btn btn-warning">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No users</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $users->links() }}
@stop
