@extends("admin.template.layout")

@section("header")
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/plugins/table/datatable/custom_dt_customer.css') }}">
@stop

@section("content")
    <div class="card mb-5">
        <div class="card-header">
            <a href="{{ url('admin/services/create/' . $vendor_id) }}" class="btn-custom btn mr-2 mt-2 mb-2">
                <i class="fa-solid fa-plus"></i> Create service
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-striped" id="servicesTable">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datamain as $service)
                        <tr>
                            <td>
                                @if($service->image)
                                    <img src="{{ asset('storage/' .$service->image) }}" alt="{{ $service->name }}" class="img-thumbnail" style="width: 75px; height: 75px;">
                                @else
                                    <img src="{{ asset('admin-assets/assets/img/placeholder.jpg') }}" alt="Placeholder" class="img-thumbnail" style="width: 75px; height: 75px;">
                                @endif
                            </td>
                            <td>{{ $service->name }}</td>
                            <td>
                                <label class="switch s-icons s-outline s-outline-warning mb-2 mt-2 mr-2">
                                    <input type="checkbox" class="change_status" data-id="{{ $service->id }}" data-url="{{ url('admin/services/change_status') }}" @if($service->active) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>{{ web_date_in_timezone($service->updated_at, 'd-M-Y h:i A') }}</td>
                            <td>
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink{{ $service->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="flaticon-dot-three"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $service->id }}">
                                        @if(check_permission('services', 'Edit'))
                                            <a class="dropdown-item" href="{{ url('admin/services/' . $service->id . '/edit') }}"><i class="flaticon-pencil-1"></i> Edit</a>
                                        @endif
                                        <!-- Add your delete action here if needed -->
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
    <script src="{{ asset('admin-assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#servicesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true
            });
        });
    </script>
@stop
