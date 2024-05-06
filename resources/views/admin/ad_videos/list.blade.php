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
    @if(check_permission('videos','Create'))
    <div class="card-header"><a href="{{url('admin/videos/create')}}" class="btn-custom btn mr-2 mt-2 mb-2"><i class="fa-solid fa-plus"></i> Create Video ads</a></div>
    @endif
    <div class="card-body">
        <form method="get" action="#">
            <div class="row align-items-end">
                <div class="col-lg-4 form-group">
                    <label>Outlet</label>
                    <select name="outlet_id" class="form-control select2">
                        <option value="">All</option>
                        @foreach($outlets as $ech)
                            <option value="{{$ech->id}}" @if(isset($_GET['outlet_id']) && $_GET['outlet_id'] == $ech->id) selected @endif>{{$ech->name}}</option> 
                        @endforeach                          
                        </select>
                </div>
                
                <div class="col-lg-6 form-group">
                    <input type="submit" name="search" value="search" class="btn btn-primary">
                    <input type="button" name="search" value="Reset" class="btn btn-primary reset_filter">
                </div>
        </div>
        </form>
        <div class="table-responsive">
        <table class="table table-condensed table-striped" id="example2">
            <thead>
                <tr>
                <th>#</th>
                <th>Title</th>   
                <th>Outlet</th>               
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($list as $ech)
                @php $i++; @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$ech->video_title}}</td>
                        <td>{{$ech->vendor}}</td>
                        <td>@if($ech->active == 1) {{'Active'}}@else{{'Inactive'}}@endif</td>
                        <td class="text-center">
                            <div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="flaticon-dot-three"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink7">
                                    @if(check_permission('videos','Create'))
                                    <a class="dropdown-item" href="{{url('admin/videos/'.$ech->id.'/edit')}}"><i class="flaticon-pencil-1"></i> Edit</a>
                                    @endif
                                    
                                    
                                    @if(check_permission('videos','Delete'))
                                    <a class="dropdown-item" data-role="unlink"
                                    data-message="Do you want to remove this video adv?"
                                    href="{{ url('admin/videos/' . $ech->id) }}"><i
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
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('')}}admin-assets/plugins/table/datatable/datatables.js"></script>
<script>
     $('.select2').select2();
$('#example2').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

$('.reset_filter').on('click',function(){
        window.location.href="{{url('admin/videos')}}";
})
    </script>
@stop