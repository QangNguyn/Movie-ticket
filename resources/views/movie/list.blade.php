@extends('adminlte::page')
@section('title', 'movie')
@section('content_header')
    <h1>List movie</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    @can('create', App\Model\Movie::class)
        <a href={{ route('movie.create') }} class="btn btn-primary">Add new movie</a>
    @endcan
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="20%">Name</th>
                <th scope="col" width="20%">Director</th>
                <th scope="col" width="40%">Trailer</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($movies->count() > 0)

                @foreach ($movies as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            {{ $value->director->name }}
                        </td>
                        <td>{{ $value->link_trailer }}</td>
                        <td>
                            @can('delete', App\Model\Movie::class)
                                <x-form-delete module="movie" :value="$value" />
                            @endcan
                            @can('update', App\Model\Movie::class)
                                <a href="{{ route('movie.edit', $value) }}" class="btn btn-warning">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No movie</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $movies->links() }}
@stop
