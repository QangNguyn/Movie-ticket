@extends('adminlte::page')
@section('title', 'cinema')
@section('content_header')
    <h1>List cinema</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    @can('create', App\Model\Cinema::class)
        <a href={{ route('cinema.create') }} class="btn btn-primary">Add new cinema</a>
    @endcan
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="30%">Name</th>
                <th scope="col" width="40%">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($list->count() > 0)

                @foreach ($list as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>
                            @can('delete', App\Model\Cinema::class)
                                <x-form-delete module="cinema" :value="$value" />
                            @endcan
                            @can('update', App\Model\Cinema::class)
                                <a href="{{ route('cinema.edit', $value) }}" class="btn btn-warning">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No movie cenima</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $list->links() }}
@stop
