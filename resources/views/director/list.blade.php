@extends('adminlte::page')
@section('title', 'director')
@section('content_header')
    <h1>List director</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    @can('create', App\Model\Director::class)
        <a href={{ route('director.create') }} class="btn btn-primary">Add new director</a>
    @endcan
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
            @if ($directors->count() > 0)

                @foreach ($directors as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <img style="width: 100px; height:100px; object-fit:cover;" src="{{ $value->avatar }}"
                                alt="">
                        </td>
                        <td>
                            @can('delete', App\Model\Director::class)
                                <x-form-delete module="director" :value='$value' />
                            @endcan
                            @can('update', App\Model\Director::class)
                                <a href="{{ route('director.edit', $value) }}" class="btn btn-warning">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No director</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $directors->links() }}
@stop
