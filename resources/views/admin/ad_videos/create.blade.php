@extends('admin.template.layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')
    <div class="card mb-5">
        <div class="card-body">


            <form method="post" id="admin-form" action="{{ url('admin/videos') }}" enctype="multipart/form-data"
                data-parsley-validate="true">
                <div class="row">
                    <input type="hidden" name="id"
                        value="{{ empty($datamain->id) ? '' : $datamain->id }}">
                    @csrf() 

                    <div class="col-md-6 form-group">
                        <label>Outlet<b class="text-danger">*</b></label>
                        <select name="outlet_id" class="form-control" required
                            data-parsley-required-message="Select Outlet" id="outlet_id">
                            <option value="">Select</option>
                            @foreach ($outlets as $data)
                                <option  value="{{ $data->id }}"
                                    @if (!empty($datamain->vendor_id)) {{ $datamain->vendor_id == $data->id ? 'selected' : null }} @endif>
                                    {{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Video Title</label>
                        <input type="text" name="video_title" id="video_title" class="form-control" value="@if ( isset($datamain) &&  !empty($datamain)){{$datamain->video_title}}@endif">
                    </div>
                    <div class="col-md-6 form-group" style="display:none;">
                        <label>Video<b class="text-danger">*</b></label>
                        <select class="form-control" name="video_type" id="video_type" >
                            <option value="0" @if ( isset($datamain) &&  $datamain->video_type ==0 ) @endif >Video Link</option>
                            <option value="1" @if ( isset($datamain) &&  $datamain->video_type ==1 )  @endif selected >Video File</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group linkpart" style="display:none;" style="@if ( isset($datamain) &&  $datamain->video_type ==1 ) {{'display:none'}}@else{{'display:block'}}@endif">
                        <label>Video Link</label>
                       <input type="text" name="video_link" id="video_link" class="form-control" value="@if ( isset($datamain) &&  $datamain->video_type ==0 ){{$datamain->video}}@endif">
                    </div>
                     <div class="col-md-6 form-group" style="@if ( isset($datamain) &&  $datamain->video_type ==1 ) @else @endif">
                        <label>Video File</label>
                       <input type="file" name="video_file" id="video_file" accept="video/mp4,video/x-m4v,video/*">
                       @if ( isset($datamain) &&  $datamain->video_type ==1 )
                       <a href="{{get_uploaded_url_cdn($datamain->video,'video_upload_dir')}}" target="blank">View</a>
                       @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select name="active" class="form-control">
                            <option
                                @if (!empty($datamain->active)) {{ $datamain->active == 1 ? 'selected' : null }} @endif
                                value="1">Active</option>
                            <option
                                @if (isset($datamain->active)) {{ $datamain->active == 0 ? 'selected' : null }} @endif
                                value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="row mt-5">


                    <div class="col-md-6 form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

            <div class="col-xs-12 col-sm-6">

            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        App.initFormView();
        $(document).ready(function() {
            $('.select2').select2();

        });
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
                            $('.invalid-feedback').show();
                        } else {
                            var m = res['message'];
                            App.alert(m, 'Oops!');
                        }
                    } else {
                        App.alert(res['message']);
                        setTimeout(function() {
                            window.location.href = App.siteUrl('/admin/videos');
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
        $(".datepicker").datepicker({
            minDate: 0
        });
        $(document).delegate("#applies_to", "change", function() {
            $(".applies_to_select").css("display", "none");
            var show = $('option:selected', this).attr('data-show');
            $(show).css("display", "block");
        });

        $('#applies_to').trigger('change');;
        $(document).on('change','#outlet_id',function(){
            var catid =  $('option:selected', this).attr('catid');; 
            $("#category_ids").val(catid).change();
        });
        $('.add_documents').on('click',function(){
            var total_doc = $('#total_doc').val();
            total_doc++;
            $('#total_doc').val(total_doc);
            $('.more_documents').append('<div class="doc'+total_doc+'"><input type="file" name="other_document[]" data-role="file-image"'+
                                        'data-preview="logo-preview'+total_doc+'" ><img id="logo-preview'+total_doc+'" class="img-thumbnail w-50"'+
                                    'style="margin-left: 5px; height:75px; width:75px !important;"'+
                                     'src="" ><a href="javascript:void(0)" class="remove_document" flname="'+total_doc+'"><i class="flaticon-delete-1"></i></a></div>');
        });
        $('.delete_document').on('click',function(){
            var flname  = $(this).attr('flname');
            var kl = $(this).attr('kl');
            App.confirm('Confirm Delete', 'Are you sure that you want to delete this record?', function() {
             $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{url("admin/delete_coupon_document")}}',
                data: {
                    '_token':'{{csrf_token()}}',
                   'flname' : flname,
                   'id'     : '{{ empty($datamain->coupon_id) ? '' : $datamain->coupon_id }}' 
                },               
                dataType: 'json',
                
                success: function(res) {
                    $('.documents'+kl).remove();
                }
            });
              });
        })
        $(document).on('click','.remove_document',function(){
            var flname = $(this).attr('flname');
            App.confirm('Confirm Delete', 'Are you sure that you want to delete this record?', function() {
            $('.doc'+flname).remove();
            });
        });
        $('#video_type').on('change',function(){
            if($(this).val() =='0') {
                $('.linkpart').show();
                $('.filepart').hide();
            } else {
                $('.linkpart').hide();
                $('.filepart').show();
            }
        })
    </script>
@stop
