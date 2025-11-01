<a href ="{{ route("admin.users.edit", $user->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger  btn-delete" >
        Delete
    </button>
</form>
