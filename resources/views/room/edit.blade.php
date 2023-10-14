@extends('adminlte::page')
@section('title', 'Edit room')
@section('content_header')
    <h1>Edit room</h1>
@stop
@section('content')
    <form action={{ route('room.update', $room) }} method="post">
        @method('patch')
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ $room->name }}" />
        <x-form-select label="Cinema" name="cinema_id" :options="$cinemas" :records="$room->cinema" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
