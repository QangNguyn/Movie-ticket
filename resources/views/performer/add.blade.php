@extends('adminlte::page')
@section('title', 'performer')
@section('content_header')
    <h1>Add performer</h1>
@stop
@section('content')
    <form action={{ route('performer.store') }} method="post">
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ old('name') }}" />
        <x-form-input label="Slug" name="slug" type="text" value="{{ old('slug') }}" />
        <x-form-upload name="thumbnail" value="{{ old('thumbnail') }}" />
        <x-form-textarea label="Info" name="info" :content="old('info')" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
