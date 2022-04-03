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
              
              var fd = new FormData();
             var files = $(".file-upload")[0].files;
        
      
              for (var i = 0; i < files.length; i++) {
                  fd.append(i, $(".file-upload").get(0).files[i]);
                  data.push({
                    name: 'lolo',
                    value: $(".file-upload").get(0).files[i]
                });
    
              }

             
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
                               var valueR='';
                                $.each( respon.arrayItem, function( key, value ) {
                                    console.log(value);
                                    if (respon.type =='Show') {
                                        valueR +=`<div class="form-group">
                                <label>${ window.translations.nameOfItem }</label>
                                <input type="${ value.columnType }" class="form-control" disabled
                                 value="${ value.ValueColumn }" name=" ${ value.columnName }" 
                                 id="${ value.columnName }">
                                   </div>`  
                                   $(".md-button").css("display", "none");
                                    } else {
                                        if(value.columnType == 'select') {
                                          
                                          valueR +=  `<select class="form-control form-control-sm" name="${ value.columnName }">`
                                          $.each( value.options, function( key, option ) {
                                              if (option.name == value.ValueColumn) {
                                                valueR +=  ` <option value="${option.id}" selected  >${ option.name }</option>`
                                              } else {
                                                valueR +=  ` <option value="${option.id}"  >${ option.name }</option>`
                                              }
                                        
                                          });
                                    `</select>` 
                                        } else {
                                      
                                            valueR += `<div class="form-group">
                                            <label>${ window.translations.nameOfItem }</label>
                                            <input type="${ value.columnType }" class="form-control"
                                             value="${ value.ValueColumn }" name=" ${ value.columnName }" 
                                             id="${ value.columnName }">
                                             <input type="hidden" class="form-control"
                                             value="${ value.IDColumn }" name="id" >
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
        console.log(id);
        swal({
            title: window.translations.deletemodal1,
            text: window.translations.deletemodal2,
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: window.translations.cancle,
            confirmButtonText: window.translations.confirm,
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
                    url: "FileManger/delete-file/" + id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['status'] == '1') {
                            swal(
                                window.translations.deleted,
                                window.translations.success,
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