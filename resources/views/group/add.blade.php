@extends('adminlte::page')
@section('title', 'add new group')
@section('content_header')
    <h1>Add new group</h1>
@stop
@section('content')
    <form action="{{ route('group.store') }}" method="post">
        @csrf
        <x-form-input name="name" label="Name" :value="old('name')" type="text" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
