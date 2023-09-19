<div class="form-group mb-3">
    <label for={{ $name }} class="form-label">{{ $label }}</label>

    <select class="form-select2 form-select" multiple='multiple' id="{{ $name }}" name="{{ $name }}"
        aria-label="Default select example">
        @if ($options)

            @foreach ($options as $value)
                <option value="{{ $value->id }}"
                    @if (!empty($records)) @foreach ($records as $record)
                            @if ($record->id == $value->id)
                                selected @endif
                    @endforeach
            @endif

            >
            {{ $value->name }}
            </option>
        @endforeach
    @else
        <option selected disabled>No cinema</option>
        @endif
    </select>
    @error($name)
        <div style="color: red">{{ $message }}</div>
    @enderror
</div>
