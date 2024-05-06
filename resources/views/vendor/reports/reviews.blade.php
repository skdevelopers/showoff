@extends("vendor.template.layout")

@section("header")
<style>
.dataTables_filter {
    display: flex;
    justify-content: center;
    align-items: end;
    gap: 20px;
    flex-wrap: wrap;
}

.dataTables_filter label,
.dataTables_filter button,
.dataTables_filter input.btn,
.dataTables_filter a.btn {
    flex: 1 1 auto;
    margin: 0;
}
</style>
@stop


@section("content")
<div class="card">

    <div class="card-body">
        <div class="row">
            <form method="get" action='' class="col-sm-12 col-md-12">
                <div id="column-filter_filter" class="dataTables_filter d-block">
                    <div class="row align-items-end">
                        <div class="col-lg-3">
                            <label>From Date:
                                <input type="date" name="from_date" class="form-control form-control-sm" placeholder=""
                                    aria-controls="column-filter" value="{{$from_date}}">
                            </label>
                            
                        </div>
                        <div class="col-lg-3">
                            <label>To Date:
                                <input type="date" name="to_date" class="form-control form-control-sm" placeholder=""
                                    aria-controls="column-filter" value="{{$to_date}}">
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                           <!--  <input type="submit" name="excel" value="Export" class="btn btn-primary"> -->
                            <a href="{{url('vendor/reports/ratings')}}" class="btn btn-primary" style="background: #000 !important;color:#fff !important; margin-left:.5rem">Clear</a>
                            <a href="{{url('vendor/reports/export_ratings')}}" class="btn btn-primary" style="background: #6c757d !important;color:#fff !important; margin-left:.5rem">Export</a>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                       
                        <th>Rating</th>                       
                        <th>Review</th>                       	
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @if($datamain->count())
                    @foreach($datamain as $datarow)
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>

                        <td>{{$datarow->customer->name??''}}<br/>{{$datarow->customer->email??''}}<br/>{{$datarow->customer->dial_code??''}}{{$datarow->customer->phone??''}} </td>
                        <td>{{$datarow->rating}}</td>
                        
                        
                       	<td>{{$datarow->comment}}</td>
                        <td>{{$datarow->created_at}}</td>


                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <td align="center" colspan="5">No data available in table</td>
                    </tr>
                    @endif
                </tbody>
            </table>
           

            <div class="col-sm-12 col-md-12 pull-right">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section("script")

@stop