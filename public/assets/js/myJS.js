      function Create(element) {
          let base = this;
             $(document).on('click', '#createItem', function (ev) {
              ev.preventDefault();
              let form = $(this).closest("form")
              let data = [];
            //   $('.checkout-form', container).each(function () {
                  data = data.concat(form.serializeArray());
            //   });
              data.push({
                  name: '_token',
                  value: $('meta[name="csrf-token"]').attr('content')
              });
              element.disabled = true;   
  
              $.post(form.attr('action'), data, function (respon) {
                 
                  if (typeof respon === 'object') {

                      if (respon.force_redirect) {
                          window.location.href = respon.force_redirect;
                      } else {

                          document.getElementById("alert").innerHTML = respon.message.substring(0, respon.message
                              .length);

                          $('.toast').toast('show');


                        //   if ($('.form-message', form).length) {
                        //       $('.form-message', form).html(respon.message);
                        //   } else {
                        //       base.alert(respon);
                        //   }

                          form.trigger('hh_form_action_complete', [respon]);

                          if (form.hasClass('.has-reset')) {
                              form.get(0).reset();
                          }
                          if (respon.redirect) {
                              setTimeout(function () {
                                  window.location.href = respon.redirect;
                              }, 1000);
                          }

                          if (respon.reload) {
                              setTimeout(function () {
                                  window.location.reload();
                              }, 1000);
                          }
                      }
                      if (respon.need_login) {
                          $('a[data-target="#hh-login-modal"]', 'body').trigger('click');
                      }

                      if (respon.redirect) {
                          window.location.href = respon.redirect;
                      }
                      if (respon.redirect_form) {
                          $('body').append(respon.redirect_form);
                      }
                      if (respon.form_id) {
                          $(respon.form_id).find("script").each(function () {
                              eval($(this).text());
                          });
                      }
                  }

              }, 'json');

          });
      }

      function Delete(element) {
         
        let base = this;
            $(document).on('click', '.hh-link-action', function (ev) {


               
            let t = $(this),
                parent = t.closest(t.data('parent')),
                hasLoading = t.data('page-loading');
                 
    
                ev.preventDefault();

                let dataConfirm = t.data('confirm');
                if (dataConfirm == 'yes') {
                   
                  swal({
                    title: t.data('confirm-title'),
                    text: t.data('confirm-question'),
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    padding: '2em'
                }).then(function(result) {
                    if (result.value) {
                        let data = JSON.parse(t.attr('data-params'));
                        data['_token'] = $('meta[name="csrf-token"]').attr('content');
                        $.post(t.attr('data-action'), data, function (respon) {
           
                        if (typeof respon == 'object') {
                            document.getElementById("alert").innerHTML = respon.message.substring(0, respon.message
                                .length);

                            $('.toast').toast('show');

                            if (respon.redirect) {
                                setTimeout(function () {
                                    window.location.href = respon.redirect;
                                }, 1500);
                            }

                            if (respon.reload) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }
                        }
                    }, 'json');

                }
            });
        } else {

            ev.preventDefault();
            let data = JSON.parse(t.attr('data-params'));
            if (typeof data == 'object') {

                data['_token'] = $('meta[name="csrf-token"]').attr('content');
                data['type'] = t.data('type')
                $.post(t.attr('data-action'), data, function (respon) {

                    if (typeof respon == 'object') {

                        if (respon.action) {
                            $("#form-Item").attr("action", respon.action);
                        }

                        if (respon.action) {
                            $("#model").attr("value", respon.model);
                        }

                        if (respon.title) {
                            $(".modal-title").text(respon.title);
                            $("#type").text(respon.type);
                        }
                        var valueR = '';
                        $.each(respon.arrayItem, function (key, value) {
                            console.log(value);
                            if (respon.type == 'Show') {
                                valueR += `<div class="form-group">
                                <label>${window.translations.nameOfItem}</label>
                                <input type="${value.columnType}" class="form-control" disabled
                                 value="${value.ValueColumn}" name=" ${value.columnName}" 
                                 id="${value.columnName}">
                                   </div>`
                                $(".md-button").css("display", "none");
                            } else {
                                if (value.columnType == 'select') {

                                    valueR += `<select class="form-control form-control-sm" name="${value.columnName}">`
                                    $.each(value.options, function (key, option) {
                                        if (option.name == value.ValueColumn) {
                                            valueR += ` <option value="${option.id}" selected  >${option.name}</option>`
                                        } else {
                                            valueR += ` <option value="${option.id}"  >${option.name}</option>`
                                        }

                                    });
                                    `</select>`
                                } else {

                                    valueR += `<div class="form-group">
                                            <label>${window.translations.nameOfItem}</label>
                                            <input type="${value.columnType}" class="form-control"
                                             value="${value.ValueColumn}" name=" ${value.columnName}" 
                                             id="${value.columnName}">
                                             <input type="hidden" class="form-control"
                                             value="${value.IDColumn}" name="id" >
                                                 </div>`
                                }

                                $(".md-button").css("display", "block");
                            }
                        });
                        $('#widget-content-area').empty().append(valueR)

                        $('#Create').modal('show');

                        // base.alert(respon);
                        t.trigger('hh_link_action_completed', [respon]);

                        if (respon.redirect) {
                            setTimeout(function () {
                                window.location.href = respon.redirect;
                            }, 1500);
                        }

                        if ($(parent).length) {
                            $(parent).removeClass('is-doing');
                            if (t.attr('data-is-delete') == 'true') {
                                $(parent).addClass('is-deleted');
                                $(parent).one(whichTransitionEvent(), function () {
                                    $(parent).hide();
                                });
                            }
                        }
                        if (respon.reload) {
                            window.location.reload();
                        }
                    }
                    if (hasLoading && typeof hasLoading !== 'undefined') {
                        $('.hh-loading.page-loading').hide();
                    }
                }, 'json');

            } else {
                alert('Have a error when parse the data');
            }
        }

    });
}

