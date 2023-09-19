<form action={{ route($module . '.destroy', $value) }} method="post" class="d-inline-block">
    @method('delete')
    @csrf
    <button onclick="return confirm('Do you want delete ?')" class="btn btn-danger">Delete</button>
</form>
