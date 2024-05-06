@extends("admin.template.layout")

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
</style>
<div class="card mb-5">
    
    <div class="card-body">
        <form method="get" action="#">
            <div class="row align-items-end">
                <div class="col-md-2 form-group" style="display:none;">
                    <label>Search Key</label>
                    <input type="text" name="search_key" class="form-control " placeholder="Search by Code" value="@if(isset($_GET['search_key'])){{$_GET['search_key']}}@endif">
                </div>
                <div class="col-md-2 form-group">
                    <label>Date</label>
                    <input type="text" name="date" class="form-control flatpickr-input" placeholder="Search Date" value="@if(isset($_GET['date'])){{$_GET['date']}}@endif">
                </div>
                <div class="col-md-2 form-group">
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
                <div class="col-md-2 form-group">
                    <label>Outlet</label>
                    <select name="outlet_id" class="form-control select2">
                        <option value="">All</option>
                        @foreach($outlets as $ech)
                            <option value="{{$ech->id}}" @if(isset($_GET['outlet_id']) && $_GET['outlet_id'] == $ech->id) selected @endif>{{$ech->name}}</option> 
                        @endforeach                          
                        </select>
                </div>
                <div class="col-md-4 form-group">
                    <input type="submit" name="search" value="search" class="btn btn-primary">
                    <input type="button" name="search" value="Reset" class="btn btn-primary reset_filter">
                    <a href="{{url('admin/reports/export_coupon')}}" class="btn btn-primary">Export</a>
                </div>
        </div>
        </form>
        <div class="table-responsive">
        <table class="table table-condensed table-striped" id="example2">
            <thead>
                <tr>
                <th>#</th>
                <th>Image</th>    
                <!-- <th>Code</th> -->
                <th>Outlet</th>                 
                
                <th>Start Date</th>
                <th>Expiry Date</th>
                <!-- <th>Amount Earn/Coupon</th> -->
                <th>Total Users Applied</th>
                <th>Total Users Redeemed</th>
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
                        <!-- <td>{{$data->coupon_code}}</td> -->
                       <td>{{$data->outlet->name}}</td>
                       
                        <td>{{date('d-M-Y', strtotime($data->start_date))}}</td>
                        <td>{{date('d-M-Y', strtotime($data->coupon_end_date))}}</td>
                        <!-- <td>{{$data->minimum_amount}}</td> -->
                        <td>{{$data->earned_count}}</td>
                        <td>{{$data->redeemed_count}}</td>
                        <td><a href="{{url('admin/coupon_usage?search_key='.$data->coupon_code)}}" class="btn btn-primary">View</a></td>
                        
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
        window.location.href="{{url('admin/reports/coupons')}}";
})
    </script>
@stop