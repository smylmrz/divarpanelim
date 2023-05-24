<script src="{{asset('admin/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin/js/init/datatables-init.js')}}"></script>
<script type="text/javascript">
    $(document).ready(
        function() {
            $('#bootstrap-data-table').DataTable();
            $('#bootstrap-data-table2').DataTable();
            $('.bootstrap-data-table').DataTable();
        }
    );
</script>
