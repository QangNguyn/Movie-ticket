@extends('adminlte::page')
@section('title', 'cinema')
@section('content_header')
    <h1>Edit movie</h1>
@stop
@section('content')
    <form action={{ route('movie.update', $movie) }} method="post">
        @method('patch')
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ $movie->name }}" />
        <x-form-input label="Slug" name="slug" type="text" value="{{ $movie->slug }}" />
        <x-form-input label="Duration" name="duration" type="number" value="{{ $movie->duration }}" />
        <x-form-input label="Trailer" name="link_trailer" type="text" value="{{ $movie->link_trailer }}" />
        <x-form-select label="Diretor" name="director_id" :options="$directors" :records="$movie->director" />
        <x-form-select2 label="Performer" name="performer_id[]" type="select2" :records="$movie->performers" :options="$performers" />
        <x-form-select2 label="Category" name="category_id[]" type="select2" :records="$movie->categories" :options="$categories" />
        <x-form-textarea label="Description" name="description" content="{{ $movie->description }}" />
        <div class="form-group mb-3">
            <input id="status" type="checkbox" name="coming_soon" {{ $movie->coming_soon == 1 ? 'checked' : '' }}
                value="1">
            <label for="status">Coming soon</label>
        </div>
        <x-form-upload name="banner" value="{{ $movie->banner }}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
