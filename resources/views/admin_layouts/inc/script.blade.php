<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/assets/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('backend/assets/demo/chart-bar-demo.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js" crossorigin="anonymous"></script>
<script src="{{asset('backend/assets/demo/datatables-demo.js')}}"></script>
<!-- <script>
        @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script> -->
<!-- <script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script> -->

<script>
    $().ready(()=>{
        $('#example1').dataTable({
            "columnDefs": [{
                "targets": [4,5],
                "orderable": false
            }],
            dom: 'lBfrtip',
        buttons: [
            {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0,1,2]
                    }

                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                }
            
        ]
        })
    })
</script>
<!-- <script>

    $(document).ready(function() {
        $('#example1').DataTable( {
            "columnDefs": [{
                "targets": [4,5],
                "orderable": false
            }],

            dom: 'lBfrtip',
            // dom: 'frtipB',
            buttons: [
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0,1,2]
                    }

                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                }
            ]
           /* buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]*/
        } );
    } );

</script> -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#imgInp').on('change', function() {
            imagesPreview(this, 'div.blah');
        });
    });
</script>
