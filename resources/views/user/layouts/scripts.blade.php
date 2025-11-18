    <script src="{{ asset('user-assets') }}/assets/js/jquery_3.7.1.min.js"></script>

    <script src="{{ asset('user-assets') }}/assets/js/bootstrap_5.3.2.bundle.min.js"></script>

    <script src="{{ asset('user-assets') }}/assets/js/nouislider.min.js"></script>

    <script src="{{ asset('user-assets') }}/assets/js/aos-3.0.0.js"></script>

    <script src="{{ asset('user-assets') }}/assets/js/swiper10-bundle.min.js"></script>

    <script src="{{ asset('user-assets') }}/assets/js/shopus.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       @livewireScripts  {{-- لو بتستخدم livewire --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
       // SweetAlert Delete Confirmation
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-delete')) {
            e.preventDefault();
            const form = e.target.closest('form');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });
</script>
