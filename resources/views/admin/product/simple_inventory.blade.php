<?php $readonly = false; ?>
<legend>Price, Inventory &amp; Images</legend>
<hr>
<div class="form-row">
    <div class="col-lg-2">
        <div class="form-group profile-form">
            <label>Regular Price <span class="text-danger">*</span></label>
            <input required data-parsley-required-message="Enter regular price" min="0" data-parsley-type="number"type="text" name="regular_price" oninput="validateNumber(this);" id="regular_price" value="{{$regular_price}}" class="form-control" data-role="regular-price" {{ $readonly}} />
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group profile-form">
            <label>Sale Price <span class="text-danger">*</span></label>
            <input required data-parsley-required-message="Enter sale price" min="0" data-parsley-type="number" type="text" name="sale_price" oninput="validateNumber(this);" data-parsley-lte="#regular_price" data-parsley-lte-message="Sale Price should be less than or equal to Regular Price" id="sale_price" value="{{ $sale_price}}" class="form-control" data-role="sale-price" {{ $readonly}} />
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group profile-form">
            <label>Stock Quantity <span class="text-danger">*</span></label>
            <input required data-parsley-required-message="Enter quanitity" min="0" data-parsley-type="digits" type="number" name="stock_quantity" value="{{ $stock_quantity }}" class="form-control" data-role="stock_quantity"  {{ $readonly}} />
        </div>
    </div>

    <div class="col-lg-2">
        <div class="form-group profile-form">
            <label>SKU <span class="text-danger">*</span></label>
            <input required data-parsley-required-message="Enter SKU" type="text" name="product_code" value="{{ $pr_code }}" class="form-control" data-role="product_code"  {{ $readonly}} />
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Weight (kg)</label>
            <input type="text" min="0" data-parsley-type="number" name="weight" value="{{empty($product->weight) ? '': $product->weight}}" oninput="validateNumber(this);" class="form-control" data-role="weight"/>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Length (cm)</label>
            <input type="text" name="length" value="{{empty($product->length) ? '': $product->length}}" oninput="validateNumber(this);" class="form-control" data-role="length"  />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Width (cm) </label>
            <input type="text" name="width" value="{{empty($product->width) ? '': $product->width}}" oninput="validateNumber(this);" class="form-control" data-role="width" />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Height (cm)</label>
            <input type="text" name="height" value="{{empty($product->height) ? '': $product->height}}" oninput="validateNumber(this);" class="form-control" data-role="height"/>
        </div>
    </div>

    <div class="col-lg-3 d-none">
        <div class="form-group profile-form">
            <label>Allow Back Orders</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="product_simple_allow_backorder" type="checkbox" name="product_variant_allow_backorder[<?=$input_index?>]" value="1" <?php echo ($t_variant_allow_backorder == 1 ? 'checked': '') ?> <?php echo ($readonly ? 'disabled': '') ?> /> Yes
                </label>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 d-none">
        <div class="form-group profile-form">
            <label>Bar code <span class="text-danger"></span></label>
            <input type="text" name="bar_code" value="{{$bar_code}}" class="form-control" data-role="stock_quantity" {{ $readonly}} />
        </div>
    </div>
    
    
    <div class="col-lg-6" style="display:none;">
        <div class="form-group profile-form">
            <label>Short Description <span class="text-danger"></span></label>
            <textarea name="product_desc" class="form-control" data-role="product_desc" {{ $readonly }} />{{$product_desc}}</textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>Material </label>
            <textarea rows="5" type="text" name="material1"  class="form-control"  {{ $readonly }} />{{$material}}</textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>Product Details </label>
            <textarea rows="5" type="text" name="product_details1"  class="form-control"  {{ $readonly }} />{{$product_details}}</textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>What You Need to Know </label>
            <textarea rows="5" type="text" name="needtoknow1"  class="form-control"  {{ $readonly }} />{{$needtoknow}}</textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>Description </label>
            <textarea rows="5" type="text" name="product_full_descr"  class="form-control"  {{ $readonly }} />{{$product_desc_full}}</textarea>
        </div>
    </div>

     {{-- <div class="col-lg-4"> 
        <div class="form-group profile-form">
            <label>Size chart <span class="text-danger"></span>@php if(!empty($size_chart)) { @endphp <a href='{{asset($size_chart)}}' target='_blank'><strong>View</strong></a>@php }  @endphp</label>
            <input type="file" name="size_chart" class="form-control" />
            <input type="hidden" name="size_chart_old" value="{{$size_chart}}" />
        </div>
    </div> --}}

    <!-- <div class="col-lg-4">
        
    </div>
    <div class="col-lg-4">
       
    </div> -->

     <div class="form-row mt-3">
        <div class="col-lg-12">
            <div class="upload-product-img">
                <label for="" class="">Upload Images (Maximum 5 images)</label>
                <div id="product-simple-images" class="upload-img-product-items" data-variant-id="<?php echo $default_attribute_id ?>">
                    <?php if (! empty($product_simple_image) ): ?>
                        <?php foreach ($product_simple_image as $t_name): ?>
                            <?php
                                 if ( !empty($t_name) && file_exists(config('global.upload_path') . "/" . config('global.product_image_upload_dir'). "/{$t_name}") )
                                 {
                                    $t_img = url(config('global.upload_path') . "/" . config('global.product_image_upload_dir')."/".$t_name) ;

                                } else {
                                    $t_img = url('assets_v2/images/placeholder.png');
                                }
                            ?>
                            <div class="uploaded-prev-imd">
                                <img src="<?php echo $t_img ?>" alt="" />
                                <div class="del-product-img" data-role="product-img-trash"  data-image-file="<?php echo $t_name ?>" <?php echo ($readonly ? 'data-disabled="1"' : '') ?>><i class="far fa-trash-alt"></i> Delete</div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                     
                        @if(!empty($product->image)) 
                        <?php  
                        $imageList = explode(",",$product->image); ?>
                            @if(!empty($imageList)) 
                                @foreach ($imageList as $key => $value) 
                                <div class="uploaded-prev-imd">
                                    <img src="{{url(config('global.upload_path') . '/' . config('global.product_image_upload_dir').$value)}}" width="100" height="100">
                                    <div style="cursor:pointer" class="del-product-img" data-role="product-img-trash"  data-image-file="{{$value}}" <?php echo ($readonly ? 'data-disabled="1"' : '') ?>><i class="far fa-trash-alt"></i></div>
                                </div>
                                @endforeach
                            @endif
                        @endif
                    
                    <div class="uploaded-prev-imd custom-upload-img" <?php echo ($readonly ? 'style="display:none;"' : '') ?>>

                        <div class="image_wrap">
                            <label class="Pic_upload">
                                <input counter="0" type="file" name="product_simple_image[]" class="upload_pro" data-role="product-img-upload" multiple accept="image/*"/>
                                <i class="ti-plus"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <small class="text-info">
                    Maximum size should be 2MB. Maximum dimension allowed is 1024 x 1024.<br> Allowed types are jpg, jpeg, png and gif.
                </small>
            </div>
        </div>
    </div>
    <input type="hidden" name="image_counter" value="0" id="image_counter">
</div>