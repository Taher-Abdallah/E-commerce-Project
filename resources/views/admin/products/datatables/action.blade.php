<a href ="{{ route("admin.products.edit", $product->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger  btn-delete" >
        Delete
    </button>
</form>
