@extends('adminlte::page')
@section('title', 'cinema')
@section('content_header')
    <h1>Add cinema</h1>
@stop
@section('content')
    <form action={{ route('cinema.update', $cinema) }} method="post">
        @csrf
        @method('patch')
        <x-form-input label="Name" name="name" type="text" value="{{ $cinema->name }}" />
        <x-form-input label="Address" name="address" type="text" value="{{ $cinema->address }}" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
