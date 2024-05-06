@extends("admin.template.layout")

@section("header")
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin-assets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin-assets/plugins/table/datatable/custom_dt_customer.css">
@stop


@section("content")

<style>
    #example2_info{
        display: none
    }
</style>
<div class="card mb-5">
   
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-condensed table-striped " id="example2">
           
            <tbody>
               <tr>
                   <td>Name</td>
                   <td>{{$datamain->name}}</td>
                </tr>
                <tr>
                   <td>Email</td>
                   <td>{{$datamain->email}}</td>
               </tr>
               <tr>
                   <td>Phone</td>
                   <td>{{$datamain->dial_code.$datamain->phone}}</td>
                </tr>
                <tr>
                   <td>Location</td>
                   <td>{{$datamain->location}}</td>
               </tr>
               <tr>
                   <td>About Me</td>
                   <td>{{$datamain->about_me}}</td>
                </tr>
                <tr>
                   <td>Image</td>
                   <td><a href="{{get_uploaded_image_url($datamain->image,'user_image_upload_dir')}}" target="blank">View</td>
               </tr>
                <tr>
                   <td>Trade License</td>
                   <td><a href="{{get_uploaded_image_url($datamain->trade_license,'user_image_upload_dir')}}" target="blank">View</td>
               </tr>
               <tr>
                   <td>Country</td>
                   <td>@if($datamain->country){{$datamain->country->name}}@endif</td>
               </tr>
               <tr>
                   <td>State</td>
                   <td>@if($datamain->state){{$datamain->state->name}}@endif</td>
               </tr>
               <tr>
                   <td>City</td>
                   <td>@if($datamain->city){{$datamain->city->name}}@endif</td>
               </tr>
               
               <tr>
                   <td>Category</td>
                   <td>@if($datamain->category){{$datamain->category->name}}@endif</td>
               </tr>
               @if($datamain->status ==0)
               <tr>
                   <td></td>
                   <td><input type="button" name="Approve" value="Approve" class="btn btn-primary approve_register"></td>
               </tr>
               @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@stop

@section("script")

<script>
    $('.approve_register').on('click',function(){
        App.confirm('Confirm Approve', 'Are you sure that you want to approve this record?', function() {
             $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "{{ url('admin/provider/change_status') }}",
                data: {
                    '_token':'{{csrf_token()}}',
                    'status' :1,
                   'id'     : '{{ empty($datamain->id) ? '' : $datamain->id }}' 
                },               
                dataType: 'json',
                
                success: function(res) {
                   
                    $('.approve_register').hide();
                    App.alert(res['message']);
                }
            });
              });
    })

    </script>
@stop