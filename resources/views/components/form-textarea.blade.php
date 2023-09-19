<div class="form-group mb-3">
    <label for={{ $name }} class="form-label">{{ $label }}</label>
    <textarea id="my-editor" name={{ $name }} class="form-control">{!! $content !!}</textarea>
    @error($name)
        <div style="color: red">{{ $message }}</div>
    @enderror
</div>
