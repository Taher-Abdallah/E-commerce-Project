  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('admin-assets')}}/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('admin-assets')}}/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
  <script src="{{asset('admin-assets')}}/vendors/js/charts/chartist-plugin-tooltip.min.js"
  type="text/javascript"></script>
  <script src="{{asset('admin-assets')}}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="{{asset('admin-assets')}}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="{{asset('admin-assets')}}/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('admin-assets')}}/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{asset('admin-assets')}}/js/core/app.js" type="text/javascript"></script>
  <script src="{{asset('admin-assets')}}/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('admin-assets')}}/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="//cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
                     {{-- file input  --}}
  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
  <script src="{{ asset('vendor/file-input/themes/fa5/theme.min.js') }}"> </script>
  <script>
    $(function() {
        $("#single-image").fileinput({
            theme: "fa5",
            allowedFileExtensions: ["jpg", "png", "gif"],
            allowedFileTypes: ["image"],
            MaxFileCount: 1,
            showUpload: false,
            enableResumableUpload: false,
        });
    });
  </script> 

                                                          {{-- sweet alert for Delete --}}
      <script>
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-delete')) {
        e.preventDefault(); // يمنع الفورم من الإرسال مباشرة
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
                form.submit(); // هنا الفورم يبعت الطلب بعد التأكيد
            }
        });
    }
});
</script>
