<script>
    $(document).on('click','.btn-delete',function (e) {
        e.preventDefault()

        swal({
            title: "Diqqət",
            text: "Bu məlumatı silmək istədiyinizə əminsiniz?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = $(this).data('href');
                }
            });
    });



</script>
