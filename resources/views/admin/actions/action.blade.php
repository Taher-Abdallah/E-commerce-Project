<a href ="{{ route("admin.categories.edit", $category->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
        Delete
    </button>
</form>
