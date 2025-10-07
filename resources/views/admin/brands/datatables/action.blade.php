<a href ="{{ route("admin.brands.edit", $brand->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger  btn-delete" >
        Delete
    </button>
</form>
