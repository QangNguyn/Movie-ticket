@extends('adminlte::page')
@section('title', 'add new user')
@section('content_header')
    <h1>Add new user</h1>
@stop
@section('content')
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <x-form-input name="name" label="Name" :value="old('name')" type="text" />
        <x-form-input name="email" label="Email" :value="old('email')" type="text" />
        <x-form-input name="password" label="Password" type="password" />
        <x-form-input name="password_confirmation" label="Confirm password" type="password" />
        <x-form-select name="group_id" label="Select group" :options="$groups" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
