<div class="input-group">
    <input type="hidden" name="{{ $name }}Lama" value="{{ $url != "" ? basename($url) : "" }}">
    <input type="file" id="{{ $id }}_file" class="form-control my-file-input" name="{{ $name }}"
        accept="{{ $accept }}" style="display:none;">
    <input type="text" id="{{ $id }}_filename" class="form-control file-name"
        value="{{ $url != "" ? basename($url) : "" }}" placeholder="No file chosen" readonly>
    <div class="input-group-append">
        <label class="btn btn-primary choose-file-btn" id="{{ $id }}_button">{{ $label }}</label>
    </div>
    @if ($url != "")
        <div class="input-group-append">
            <label class="btn btn-secondary download-file-btn" id="{{ $id }}_download"
                data-url="{{ $url }}">Download</label>
        </div>
    @endif
</div>

@push("scripts")
    <script>
        $(document).ready(function() {
            $('.my-file-input').on('change', function() {
                var fileInput = $(this)[0];
                var fileName = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
                var fileNameInputId = fileInput.id.replace('_file', '_filename');
                $('#' + fileNameInputId).val(fileName);
            });

            $('#{{ $id }}_button').on('click', function() {
                var fileInputId = '{{ $id }}_file';
                $('#' + fileInputId).click();
            });

            $('#{{ $id }}_download').on('click', function() {
                var url = $(this).attr('data-url');
                if (url) {
                    window.open(url, '_blank');
                } else {
                    console.log('URL is not defined');
                }
            });
        });
    </script>
@endpush
