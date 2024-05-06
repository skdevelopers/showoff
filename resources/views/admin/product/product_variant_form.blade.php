<?php
$readonly = false;
$include_wrapper = $include_wrapper ?? TRUE;
$start_index = $start_index ?? 0;
$t_variant_barcode = "";
$t_variant_product_code = "";
?>
@if ( $include_wrapper )
<div class="accordion" id="product-multi-variant-accordion" data-variant-count="<?php echo count($combinations) + $start_index ?>">
@endif
<?php  
$product_variations =   isset($product_variations) ? $product_variations : [];
$combinations = $combinations ? $combinations :  [];

$attribute_values = isset($attribute_values) ? $attribute_values : []; 


?>
@for ($i = 0; $i < count($combinations); $i++)
    <?php
    $input_index = $i + $start_index;
    $t_variant_id = '';
    $t_variant_regular_price = '';
    $t_variant_sale_price = '';
    $t_variant_stock_qty = '';
    $t_variant_allow_backorder = '';
    $t_variant_weight   = '';
    $t_variant_length   = '';
    $t_variant_width    = '';
    $t_variant_height   = '';
    $t_variant_size_chart   = '';
    $t_variant_images   = [];
     $short_desc        = '';
    $full_desc           = '';
    $material   = '';
    $product_details   = '';
    $needtoknow   = '';  ?>
    @if ( array_key_exists($i, $product_variations) !== FALSE )
     <?php    $t_variant_id = $product_variations[$i]->product_attribute_id;
        $t_variant_regular_price = $product_variations[$i]->regular_price;
        $t_variant_sale_price = $product_variations[$i]->sale_price;
        $t_variant_stock_qty = $product_variations[$i]->stock_quantity;
        $t_variant_allow_backorder = $product_variations[$i]->allow_back_order == 1 ? 'checked' : '';
        $t_variant_images = explode(',', $product_variations[$i]->image);
        $short_desc = $product_variations[$i]->product_desc;
        $full_desc = $product_variations[$i]->product_full_descr;
        $t_variant_barcode = $product_variations[$i]->barcode;
        $t_variant_product_code = $product_variations[$i]->pr_code;
        $t_variant_weight   = $product_variations[$i]->weight;
        $t_variant_length   = $product_variations[$i]->length;
        $t_variant_width    = $product_variations[$i]->width;
        $t_variant_height   = $product_variations[$i]->height;
        $t_variant_size_chart   = $product_variations[$i]->size_chart;
        $material   = $product_variations[$i]->material;
        $product_details   = $product_variations[$i]->product_details;
        $needtoknow   = $product_variations[$i]->needtoknow;
        
        array_walk_recursive($t_variant_images, function (&$v, $k) {
            $v = trim($v);
        });
        $t_variant_images = array_filter($t_variant_images);  ?>
    @endif
    <div class="card">
        <?php $t_variant_label = []; ?>
        @if ( is_array($combinations[$i]) )
            @foreach ($combinations[$i] as $t_id)
                <?php  
                $t_variant_label[] = "{$attribute_values[$t_id]->attribute_name}: {$attribute_values[$t_id]->attribute_values}"; ?>
                <input type="hidden" name="product_variant_attribute_values[<?=$input_index?>][]" value="<?php echo $attribute_values[$t_id]->attribute_values_id ?>" />
            @endforeach
        @else
            <?php
            $t_variant_label[] = "{$attribute_values[$combinations[$i]]->attribute_name}: {$attribute_values[$combinations[$i]]->attribute_values}"; ?>
            <input type="hidden" name="product_variant_attribute_values[<?=$input_index?>][]" value="<?php echo $attribute_values[$combinations[$i]]->attribute_values_id ?>" />
        @endif
        <?php $t_variant_label = implode(' / ', $t_variant_label); ?>
        <div class="card-header" id="multi-variant-accord-head-<?php echo $input_index+1 ?>">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#multi-variant-accord-collapse-<?php echo $input_index+1 ?>" aria-expanded="true" aria-controls="multi-variant-accord-collapse-<?php echo $input_index+1 ?>">
                    <strong>Variant {{ $input_index+1}}</strong>: {{ $t_variant_label}}
                </button>
            </h2>
            <input type="hidden" name="product_variant_attribute_id[<?=$input_index?>]" value="{{ $t_variant_id}}" />
        </div>

        <div id="multi-variant-accord-collapse-<?php echo $input_index+1 ?>" class="collapse <?php echo ($input_index == 0 ? 'show' : '') ?>" aria-labelledby="multi-variant-accord-head-<?php echo $input_index+1 ?>" data-parent="#product-multi-variant-accordion">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-2">
                        <div class="form-group profile-form">
                            <label>Regular Price <span class="text-danger">*</span></label>
                            <input required data-parsley-required-message="Enter regular price" min="0" data-parsley-type="number" type="text" id="regular_price_<?=$input_index?>"  name="product_variant_regular_price[<?=$input_index?>]" oninput="validateNumber(this);" value="<?php echo $t_variant_regular_price ?>" class="form-control multi-attr-required" data-role="regular-price" <?php echo ($readonly ? 'readonly': '') ?> />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group profile-form">
                            <label>Sale Price <span class="text-danger">*</span></label>
                            <input required data-parsley-required-message="Enter sale price" min="0" data-parsley-type="number" type="text" data-parsley-lte="#regular_price_<?=$input_index?>" data-parsley-lte-message="Sale Price should be less than or equal to Regular Price" id="sale_price"  name="product_variant_sale_price[<?=$input_index?>]" oninput="validateNumber(this);" value="{{ $t_variant_sale_price}}" class="form-control multi-attr-required" data-role="sale-price" <?php echo ($readonly ? 'readonly': '') ?> />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group profile-form">
                            <label>Stock Quantity <span class="text-danger">*</span></label>
                            <input required data-parsley-required-message="Enter quanitity" min="0" data-parsley-type="digits" type="text"  name="product_variant_stock_qty[<?=$input_index?>]" value="{{ $t_variant_stock_qty}}" class="form-control multi-attr-required" <?php echo ($readonly ? 'readonly': '') ?> />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group profile-form">
                            <label>SKU <span class="text-danger">*</span></label>
                            <input required data-parsley-required-message="Enter SKU"  type="text" name="product_variant_product_code[<?=$input_index?>]" value="{{ $t_variant_product_code}}" class="form-control multi-attr-required" <?php echo ($readonly ? 'readonly': '') ?> />
                        </div>
                    </div>


                   <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Weight (kg)</label>
            <input type="text" min="0" data-parsley-type="number" name="weight_variant[<?=$input_index?>]" value="{{$t_variant_weight}}" oninput="validateNumber(this);" class="form-control"/>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Length (cm)</label>
            <input type="text" name="length_variant[<?=$input_index?>]" oninput="validateNumber(this);" value="{{$t_variant_length}}" class="form-control"  />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Width (cm) </label>
            <input type="text" name="width_variant[<?=$input_index?>]" oninput="validateNumber(this);" value="{{$t_variant_width}}" class="form-control"/>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group profile-form">
            <label>Height (cm)</label>
            <input type="text" name="height_variant[<?=$input_index?>]" oninput="validateNumber(this);" value="{{$t_variant_height}}" class="form-control"/>
        </div>
    </div> 
                    
                    
                    <div class="col-lg-3 d-none">
                        <div class="form-group profile-form">
                            <label>Barcode <span class="text-danger">*</span></label>
                            <input type="text" name="product_variant_barcode[<?=$input_index?>]" value="{{ $t_variant_barcode}}" class="form-control" <?php echo ($readonly ? 'readonly': '') ?> />
                        </div>
                    </div>
                    
                    <div class="col-lg-3  d-none">
                         <div class="form-group profile-form">
                            <label>Allow Back Orders</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="product_variant_allow_backorder" type="checkbox" name="product_variant_allow_backorder[<?=$input_index?>]" value="1" {{$t_variant_allow_backorder}}  > 

                                </label>

                                
                            </div>
                          
                        </div>

                    </div>
                    
                    <div class="col-lg-6" style="display: none;">
                        <div class="form-group profile-form">
                            <label>Short Description <span class="text-danger">*</span></label>
                           <textarea name="product_variant_short_desc[<?=$input_index?>]" data-editor="ck" id="des{{$start_index+$i}}" class="form-control description_fld">{{$short_desc}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>Material </label>
            <textarea rows="5" type="text" name="material[{{$input_index}}]"  class="form-control"  {{ $readonly }} />{{$material}}</textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>Product Details </label>
            <textarea rows="5" type="text" name="product_details[{{$input_index}}]"  class="form-control"  {{ $readonly }} />{{$product_details}}</textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group profile-form">
            <label>What You Need to Know </label>
            <textarea rows="5" type="text" name="needtoknow[{{$input_index}}]"  class="form-control"  {{ $readonly }} />{{$needtoknow}}</textarea>
        </div>
    </div>


                    <div class="col-lg-6">
                        <div class="form-group profile-form">
                            <label>Description </label>
                           <textarea rows="5" name="product_variant_full_desc[{{$input_index}}]" data-editor="ck" id="desfull{{$start_index+$i}}" class="form-control description_fld">{{$full_desc}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group profile-form d-flex align-items-center">
                            <input type="checkbox" name="default_attribute_id[]" value="{{ $t_variant_id}}" class="form-control default_attribute_id" <?php if(isset($default_attribute_id)&& $default_attribute_id==$t_variant_id ) echo 'checked'; ?>  <?php echo ($readonly ? 'readonly': '') ?> />
                            <label class="mb-0">Make Default <span class="text-danger"></span></label>
                        </div>
                       

                    </div>

                    {{-- <div class="col-lg-3"> 
        <div class="form-group profile-form">
            <label>Size chart <span class="text-danger"></span>@php if(!empty($t_variant_size_chart)) { @endphp <a href='{{asset($t_variant_size_chart)}}' target='_blank'><strong>View</strong></a>@php }  @endphp</label>
            <input type="file" name="size_chart_attr[]" class="form-control" />
            <input type="hidden" name="size_chart_attr_old[]" class="form-control" value="{{$t_variant_size_chart}}"/>
        </div>
        </div> --}}
                </div>
                <div class="form-row mt-3">
                    <div class="col-lg-12">
                        <div class="upload-product-img">
                            <label for="" class="">Upload Images (Maximum 5 images)</label>
                            <div class="upload-img-product-items" data-variant-id="<?php echo $t_variant_id ?>">
                                <?php if (! empty($t_variant_images) ): ?>
                                    <?php foreach ($t_variant_images as $t_name): ?>
                                        <?php
                                            
                                        if ( !empty($t_name) && file_exists(config('global.upload_path') . "/" . config('global.product_image_upload_dir'). "/{$t_name}") )
                                         {
                                            $t_img = url(config('global.upload_path') . "/" . config('global.product_image_upload_dir')."/".$t_name) ;

                                        } else {
                                            $t_img = url('assets_v2/images/placeholder.png');
                                        }
                                        ?>
                                        <div class="uploaded-prev-imd">
                                            <img src="<?php echo $t_img ?>" alt="" width="100" height="100" />
                                            <div class="del-product-img" data-role="product-img-trash"  data-image-file="{{$t_name}}" <?php echo ($readonly ? 'data-disabled="1"' : '') ?>><i class="far fa-trash-alt"></i> Delete</div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <input type="hidden" name="image_counter_{{$input_index}}" id="image_counter_{{$input_index}}" value="0">
                                <div class="uploaded-prev-imd" <?php echo ($readonly ? 'style="display:none;"' : '') ?>>
                                    <div class="image_wrap">
                                        <label class="Pic_upload">
                                            <input type="file" counter="{{$input_index}}" name="product_var_temp_image[<?=$input_index?>][]" class="upload_pro" data-role="product-img-upload" multiple accept="image/*"/>
                                            <i class="ti-plus"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small class="text-info">
                            Maximum size should be 2MB. Maximum dimension allowed is 2000 x 2000. <br>Allowed types are image/jpg, image/jpeg, image/png and image/gif.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endfor
@if ( $include_wrapper )
</div>
@endif