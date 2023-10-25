@extends('adminlte::page')
@section('title', 'add new seat')
@section('content_header')
    <h1>Add new seat: {{ $room->name }} ({{ $room->cinema->name }})</h1>
@stop
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ @session('message') }}
        </div>
    @endif
    <form action="{{ route('seat.store', $room) }}" method="post">
        @csrf
        <x-form-input name="row" label="Row" :value="old('row')" type="text" />
        <x-form-input name="column" label="Column" :value="old('column')" type="text" />
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('room.index') }}" type="button" class="btn btn-danger">Back</a>
    </form>
@stop
