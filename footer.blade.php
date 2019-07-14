<!-- Javascript -->
<script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/pace/pace.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chart-js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/scripts/klorofilpro-common.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/sweetalert2/sweetalert2.js') }}"></script>



<script>
    $(function()
    {
        /*-----------------------------------/
        /*	DATE PICKER
        /*----------------------------------*/
        $('.inline-datepicker').datepicker({
            todayHighlight: true
        });

        // Sweet alert

        @if(session('errorMsg'))

            swal(
                'Error!',
                '{{ session('errorMsg') }}',
                'error'
            ).catch(swal.noop);

        @endif

        @if(session('successMsg'))

            swal(
                'Success!',
                '{{ session('successMsg') }}',
                'success'
            ).catch(swal.noop);

        @endif
    });
</script>

<script>
    $(function()
    {
        $('.select-basic').select2();
        $('.select-multiple-basic').select2();
        $('#select-placeholder-single').select2(
            {
                placeholder: 'Select a state',
                allowClear: true
            });
        $('#select-placeholder-multiple').select2(
            {
                placeholder: 'Select a state'
            });
        $('#select-tag').select2(
            {
                tags: true
            });
        $('#select-tag-token').select2(
            {
                tags: true,
                tokenSeparators: [',', ' ']
            });

        /*-----------------------------------/
         /*	DATE PICKER
         /*----------------------------------*/
        $('.inline-datepicker').datepicker(
                {
                    todayHighlight: true
                });

        /*-----------------------------------/
         /*	BOOTSTRAP CLOCK PICKER
         /*----------------------------------*/
        $('.basic-clockpicker').clockpicker(
                {
                    donetext: 'DONE',
                });
        var input = $('#single-input').clockpicker(
                {
                    placement: 'top',
                    autoclose: true,
                    'default': 'now'
                });
        $('#check-minutes').click(function(e)
        {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
    });
</script>





<script>
    $(document).on('click','#test',function () {
        $('#myID').val($(this).data('id'));
    })
</script>

