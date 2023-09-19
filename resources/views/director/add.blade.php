@extends('adminlte::page')
@section('title', 'director')
@section('content_header')
    <h1>Add director</h1>
@stop
@section('content')
    <form action={{ route('director.store') }} method="post">
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ old('name') }}" />
        <x-form-textarea label="Description" name="description" :content="old('description')" />
        <x-form-upload name="avatar" value="{{ old('avatar') }}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
