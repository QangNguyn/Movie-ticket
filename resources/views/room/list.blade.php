@extends('adminlte::page')
@section('title', 'Rooms')
@section('content_header')
    <h1>List rooms</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <a href={{ route('room.create') }} class="btn btn-primary">Add new room</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="30%">Name</th>
                <th scope="col" width="40%">Cinema</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($rooms->count() > 0)

                @foreach ($rooms as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            {{ $value->cinema->name }}
                        </td>
                        <td>
                            <x-form-delete module="room" value={{ $value }} />
                            <a href="{{ route('room.edit', $value) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No rooms</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $rooms->links() }}
@stop
