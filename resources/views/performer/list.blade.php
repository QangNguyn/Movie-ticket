@extends('adminlte::page')
@section('title', 'Performer')
@section('content_header')
    <h1>List Performer</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <a href={{ route('performer.create') }} class="btn btn-primary">Add new performer</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="30%">Name</th>
                <th scope="col" width="40%">Avatar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($performers->count() > 0)

                @foreach ($performers as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <img style="width: 100px; height:100px; object-fit:cover;" src="{{ $value->thumbnail }}"
                                alt="">
                        </td>
                        <td>
                            <x-form-delete module="performer" value={{ $value }} />
                            <a href="{{ route('performer.edit', $value) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No performer</td>
                </tr>
            @endif
        </tbody>
    </table>
@stop
