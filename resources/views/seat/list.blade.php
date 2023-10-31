@extends('adminlte::page')
@section('title', 'add new seat')
@section('content_header')
    <h1>List seat: {{ $room->name }} ({{ $room->cinema->name }})</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="20%">Row</th>
                <th scope="col" width="30%">Column</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($seats->count() > 0)

                @foreach ($seats as $key => $value)
                    <tr>
                        <td>{{ $value->row }}</td>
                        <td>
                            {{ $value->column }}
                        </td>
                        <td>
                            <x-form-delete module="seat" :value="$value" />
                            <a href="{{ route('seat.edit', [$value, $room]) }}" class="btn btn-warning">Edit</a>
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
    {{ $seats->links() }}

@stop
