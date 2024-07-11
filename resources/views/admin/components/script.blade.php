<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('admindash/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admindash/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admindash/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('admindash/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('admindash/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admindash/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admindash/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admindash/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admindash/assets/js/misc.js') }}"></script>
<script src="{{ asset('admindash/assets/js/settings.js') }}"></script>
<script src="{{ asset('admindash/assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('admindash/assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->

<!-- Toaster Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
@if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.options.timeOut = 10000;
            toastr.info("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':
            toastr.options.timeOut = 10000;
            toastr.success("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'warning':
            toastr.options.timeOut = 10000;
            toastr.warning("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'error':
            toastr.options.timeOut = 10000;
            toastr.error("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
    }
@endif
</script>
