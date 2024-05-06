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
                        <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                               <!--  <input type="submit" name="excel" value="Export" class="btn btn-primary"> -->
                                <a href="{{url('vendor/reports/customers')}}" class="btn btn-primary" style="background: #000 !important;color:#fff !important; margin-left:.5rem">Clear</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>                       
                        <th>City/Country</th>
                        <!--<th>Amount Earned</th>-->
                        <!--<th>Amount Used</th>-->
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach($datamain as $datarow)
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>

                        <td>{{$datarow->name}} </td>
                        <td>{{$datarow->email}}</td>
                        <td>+{{$datarow->dial_code}} {{$datarow->phone}}</td>
                        
                        <td>
                            @if(!empty($datarow->country))
                            {{$datarow->city->name}}, {{$datarow->country->name}}
                            @endif
                        </td>
                        <!--<td>{{(float)$datarow->coupon_usage_sum_earned_amount}}</td>-->
                        <!--<td>{{(float)$datarow->used_amount}}</td>-->
                        <td>{{$datarow->created_at}}</td>


                    </tr>
                    @endforeach
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