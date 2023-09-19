<div class="input-group">
    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
    </a>
    </span>
    <input id="thumbnail" type="hidden" value="{{ $value }}" class="form-control" name="{{ $name }}"
        type="text">
</div>
<div id="holder" style="margin:15px 0px;">
    @if ($value)
        <img src="{{ $value }}" alt="">
    @endif

</div>
@error($name)
    <div style="color: red">{{ $message }}</div>
@enderror
