@extends('adminlte::page')
@section('title', 'catgory')
@section('content_header')
    <h1>List catgory</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <table class="table mt-3">
        <a href={{ route('category.create') }} class="btn btn-primary">Add new category</a>

        <thead>
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="30%">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($list->count() > 0)

                @foreach ($list as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <x-form-delete module="category" :value="$value" />
                            <a href="{{ route('category.edit', $value) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-center">No category</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $list->links() }}
@stop
