@extends('adminlte::page')
@section('title', 'Edit seat')
@section('content_header')
    <h1>Edit seat</h1>
@stop
@section('content')
    <form action={{ route('seat.update', [$seat, $room]) }} method="post">
        @method('patch')
        @csrf
        <x-form-input label="Row" name="row" type="text" value="{{ $seat->row }}" />
        <x-form-input label="Column" name="column" type="text" value="{{ $seat->column }}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
