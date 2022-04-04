jQuery(document).ready(function($) {
    "use strict";
    $('.dropify').dropify({
        messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });
});

document.querySelector('#UploadLogo').addEventListener('change', function () {
    if (this.files && this.files[0]) {
        var file = $('#UploadLogo').val();
        console.log(file);
        var fd = new FormData();
        fd.append('file', $('#UploadLogo').get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "update-your-avatar",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data['status'] == '1') {
                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                        .length);
                    $('.toast').toast('show');
                }
                if (data['reload']) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);

                }

            },
            error: function (data) {
                console.log(data);
            }
        });


    }
});
$("#updateProfile").click(function(){

    var fd = new FormData();
    fd.append('name', $("[name='name']").val());
    fd.append('description', $("[name='description']").val());
    fd.append('phone', $("[name='phone']").val());
    fd.append('email', $("[name='email']").val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "update-your-profile",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            if (data['reload']) {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });

  });