<a href ="{{ route("admin.attributes.edit", $attribute->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger  btn-delete" >
        Delete
    </button>
</form>
