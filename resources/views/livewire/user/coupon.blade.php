<div>
    @if($couponInfo != null)
    <p class="paragraph" style="color: green;">{{ $couponInfo }}</p>
    @endif

    @if($cartItemsCount >0 && $cart->coupon == null)
    <div class="account-inner-form">
        <div class="review-form-name">
            <input wire:model="code" type="text" id="coupon" class="form-control" placeholder="Coupon Code" />
            <button wire:click="applyCoupon" type="button" class="shop-btn">Apply</button>
        </div>
    </div>
    @endif
</div>

@push('js')
<script>
  document.addEventListener('livewire:init', function () {
    Livewire.on('coupon-error', (event) => {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: event,
        showConfirmButton: false,
        timer: 1500
      });
    });
    
  });
  </script>
<script>
  document.addEventListener('livewire:init', function () {
    Livewire.on('coupon-success', (event) => {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: event,
        showConfirmButton: false,
        timer: 1500
      });
    });
    
  });
  </script>


@endpush