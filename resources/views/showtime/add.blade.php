@extends('adminlte::page')
@section('title', 'showtime')
@section('content_header')
    <h1>Add showtime</h1>
@stop
@section('content')
    <form method="post" action="{{ route('showtime.store') }}" autocomplete="off">
        @csrf
        <x-form-input name="slug" label="Slug" :value="old('slug')" type="text" />
        <x-form-select label="Movie" name="movie_id" :options="$movies" />
        <div class="form-group mb-3">
            <label class="form-label">Room</label>
            <select class="form-select" id="" name="room_id" aria-label="Default select example">
                @if ($rooms->count() > 0)
                    @foreach ($rooms as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->cinema->name }}</option>
                    @endforeach
                @else
                    <option value="0">No rooms</option>
                @endif
            </select>
            @error('room_id')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="startTime">Start time</label>
                <input id="startTime" type="text" class="form-control" name="start_time" value="{{ old('start_time') }}"
                    autocomplete="off">
                @error('start_time')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="endTime">End time</label>
                <input id="endTime" type="text" class="form-control" name="end_time" value="{{ old('end_time') }}"
                    autocomplete="off">
                @error('end_time')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

@push('js')
    <script>
        jQuery('#startTime').datetimepicker({
            step: 30,
            theme: "dark"
        });
        jQuery('#endTime').datetimepicker({
            step: 30,
            theme: "dark"
        });
    </script>
@endpush
