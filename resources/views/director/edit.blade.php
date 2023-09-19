@extends('adminlte::page')
@section('title', 'cinema')
@section('content_header')
    <h1>Edit director</h1>
@stop
@section('content')
    <form action={{ route('director.update', $director) }} method="post">
        @csrf
        @method('patch')
        <x-form-input label="Name" name="name" type="text" value="{{ $director->name }}" />
        <x-form-textarea label="Description" name="description" :content="$director->description" />
        <x-form-upload name="avatar" value="{{ $director->avatar }}" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
