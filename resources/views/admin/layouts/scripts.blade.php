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
    {{--  تحميل صوره --}}
<script>
    $(function() {
        $("#single-image").fileinput({
            theme: "fa5",
            allowedFileExtensions: ["jpg", "png", "gif"],
            allowedFileTypes: ["image"],
            maxFileCount: 1,
            showUpload: false,
            showRemove: true,
            showClose: true,
            overwriteInitial: true
        });
    });
</script>


   {{-- single image edit --}}
    {{-- <script>
    $(function() {
        $("#single-image-edit").fileinput({
            theme: "fa5",
            allowedFileExtensions: ["jpg", "png", "gif"],
            allowedFileTypes: ["image"],
            MaxFileCount: 1,
            showUpload: false,
            enableResumableUpload: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('storage/brands/' . $brand->logo) }}"
            ],
        });
    });
  </script> --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


                                      {{-- تحميل عده صور --}}

  <script>
    $(function() {
        $("#multiple-image").fileinput({
            theme: "fa5",
            allowedFileExtensions: ["jpg", "png", "gif"],
            allowedFileTypes: ["image"],
            maxFileCount: 5,
            showUpload: false,
            showRemove: true,
            showClose: true,
            overwriteInitial: false,
            initialPreviewAsData: true,
            showDelete: true,
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.3/js/plugins/piexif.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.3/js/plugins/sortable.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.3/js/fileinput.min.js"></script>

 {{-- Data tables CDN  --}}
 <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

 {{-- Col And Raw Reorder Datatables CDN --}}
 <script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js"></script>
 <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js"></script>

 {{-- Select Dtatables CDN --}}
 <link rel="stylesheet" href="https://cdn.datatables.net/select/2.1.0/css/select.dataTables.min.css">
 {{-- Responsive CDN --}}
 <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"></script>

 {{-- button cdn js --}}
 <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.min.js"></script>

 <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
 <script src="{{ asset('vendor/datatables/excel/jszip.min.js') }}"></script>

 {{-- Pdf datatables --}}
 <script src="{{ asset('vendor/datatables/pdf/pdfmake.min.js') }}"></script>
 <script src="{{ asset('vendor/datatables/pdf/vfs_fonts.js') }}"></script>

 {{-- Select Dtatables CDN --}}
 <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.min.js"></script>

 {{-- Fixed Header Datatables --}}
 <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js"></script>
 <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js"></script>

 {{-- Scroller Datatables CDN --}}
 <script src="https://cdn.datatables.net/scroller/2.4.3/js/dataTables.scroller.min.js"></script>
 {{-- End Datatables CDN --}}


 {{-- fileinput --}}

  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
  <script src="{{ asset('vendor/file-input/themes/fa5/theme.min.js') }}"> </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.3/themes/fa5/theme.min.js"></script>
