@extends('adminlte::page')
@section('title', 'group')
@section('content_header')
    <h1>Edit group</h1>
@stop
@section('content')
    <form action={{ route('group.update', $group) }} method="post">
        @method('patch')
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ $group->name }}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
