<a href ="{{ route("admin.sliders.edit", $slider->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger  btn-delete" >
        Delete
    </button>
</form>