$('.confirmDelete').on('click', function () {
    var id = $(this).data('id');
    var action = $(this).data('action');
    console.log(id);
    swal({
        title: window.translation.deletemodal1,
        text: window.translation.deletemodal2,
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: window.translation.cancle,
        confirmButtonText: window.translation.confirm,
        padding: '2em'
    }).then(function (result) {

        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: action + id,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data['status'] == '1') {
                        swal(
                            window.translation.deleted,
                            window.translation.success,
                            'success'
                        )
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
    })
});
$('.changestatus').on('click', function () {
    var id = $(this).data('id');
    var status = $(this).data('status');
    var fd = new FormData();
    fd.append('status', status);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/wallet/changeStatus/' + id,
        cache: false,
        data: fd,
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
$(".show-user").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/users/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(window.translation);
            const element = document.getElementById("exampleModal");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.userInfo + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.userName + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['name'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['phone'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.email + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['email'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.UserType + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['userType'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.nameactivities + '</label> <input id="basicExample" name="start_date"class="form-control flatpickr flatpickr-input active basicExample"type="text" value="' + data['userActivity'] + '"disabled> </div> </div> </div></div></div></div></div>');
            $('#exampleModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});

$(".edit-user").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/users/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            const element = document.getElementById("editModal");
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.userInfo + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.userName + '</label><input type="text" id="user_name"  class="form-control mb-4" value="' + data['name'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" id="user_phone" class="form-control mb-4" value="' + data['phone'] + '" > </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.email + '</label><input type="text" id="user_email"  class="form-control mb-4" value="' + data['email'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.UserType + '</label>' +
                '<select class="form-control" name="facility_type" id="facility_type">  </select>'
                + '</div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.nameactivities + '</label> ' +
                '<select class="form-control"  id="Activities_type">  </select>'
                + '</div> </div> </div></div><div class="modal-footer"><button type="button" id="edit_user" class="btn btn-primary">' + window.translation.save + '</button> </div></div></div></div>');
            var options_str = "", options_str2 = "";
            for (let index = 0; index < data['allType'].length; index++) {
                if (data['allType'][index]['name'] == data['userType']) {
                    options_str += '<option value="' + data['allType'][index]['id'] + '" selected>' + data['allType'][index]['name'] + '</option>';

                }
                else {
                    options_str += '<option value="' + data['allType'][index]['id'] + '" >' + data['allType'][index]['name'] + '</option>';

                }

            }
            for (let index = 0; index < data['allActivity'].length; index++) {
                if (data['allActivity'][index]['name'] == data['userActivity']) {
                    options_str2 += '<option value="' + data['allActivity'][index]['id'] + '" selected>' + data['allActivity'][index]['name'] + '</option>';

                }
                else {
                    options_str2 += '<option value="' + data['allActivity'][index]['id'] + '" >' + data['allActivity'][index]['name'] + '</option>';

                }

            }

            $('#facility_type').change(function () {
                document.getElementById('Activities_type').innerHTML = '';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "/activity/" + this.value,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        var options_str = "<option> </option>";
                        for (let index = 0; index < data.length; index++) {


                            options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';




                        }
                        document.getElementById("Activities_type").innerHTML = options_str;

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            document.getElementById('facility_type').innerHTML = options_str;
            document.getElementById('Activities_type').innerHTML = options_str2;
            $('#editModal').modal('show');
            $("#edit_user").click(function () {
                //console.log(111111);
                var fd = new FormData();
                fd.append('name', $("#user_name").val());
                fd.append('phone', $("#user_phone").val());
                fd.append('email', $("#user_email").val());
                fd.append('activitie_id', $("#Activities_type").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/users/edit/" + id,
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

        },
        error: function (data) {
            console.log(data);
        }
    });


});

$('#facility_type_c').change(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/activity/" + this.value,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var options_str = "<option> </option>";
            for (let index = 0; index < data.length; index++) {


                options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';




            }
            document.getElementById("Activities_type_c").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
});

$("#create_user").click(function () {

    var fd = new FormData();
    fd.append('name', $("#user-name").val());
    fd.append('phone', $("#user-phone").val());
    fd.append('email', $("#user-email").val());
    fd.append('activitie_id', $("#Activities_type_c").val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "/users/create",
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

$(".QuotesDetails").click(function () {
    var id = $(this).data('id');
    console.log(id);
    $("body").append(' <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.QuotesDetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body text-center">' +
        '<p>مقدم الطلب : شركة فرسان للمقاولات </p>'
        + '<button class="btn btn-outline-dark btn-rounded mt-2" style="padding:4px;">مشاهدة الملف الشخصي</button>'
        + '<div class="text-left mt-3 mr-2">'
        + '<p class="text-left mt-3">العنوان الرئيسي : الرياض المملكة العربية السعودية </p>'
        + '<p class="text-left mt-3">التصنيف : لا يوجد </p>'
        + '<p class="text-left mt-3">عدد المشاريع : (56) مشروع منجز </p>'
        + '<p class="text-left mt-3">عدد العملاء: 50 عميل  </p>'
        + '</div>'
        + '<p style="color:gray;">المشروع المقدم إليه</p>'
        + '<p style="color:blue;">مشروع الرياض اثاث </p>'
        + ' <div class="col-md-12"> <div class="form-group text-left"><label for="aboutBio">ملاحظات</label> <textarea id="aboutBio" class="form-control" name="description" rows="3"></textarea> </div></div>'
        + '</div><div class="modal-footer" style="display: initial;"><div class="row text-center"> <div class="col-md-6"><button type="button" id="edit_user" class="btn  btn-success btn-rounded">' + window.translation.Accepttheoffer + '</button></div><div class="col-md-6"><button type="button" id="edit_user" class="btn btn-danger btn-rounded">' + window.translation.offerrejected + '</button></div></div> </div></div></div></div></div>');
    $('#exampleModal').modal('show');

});
$('#send-Refund').click(function () {
    var fd = new FormData();
    fd.append('IBAN', $("[name='IBAN']").val());
    fd.append('amount', $("[name='amount']").val());
    fd.append('beneficiary', $("[name='beneficiary']").val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/wallet/sendRefund',
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
            else {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');

            }
            if (data['redirect'] != null) {
                setTimeout(function () {
                    location.replace(data['redirect'])
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });
});
$(".show-request").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/wallet/showRequest/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            const element = document.getElementById("ShowRequest");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="ShowRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.Refundetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.Membership + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['Membership_id'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.beneficiary + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['beneficiary'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.amount + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['amount'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.IBAN + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['IBAN'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.Createdat + '</label> <input id="basicExample" name="start_date"class="form-control flatpickr flatpickr-input active basicExample"type="text" value="' + data['created_at'] + '"disabled> </div> </div> </div></div></div></div></div>');
            $('#ShowRequest').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});