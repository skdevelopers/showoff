@extends("vendor.template.layout")

@section("header")
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin-assets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin-assets/plugins/table/datatable/custom_dt_customer.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop


@section("content")

<style>
    .dataTables_filter, .dataTables_length{
        margin-bottom: 5px !important;
    }
    .card-header-list{
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        gap: 20px;
    }
    .card-header-list .form-group{
        width:100%;
        max-width: 250px;
    }
    
    @media(max-width:991px){
        .card-header-list{
            flex-direction: column;
            gap: 0px;
        }
        .card-header-list .form-group{
            width:100%;
            max-width: 100%;
        }
    }
</style>
<div class="card mb-5">
    
    <div class="card-header">
        <div class="row align-items-end justify-content-between">
            <div class="col-lg-3 form-group px-2">
                    <a href="{{url('vendor/coupons/create')}}" class="btn-custom btn" style="padding:0 10px !important;"><i class="fa-solid fa-plus"></i> Create Voucher</a>
            </div>
            <div class="col-lg-9 px-2">
                <form method="get" action="#">
                    <div class="card-header-list">
                        
                        <div class="form-group" style="display:none;">
                            <label>Search Key</label>
                            <input type="text" name="search_key" class="form-control " placeholder="Search by Code" value="@if(isset($_GET['search_key'])){{$_GET['search_key']}}@endif">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control flatpickr-input" placeholder="Search Date" value="@if(isset($_GET['date'])){{$_GET['date']}}@endif">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control select2">
                                <option
                                       
                                        value="">All</option>
                                    <option @if(isset($_GET['status']) && $_GET['status'] == 1) selected @endif
                                       
                                        value="1">Active</option>
                                    <option @if(isset($_GET['status']) && $_GET['status'] == 0) selected @endif
                                        
                                        value="0">Inactive</option>
                                </select>
                        </div>
                       
                        <div class="form-group" style="min-width: 220px;max-width: 220px;">
                            <input type="submit" name="search" value="search" class="btn btn-primary" style="margin-right:.5rem">
                            <input type="button" name="search" value="Reset" class="btn btn-primary reset_filter" style="margin-left:.5rem; background: #000 !important; color: #fff !important; ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
    <div class="card-body">
        
        <div class="table-responsive">
        <table class="table table-condensed table-striped" id="example2">
            <thead>
                <tr>
                <th>#</th>
                <th>Image</th>    
                <!--<th>Code</th>-->
                <th>Offer name</th>                 
                <th>Type</th>
                <th>Start Date</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($datamain as $data) 
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src="{{$data->image}}" width="50" height="50"></td>
                        <!--<td>{{$data->coupon_code}}</td>-->
                       <td>{{$data->coupon_title}}</td>
                        <td> {{$data->name}}</td>
                        <td>{{date('d-M-Y', strtotime($data->start_date))}}</td>
                        <td>{{date('d-M-Y', strtotime($data->coupon_end_date))}}</td>
                        <td>@if($data->coupon_status ==1) {{'Active'}}@else {{'Inactive'}}@endif</td>
                        <td class="text-center">
                            <div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="flaticon-dot-three"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink7">
                                    
                                    <a class="dropdown-item" href="{{url('vendor/coupons/'.$data->coupon_id.'/edit')}}"><i class="flaticon-pencil-1"></i> Edit</a>
                                   
                                    <a class="dropdown-item" href="{{url('vendor/coupon_usage?search_key='.$data->coupon_code)}}"><i class="flaticon-pencil-1"></i> Usage</a>
                                   
                                    <a class="dropdown-item" data-role="unlink"
                                    data-message="Do you want to remove this coupon?"
                                    href="{{ url('vendor/coupons/' . $data->coupon_id) }}"><i
                                        class="flaticon-delete-1"></i> Delete</a>
                                    
                                    
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
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('')}}admin-assets/plugins/table/datatable/datatables.js"></script>
<script>
     $('.select2').select2();
$('#example2').DataTable({
      "paging": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

$('.reset_filter').on('click',function(){
        window.location.href="{{url('vendor/coupons')}}";
})
    </script>
@stop