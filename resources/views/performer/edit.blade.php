@extends('adminlte::page')
@section('title', 'performer')
@section('content_header')
    <h1>Edit performer</h1>
@stop
@section('content')
    <form action={{ route('performer.update', $performer) }} method="post">
        @method('patch')
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ $performer->name }}" />
        <x-form-input label="Slug" name="slug" type="text" value="{{ $performer->slug }}" />
        <x-form-upload name="thumbnail" value="{{ $performer->thumbnail }}" />
        <x-form-textarea label="Info" name="info" :content="$performer->info" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
