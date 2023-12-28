@extends('adminlte::page')
@section('title', 'Add category')
@section('content_header')
    <h1>Add category</h1>
@stop
@section('content')
    <form action={{ route('category.store') }} method="post">
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ old('name') }}" />
        <x-form-input label="Slug" name="slug" type="text" value="{{ old('slug') }}" />
        <x-form-textarea label="Description" name="description" :content="old('description')" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
