@extends('adminlte::page')
@section('title', 'cinema')
@section('content_header')
    <h1>Add movie</h1>
@stop
@section('content')
    <form action={{ route('movie.store') }} method="post">
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ old('name') }}" />
        <x-form-input label="Slug" name="slug" type="text" value="{{ old('slug') }}" />
        <x-form-input label="Duration" name="duration" type="number" value="{{ old('slug') }}" />
        <x-form-input label="Trailer" name="link_trailer" type="text" value="{{ old('link_trailer') }}" />
        <x-form-select label="Diretor" name="director_id" :options="$directors" />
        <x-form-select2 label="Performer" name="performer_id[]" type="select2" :options="$performers" />
        {{-- <x-form-select label="Performer" name="performer_id[]" type="select2" :options="$performers" /> --}}
        <x-form-textarea label="Description" name="description" :content="old('description')" />
        <x-form-upload name="banner" value="{{ old('banner') }}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
