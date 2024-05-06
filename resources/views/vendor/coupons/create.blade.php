@extends('vendor.template.layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')
    <div class="card mb-5">
        <div class="card-body">


            <form method="post" id="admin-form" action="{{ url('vendor/coupons') }}" enctype="multipart/form-data"
                data-parsley-validate="true">
                <div class="row">
                    <input type="hidden" name="id"
                        value="{{ empty($datamain->coupon_id) ? '' : $datamain->coupon_id }}">
                    @csrf()
                    
                    <div class="col-md-6 form-group applies_to_select {{ empty($datamain->coupon_id) ? 'd-none' : '' }}" style="display:none;" id="browse_category">
                        <label>Category<b class="text-danger">*</b></label>
                        <select class="form-control jqv-input product_catd select2" data-jqv-required="true"
                            name="category_ids[]" data-role="select2" data-placeholder="Select Categories"
                            data-allow-clear="true" id="category_ids">
                            <option value="">Select</option>
                            @foreach ($categories as $key => $val)
                                <option value="<?php echo $val->id; ?>" <?php echo in_array($val->id, $category_ids) ? 'selected' : ''; ?> <?php if(empty($category_ids)){ echo 'selected'; } ?>>
                                    <?php echo str_repeat('&nbsp;', 4) . $val->name; ?>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group" style="display:none;">
                        <label>Voucher Code<b class="text-danger">*</b></label>
                        <input type="text" name="coupone_code" class="form-control" 
                            data-parsley-required-message="Enter Voucher Code"
                            value="{{ empty($datamain->coupon_code) ? '' : $datamain->coupon_code }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Voucher Title<b class="text-danger">*</b></label>
                        <input type="text" name="title" class="form-control" required
                            data-parsley-required-message="Enter Voucher Title"
                            value="{{ empty($datamain->coupon_title) ? '' : $datamain->coupon_title }}">
                    </div>
                    
                    <div class="col-md-2 form-group">
                        <label>Type<b class="text-danger">*</b></label>
                        <select name="amount_type" class="form-control" id="amount_type_id" required
                            data-parsley-required-message="Select Coupon Type">
                            @foreach ($amounttype as $data)
                                <option value="{{ $data->id }}"
                                    @if (!empty($datamain->amount_type)) {{ $datamain->amount_type == $data->id ? 'selected' : null }} @endif>
                                    {{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <div id="discountfield">
                        <label>Discount<b class="text-danger"></b></label>
                        <input type="text" name="coupone_amount" class="form-control" 
                            data-parsley-required-message="Enter Coupon Amount" maxlength="5"
                            value="{{ empty($datamain->coupon_amount) ? '' : $datamain->coupon_amount }}"
                            data-parsley-type="number"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Usage limit per person</label>
                        <input type="text" name="coupon_usage_peruser" class="form-control" maxlength="5"
                            value="{{ empty($datamain->coupon_usage_peruser) ? '' : $datamain->coupon_usage_peruser }}" data-parsley-type="number">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Coupon amount<b class="text-danger">*</b></label>
                        <input type="text" name="coupon_price" oninput="validateNumber(this);" required class="form-control" maxlength="5"
                            value="{{ empty($datamain->coupon_price) ? '' : $datamain->coupon_price }}" data-parsley-type="number">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Saved amount<b class="text-danger">*</b></label>
                        <input type="text" name="saved_price" oninput="validateNumber(this);" required class="form-control" maxlength="5"
                            value="{{ empty($datamain->saved_price) ? '' : $datamain->saved_price }}" data-parsley-type="number">
                    </div>


                    <div class="col-md-12 form-group">
                        <label>Description<b class="text-danger">*</b></label>
                        <textarea name="description"class="form-control description editor" required
                            data-parsley-required-message="Enter Description">{{ empty($datamain->coupon_description) ? '' : $datamain->coupon_description }}</textarea>
                        <!--<input type="text" name="description" class="form-control" required-->
                        <!--    data-parsley-required-message="Enter Description"-->
                        <!--    value="{{ empty($datamain->coupon_description) ? '' : $datamain->coupon_description }}">-->
                    </div>
                    <div class="col-md-6 form-group">

                        <label>Start date <span style="color:red;">*<span></span></span></label>
                        <input type="text" class="form-control flatpickr-input" data-date-format="Y-m-d"
                            name="startdate"
                            value="{{ empty($datamain->start_date) ? '' : date('Y-m-d', strtotime($datamain->start_date)) }}"
                            required data-parsley-required-message="Select Start date" minDate="0" data-parsley-daterangevalidation data-parsley-daterangevalidation-requirement="#date_input_2">

                    </div>


                    <div class="col-md-6 form-group">

                        <label>Expiry date <span style="color:red;">*<span></span></span></label>
                        <input type="text" class="form-control flatpickr-input" data-date-format="Y-m-d"
                            name="expirydate" id="date_input_2"
                            value="{{ empty($datamain->coupon_end_date) ? '' : date('Y-m-d', strtotime($datamain->coupon_end_date)) }}"
                            required data-parsley-required-message="Select Expiry date">

                    </div>

                    

                    
                    <div class="col-md-6 form-group" style="display:none;">
                        <label>Minimum  Amount</label>
                        <input type="text" name="minimum_amount" class="form-control" maxlength="5"
                            value="{{ empty($datamain->minimum_amount) ? '' : $datamain->minimum_amount }}" data-parsley-type="number">
                    </div>
                    
                    <div class="col-md-6 form-group">
                        <label>Usage limit per voucher</label>
                        <input type="text" name="coupon_usage_percoupon" class="form-control" maxlength="5"
                            value="{{ empty($datamain->coupon_usage_percoupon) ? '' : $datamain->coupon_usage_percoupon }}" data-parsley-type="number">
                    </div>
                    
                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select name="active" class="form-control">
                            <option 
                                @if (isset($datamain->coupon_status)) {{ $datamain->coupon_status == 0 ? 'selected' : null }} @endif
                                value="0">Inactive</option>
                            <option
                                @if (!empty($datamain->coupon_status)) {{ $datamain->coupon_status == 1 ? 'selected' : null }} @endif
                                value="1">Active</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="display:none;">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Upload  Image (gif,jpg,png,jpeg) @if(!isset($datamain))<span
                                            style="color:red;">*<span></span></span>@endif</label>
                                    <input type="file" class="form-control jqv-input" name="image" data-role="file-image"
                                        data-preview="logo-preview" value="" @if(!isset($datamain)) 
                                        data-parsley-required-message="image is required" @endif
                                        data-parsley-imagedimensionssss="200x200" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg"
                                        data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" accept="image/*">
                                 
                                </div>
                                <img id="logo-preview" class="img-thumbnail w-50"
                                    style="margin-left: 5px; height:75px; width:75px !important;"
                                     src="@if(isset($datamain) && $datamain->image){{$datamain->image}}@else{{ asset('admin-assets/assets/img/placeholder.jpg') }}@endif" >
                            </div>
                        </div>
                    <div class="col-sm-6 col-xs-12">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Upload Terms & Conditions (gif,jpg,png,jpeg,pdf) @if(!isset($datamain))<span
                                            style="color:red;">*<span></span></span>@endif @if(!empty($datamain->policy))<a href="{{$datamain->policy}}" target="_blank"><b><font color="blue">View File</font></b></a>@endif</label>
                                    <input type="file" class="form-control jqv-input" name="policy" data-role="file-image"
                                        data-preview="policy-preview" value="" @if(!isset($datamain)) required
                                        data-parsley-required-message="image is required" @endif
                                        data-parsley-imagedimensionssss="200x200" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg,pdf"
                                        data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" accept="image/*,.pdf">
                                 
                                </div>

                                <!--<img id="policy-preview" class="img-thumbnail w-50"-->
                                <!--    style="margin-left: 5px; height:75px; width:75px !important;"-->
                                <!--     src="@if(isset($datamain) && $datamain->policy){{$datamain->policy}}@else{{ asset('admin-assets/assets/img/placeholder.jpg') }}@endif" >-->
                            </div>
                        </div>
                        <!--<label><strong>Voucher Unlock Videos (It is under owner control to Activate the video)</strong></label>-->
                        <div class="col-sm-12 col-xs-12" style="display:none;">
                            <div class="form-group d-flex align-items-center">                                
                                
                                @php $selectedVieos = []; @endphp
                                @if(isset($datamain))
                                    @php  $selectedVieos = array_column($datamain->videos->toArray(),'video_id') 
                                    @endphp
                                @endif
                               
                                <select name="videos[]"  class="form-control select2" id="videos" multiple>
                                   @foreach($videos as $ech)
                                   <option value="{{$ech->id}}" @if(in_array($ech->id,$selectedVieos)) {{'selected'}} @endif>{{$ech->video_title}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12 more_documents d-none">
                            <a href="javascript:void(0)" class="add_documents btn btn-primary" >Add Other documents</a>
                            @if(isset($datamain) && !empty($datamain->other_documents)) 
                            @php $other_document = explode(",",$datamain->other_documents); @endphp

                                @foreach($other_document as $kl=> $ech)
                                <div class="documents{{$kl}}">
                                    <img id="policy-preview" class="img-thumbnail w-50"
                                    style="margin-left: 5px; height:75px; width:75px !important;"
                                     src="{{get_uploaded_image_url($ech,'coupon_upload_dir')}}" >
                                     <a href="javascript:void(0)" class="delete_document" kl="{{$kl}}" flname="{{$ech}}"><i class="flaticon-delete-1"></i></a>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <input type="hidden" name="total_doc" id="total_doc" value="0">
                     <div class="col-md-12 form-group  imgs-wrap">
                            <div class="top-bar">
                            <label class="badge bg-dark text-white d-flex justify-content-between align-items-center">Images<button class="btn btn-button-7 pull-right" type="button" data-role="add-imgs" style="width: 40px;   height: 40px;   border-radius: 0;"><i class="flaticon-plus-1"></i></button> </label>
                            </div>
                            <input type="hidden" id="imgs_counter" value="0">
                            @if(!empty($datamain->coupon_id))
                            <div class="row">
                                @foreach ($datamain->images as $img)
                                <div class="col-md-3 img-wrap">
                                    <span class="close" title="Delete" data-role="unlink"
                                        data-message="Do you want to remove this image?"
                                        href="{{ url('admin/coupons/delete_image/' . $img->id) }}">&times;</span>
                                    <img style="width:205px; height:109px;" class="img-responsive" src="{{ asset('storage/coupons/'.$img->coupon_banner) }}">
                                </div>
                                @endforeach

                            </div>
                            @endif
                            <div id="imgs-holder" class="row mt-3"></div>
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
    <script src="{{ asset('admin-assets/plugins/editors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/editors/tinymce/editor_tinymce.js') }}"></script>
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
                        } else {
                            var m = res['message'];
                            App.alert(m, 'Oops!');
                        }
                    } else {
                        App.alert(res['message']);
                        setTimeout(function() {
                            window.location.href = App.siteUrl('/vendor/coupons');
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
            var outlet_id = $(this).val();
            var catid =  $('option:selected', this).attr('catid');; 
            $("#category_ids").val(catid).change();
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{url("admin/get_video_by_outlet")}}',
                data: {
                    '_token':'{{csrf_token()}}',
                   'outlet_id' : outlet_id,
                   
                },               
                dataType: 'json',
                
                success: function(res) {
                     var html = "";
                    for (var i = 0; i < res['o_data'].length; i++) {
                        html += '<option value="' + res['o_data'][i]['id'] + '">' + res[
                            'o_data'][i]['video_title'] + '</option>';
                        
                    }  
                    $('#videos').html(html);
                }
            });
        });
        $('.add_documents').on('click',function(){
            var total_doc = $('#total_doc').val();
            total_doc++;
            $('#total_doc').val(total_doc);
            var def = '{{asset("/admin-assets/assets/img/placeholder.jpg")}}';
            $('.more_documents').append('<div class="doc'+total_doc+'"><input type="file" name="other_document[]" data-role="file-image"'+
                                        'data-preview="logo-preview'+total_doc+'" ><img id="logo-preview'+total_doc+'" class="img-thumbnail w-50"'+
                                    'style="margin-left: 5px; height:75px; width:75px !important;"'+
                                     'src="'+def+'" ><a href="javascript:void(0)" class="remove_document" flname="'+total_doc+'"><i class="flaticon-delete-1"></i></a></div>');
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
        })
        window.Parsley.addValidator('daterangevalidation', {
  validateString: function (value, requirement) {
    var date1 = new Date(value);
    var date2 = new Date($('#date_input_2').val());

    return date1 <= date2;
  },
  messages: {
    en: 'Start date should not be greater than End date.'
  }
});

$(".flatpickr-input").flatpickr({
  minDate: "today",
});
$(function(){
    $("#amount_type_id").trigger("change");
});
$('body').off('change', '#amount_type_id');
$('body').on('change', '#amount_type_id', function(e) {
    var type = $('#amount_type_id').val();
    if(type == 3 || type == 4)
            {
                $('#discountfield').hide();
            } 
            else
            {
                $('#discountfield').show();
            }   
                
                
});
  tinymce.init({
      mode: "specific_textareas",
      editor_selector: "editor",
      body_class: 'htmleditor',
      plugins: ' fullscreen autolink lists media table link',
      toolbar: ' fullscreen fontcolor code pageembed numlist bullist table link',
      relative_urls: false,
      remove_script_host: false,
      convert_urls: true,
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'MODA',
      images_upload_url: '{{url("admin/editorImageUpload")}}',
      setup: function (editor) {
         editor.on('change', function () {
            tinymce.triggerSave();
         });
      },
      images_upload_handler: function (blobInfo, success, failure) {
         var xhr, formData;
         xhr = new XMLHttpRequest();
         xhr.withCredentials = false;
         xhr.open('POST', '{{url("admin/editorImageUpload")}}');
         xhr.onload = function () {
            var json;

            if (xhr.status != 200) {
               failure(xhr.statusText);
               return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
               failure('Invalid JSON: ' + xhr.responseText);
               return;
            }
            success(json.location);
         };
         formData = new FormData();
         if (typeof (blobInfo.blob().name) !== undefined)
            fileName = blobInfo.blob().name;
         else
            fileName = blobInfo.filename();
         formData.append('file', blobInfo.blob(), fileName);
         formData.append('_token', '{{ csrf_token() }}');
         xhr.send(formData);
      }
   });
   $('body').on("click", '[data-role="remove-imgs"]', function() {
            $(this).parent().parent().remove();
        });
let img_counter = $("#imgs_counter").val();
      $('[data-role="add-imgs"]').click(function() {
        img_counter++;
            var html = '<div class="form-group col-lg-4">\
                          <div class="remove_btn_imgs">\
                            <button type="button" class="btn btn-danger btn_remove_img" data-role="remove-imgs"><i class="flaticon-delete"></i></button>\
                          </div>\
                            <label>Banner Image<b class="text-danger">*</b></label><br>\
                            <img id="image-preview-bnr_'+img_counter+'" style="width:100%; height:160px; object-fit: cover" class="img-responsive" >\
                            <br><br>\
                            <input type="file" name="banners[]" class="form-control" data-role="file-image" required data-preview="image-preview-bnr_'+img_counter+'" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg" data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB"  required data-parsley-required-message="Select Image" >\
                                <span class="text-info">Upload image</span>\
                        </div>\
                        ';
                        $('#imgs-holder').append(html);

        });
       @if(empty($datamain->coupon_id))
       
        $(function(){
            $('[data-role="add-imgs"]').trigger("click");
});
@endif
    </script>
@stop
