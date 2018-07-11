jQuery(document).ready(function($) {
    $('input[name=file]').change(function() {
        var file_data = $('#upload-avatar').prop('files')[0];
        //khởi tạo đối tượng form data
        var form_data = new FormData();
        //thêm files vào trong form data
        form_data.append('file', file_data);
        //sử dụng ajax post
        let url = $('#input-user-url-upload').attr('data-url-upload-avatar');

        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            cache: false,
            processData:false,
            data: form_data,
        })
        .done(function(response) {
            console.log("success");
            window.location.reload();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    });
});
