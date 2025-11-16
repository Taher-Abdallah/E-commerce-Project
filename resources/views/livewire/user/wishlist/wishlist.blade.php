<div>
@if(!$inWishlist)
    <div class="wishlist">
        <a href="javascript:void(0);" wire:click.prevent="addProductToWishlist({{ $product->id }})" class="wishlist-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17 1C14.9 1 13.1 2.1 12 3.7C10.9 2.1 9.1 1 7 1C3.7 1 1 3.7 1 7C1 13 12 22 12 22C12 22 23 13 23 7C23 3.7 20.3 1 17 1Z"
                    stroke="#797979" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
            </svg>
    </div>
</a>

@else
    <div class="wishlist">
        <a href="javascript:void(0);" wire:click.prevent="removeProductFromWishlist({{ $product->id }})" class="wishlist-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17 1C14.9 1 13.1 2.1 12 3.7C10.9 2.1 9.1 1 7 1C3.7 1 1 3.7 1 7C1 13 12 22 12 22C12 22 23 13 23 7C23 3.7 20.3 1 17 1Z"
                    stroke="Red" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
            </svg>
    </div>
</a>
@endif

</div>

@script
<script>
    
    $wire.on('wishlist-added', event => {
        Swal.fire({
            icon: 'success',
            title: 'Product Added to wishlist',
            showConfirmButton: false,
            timer: 1500
        })
    });

    $wire.on('wishlist-removed', event => {
        Swal.fire({
            icon: 'success',
            title: 'Product Removed from wishlist',
            showConfirmButton: false,
            timer: 1500
        })
    });
</script>
@endscript

{{-- @push('js')
<script>
  document.addEventListener('livewire:init', function () {
    Livewire.on('wishlist-added', (event) => {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: event,
        text: 'Message Deleted Successfully',
        showConfirmButton: false,
        timer: 1500
      });
    });
    
  });
  </script>

  <script>
  document.addEventListener('livewire:init', function () {
    Livewire.on('wishlist-removed', (event) => {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: event,
        text: 'Message Sent Successfully',
        showConfirmButton: false,
        timer: 1500
      });
    });
    
  });
  </script>
@endpush --}}