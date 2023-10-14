<div class="form-group mb-3">
    <label for={{ $name }} class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" value="{{ $value }}" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $label }}..." />
    @error($name)
        <div style="color: red">{{ $message }}</div>
    @enderror
</div>
