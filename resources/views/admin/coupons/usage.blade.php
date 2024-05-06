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
                <div class="col-md-2 form-group">
                    <label>Search Key</label>
                    <input type="text" name="search_key" class="form-control " placeholder="Search by Title" value="@if(isset($_GET['search_key'])){{$_GET['search_key']}}@endif">
                </div>
                <div class="col-md-2 form-group">
                    <label>Customer</label>
                    <select name="user_id" class="form-control select2">
                        <option value="">All</option>
                        @foreach($customerList as $ech)
                            <option value="{{$ech->id}}" @if(isset($_GET['user_id']) && $_GET['user_id'] == $ech->id) selected @endif>{{$ech->name}}</option> 
                        @endforeach                          
                        </select>
                </div>
                <div class="col-md-4 form-group">
                    <input type="submit" name="search" value="search" class="btn btn-primary">
                    <input type="button" name="search" value="Reset" class="btn btn-primary reset_filter">
                    <a href="{{url('admin/reports/export_coupon_usage')}}" class="btn btn-primary">Export</a>
                </div>
        </div>
        </form>
        <div class="table-responsive">
        <table class="table table-condensed table-striped" id="example2">
            <thead>
                <tr>
                <th>#</th>
                <th>Voucher Title</th>    
                <th>Customer</th>
                <!-- <th>Amount</th>              -->
                <th>Status</th>
                <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($datamain as $ech)
                <?php $i++ ?>
                    <tr> 
                        <td>{{$i}}</td>
                        <td>{{$ech->coupon_details->coupon_title??''}}</td>
                        <td>{{$ech->customer->name??''}}</br>{{$ech->customer->email??''}}</br>{{$ech->customer->dial_code??''}}{{$ech->customer->phone??''}}</td>    
                       
                        <!-- <td>{{$ech->earned_amount}}</td>              -->
                        
                        <td>@if($ech->status == 0){{'Earned'}} @else{{'Redeemed'}} @endif</td>
                        <td>{{date('d-M-Y',strtotime($ech->created_at))}}</td>
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
        window.location.href="{{url('admin/coupon_usage')}}";
})
    </script>
@stop