<a href ="{{ route("admin.coupons.edit", $coupon->id) }}" class="btn btn-primary">Edit</a>

<form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display:inline-block;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger  btn-delete" >
        Delete
    </button>
</form>
