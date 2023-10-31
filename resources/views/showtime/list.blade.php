@extends('adminlte::page')
@section('title', 'Showtime')
@section('content_header')
    <h1>List showtime</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <a href={{ route('showtime.create') }} class="btn btn-primary">Add new showtime</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="20%">Movie</th>
                <th scope="col" width="20%">Cinema</th>
                <th scope="col">Room</th>
                <th scope="col">Start time</th>
                <th scope="col">End time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($list->count() > 0)

                @foreach ($list as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->movie->name }}</td>
                        <td>
                            {{ $value->room->cinema->name }}
                        </td>
                        <td>
                            {{ $value->room->name }}
                        </td>
                        <td>{{ $value->start_time }}</td>
                        <td>{{ $value->end_time }}</td>
                        <td>
                            <x-form-delete module="showtime" :value="$value" />
                            <a href="{{ route('showtime.edit', [$value]) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else   
                <tr>
                    <td colspan="4" class="text-center">No seats</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $list->links() }}

@stop
