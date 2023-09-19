@extends('adminlte::page')
@section('title', 'cinema')
@section('content_header')
    <h1>Add cinema</h1>
@stop
@section('content')
    <form action={{ route('cinema.store') }} method="post">
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ old('name') }}" />
        <x-form-input label="Address" name="address" type="text" value="{{ old('address') }}" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
