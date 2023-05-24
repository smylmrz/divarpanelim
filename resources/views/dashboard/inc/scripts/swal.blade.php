<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>

@if (session('success'))

    <script>
        swal({
            text: "{{session('success')}}",
            icon: "success",
            button: "OK"
        });
    </script>

@endif

@if (session('error'))

    <script>
        swal({
            text: "{{session('error')}}",
            icon: "error",
            button: "OK"
        });
    </script>

@endif
