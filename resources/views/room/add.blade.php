@extends('adminlte::page')
@section('title', 'add new room')
@section('content_header')
    <h1>Add new room</h1>
@stop
@section('content')
    <form action="{{ route('room.store') }}" method="post">
        @csrf
        <x-form-input name="name" label="Name" :value="old('name')" type="text" />
        <x-form-select name="cinema_id" label="Select cinema" :options="$cinemas" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
