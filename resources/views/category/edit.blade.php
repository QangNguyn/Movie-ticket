@extends('adminlte::page')
@section('title', 'Edit category')
@section('content_header')
    <h1>Edit category</h1>
@stop
@section('content')
    <form action={{ route('category.update', $category) }} method="post">
        @csrf
        @method('patch')
        <x-form-input label="Name" name="name" type="text" value="{{ $category->name }}" />
        <x-form-input label="Slug" name="slug" type="text" value="{{ $category->slug }}" />
        <x-form-textarea label="Description" name="description" :content="$category->description" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
