@extends("admin.template.layout")

@section("header")
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin-assets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin-assets/plugins/table/datatable/custom_dt_customer.css">
@stop


@section("content")

<style>
    #example2_info{
        display: none
    }
</style>
<div class="card mb-5">
   
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-condensed table-striped" id="example2">
            <thead>
                <tr>
                <th>#</th>
                <th>Outlet Details</th>
                <th>Active</th>
                <th>Email Verified</th>
                <th>Updated</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($datamain as $datarow) 
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span>
                                    @if(!empty($datarow->image))
                                    <img src="{{get_uploaded_image_url($datarow->image,'user_image_upload_dir')}}" style="width:60px;height:60px;object-fit:cover;" class="rounded-circle" alt="User">
                                    @endif
                                </span>
                                <span class="ml-3">
                                    <a href="#" class="yellow-color">{{$datarow->name}}</a>
                                    <div>{{$datarow->email}}</div>
                                    <div>{{'+'.str_replace("+","",$datarow->dial_code.' '.$datarow->phone)}}</div>
                                </span>
                            </div>
                        </td>
                        
                        <td>
                            <label class="switch s-icons s-outline  s-outline-warning mb-2 mt-2 mr-2">
                                        <input type="checkbox" class="change_status" data-id="{{ $datarow->id }}"
                                            data-url="{{ url('admin/provider/change_status') }}"
                                            @if ($datarow->active) checked @endif>
                                        <span class="slider round"></span>
                            </label>
                        </td>
                        <td>{{$datarow->email_verified == 1 ? 'Verified' : 'Not verified';}}</td>
                        <td>{{web_date_in_timezone($datarow->updated_at,'d-M-Y h:i A')}}</td>
                        <td class="text-center">
                            <div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="flaticon-dot-three"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink7">
                                    @if(check_permission('outlet','Edit'))
                                    <a class="dropdown-item" href="{{url('admin/provider/view/'.$datarow->id)}}"><i class="flaticon-pencil-1"></i> View</a>
                                    @endif
                                    
                                  
                                   
                                    @if(check_permission('outlet','Delete'))
                                    <a class="dropdown-item" data-role="unlink"
                                    data-message="Do you want to remove this registration?"
                                    href="{{ url('admin/provider/delete/' . $datarow->id) }}"><i
                                        class="flaticon-delete-1"></i> Delete</a>
                                    @endif


                                  
                                   
                                    
                                </div>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@stop

@section("script")
<script src="{{asset('')}}admin-assets/plugins/table/datatable/datatables.js"></script>
<script>
$('#example2').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    </script>
    <script>
        App.initFormView();
        $('body').off('submit', '#admin-form');
        $('body').on('submit', '#admin-form', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = new FormData(this);
            $(".invalid-feedback").remove();

            App.loading(true);
            $form.find('button[type="submit"]')
                .text('Saving')
                .attr('disabled', true);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: $form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                timeout: 600000,
                success: function(res) {
                    App.loading(false);

                    if (res['status'] == 0) {
                        if (typeof res['errors'] !== 'undefined') {
                            var error_def = $.Deferred();
                            var error_index = 0;
                            jQuery.each(res['errors'], function(e_field, e_message) {
                                if (e_message != '') {
                                    $('[name="' + e_field + '"]').eq(0).addClass('is-invalid');
                                    $('<div class="invalid-feedback">' + e_message + '</div>')
                                        .insertAfter($('[name="' + e_field + '"]').eq(0));
                                    if (error_index == 0) {
                                        error_def.resolve();
                                    }
                                    error_index++;
                                }
                            });
                            error_def.done(function() {
                                var error = $form.find('.is-invalid').eq(0);
                                $('html, body').animate({
                                    scrollTop: (error.offset().top - 100),
                                }, 500);
                            });
                        } else {
                            var m = res['message'];
                            App.alert(m, 'Oops!');
                        }
                    } else {
                        App.alert(res['message']);
                        setTimeout(function() {
                            window.location.href = App.siteUrl('/admin/customers');
                        }, 1500);
                    }

                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                },
                error: function(e) {
                    App.loading(false);
                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                    App.alert(e.responseText, 'Oops!');
                }
            });
        });


    </script>
@stop