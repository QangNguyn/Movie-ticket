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
    @can('create', App\Model\Room::class)
        <a href={{ route('room.create') }} class="btn btn-primary">Add new room</a>
    @endcan
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="20%">Name</th>
                <th scope="col" width="30%">Cinema</th>
                <th scope="col">Action</th>
                <th scope="col" width="10%">Seat</th>
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
                            @can('delete', App\Model\Room::class)
                                <x-form-delete module="room" :value="$value" />
                            @endcan
                            @can('create', App\Model\Room::class)
                                <a href="{{ route('room.edit', $value) }}" class="btn btn-warning">Edit</a>
                            @endcan
                        </td>
                        <td><a href="{{ route('seat.create', $value) }}" class="btn btn-primary">Add seat</a></td>
                        <td><a href="{{ route('seat.view', $value) }}" class="btn btn-success">View</a></td>
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
