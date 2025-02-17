<!-- BEGIN: Vendor JS-->
<script>
    let assetsUrl = '{{ asset("app-assets/data") }}';
</script>
<script src="{{ asset("app-assets/vendors/js/vendors.min.js") }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/jszip.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/pdfmake.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/vfs_fonts.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/buttons.html5.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/tables/buttons.print.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/forms/icheck/icheck.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/forms/toggle/switchery.min.js") }}"></script>

<script src="{{ asset("app-assets/vendors/js/extensions/unslider-min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/timeline/horizontal-timeline.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/pickadate/picker.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/pickadate/picker.date.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/pickadate/picker.time.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/pickadate/legacy.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/pickers/daterange/daterangepicker.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/forms/select/select2.full.min.js") }}"></script>
<script src="{{ asset("app-assets/vendors/js/extensions/sweetalert2.all.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset("app-assets/js/core/app-menu.js") }}"></script>
<script src="{{ asset("app-assets/js/core/app.js") }}"></script>
<script src="{{ asset("app-assets/js/scripts/forms/select/form-select2.js") }}"></script>
<script src="{{ asset("app-assets/js/scripts/forms/checkbox-radio.js") }}"></script>
<!-- END: Theme JS-->
<script>
    function validateField(element, errorMessage) {
        if (!$(element).val()) {
            Swal.fire({
                title: 'Error',
                text: errorMessage,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
        return true;
    }

    function showConfirm(title, text) {
        return Swal.fire({
            title: title,
            text: text,
            type: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        })
    }

    function showSwal(icon, title, text) {
        return Swal.fire({
            type: icon,
            title: title,
            text: text
        })
    }

    function post_response(url, data, callback) {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                callback(response)
            },
            error: function(xhr, status, error) {
                // console.log(xhr, status, error);
                {{-- @if (app()->isLocal())
                    console.log(xhr.responseJSON);
                @else --}}
                response_message = xhr.responseJSON.message || 'Gagal melakukan request!';
                showSwal('error', 'Gagal!', response_message);
                $('.loading.show').removeClass('show');
                {{-- @endif --}}
            }
        });
    }

    function get_response(url, data, callback) {
        $.ajax({
            type: "GET",
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                callback(response)
            },
            error: function(xhr, status, error) {
                // console.log(xhr, status, error);
                @if (app()->isLocal())
                    console.log(xhr.responseJSON);
                @else
                    response_message = xhr.responseJSON.message || 'Gagal melakukan request!';
                    showSwal('error', 'Gagal!', response_message);
                @endif
            }
        });
    }
</script>
