@extends('adminlte::page')
@section('title', 'performer')
@section('content_header')
    <h1>Edit performer</h1>
@stop
@section('content')
    <form action={{ route('user.update', $user) }} method="post">
        @method('patch')
        @csrf
        <x-form-input label="Name" name="name" type="text" value="{{ $user->name }}" />
        <x-form-input label="Email" name="email" type="text" value="{{ $user->email }}" />
        <x-form-input name="password" label="Password" type="password" />
        <x-form-input name="password_confirmation" label="Confirm password" type="password" />
        <x-form-select name="group_id" label="Select group" :options="$groups" :records="$user->group" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
