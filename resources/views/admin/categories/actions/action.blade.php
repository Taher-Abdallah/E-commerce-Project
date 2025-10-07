<a href ="{{ route("admin.categories.edit", $category->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-delete">
        Delete
    </button>
</form>

