@extends('admin.template.layout')
@section('header')
<link href="{{ asset('') }}admin-assets/assets/css/support-chat.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}admin-assets/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css" rel="stylesheet"
   type="text/css" />
<link href="{{ asset('') }}admin-assets/plugins/charts/chartist/chartist.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}admin-assets/assets/css/default-dashboard/style.css" rel="stylesheet" type="text/css" />

@stop
@section('content')
<style>
   .home-section footer {
   bottom: auto !important;
   }

   @media(min-width:992px){
      .custom-pr{
         padding-right: 5px;
      }
      .custom-pl{
         padding-left: 5px;
      }
   }
</style>
<div class="row">
   
   <div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{url('admin/outlet')}}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon success m-0">
            <p>{{$vendors}}</p>
            </div>
         <div class="content m-0">
               <h6 class="mb-0">Outlets</h6>
               
         </div>
      </a>
   </div>
    <div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{url('admin/customers')}}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon success m-0">
         <p>{{$customer}}</p>
            </div>
         <div class="content m-0">
               <h6 class="mb-0">Customers</h6>
         </div>
      </a>
   </div>
   <div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{url('admin/coupons')}}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon orange m-0">
         <p>{{$coupons}}</p>
         </div>
         <div class="content m-0">
               <h6 class="mb-0">Vouchers</h6>
         </div>
      </a>
      <!-- End Icon Cart -->
   </div>
   <div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{url('admin/provider_registrations')}}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon orange m-0">
         <p>{{$provider}}</p>
         </div>
         <div class="content m-0">
               <h6 class="mb-0">Provider Approval</h6>
         </div>
      </a>
      <!-- End Icon Cart -->
   </div>
  
</div>
<div class="row" style="">
   <div class="col-xl-5 col-lg-6 mb-4 custom-pr">
      <div class="card h-100">
         <div class="card-body p-2">
            <canvas id="piechart" width="600" height="400"></canvas>
         </div>
      </div>
   </div>
   <div class="col-xl-7 col-lg-6 mb-4 custom-pl">
      <div class="card h-100">
         <div class="card-body p-2">
            <canvas id="chart" width="600" height="400"></canvas>
         </div>
      </div>
   </div>
  
</div>



</div>
@stop
@section('footer')
<script src="{{asset('')}}admin-assets/plugins/charts/chartist/chartist.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
   integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-rc"></script>
@stop
@section('script')
<script>
   
   var orderschartctx = document.getElementById("orderschart");
   var myChart = new Chart(orderschartctx, {
       type: 'doughnut',
       data: {
           labels: ['Pending', 'Accepted'
           ],
           datasets: [{
               label: '',
               data: [10,20
               ],
               backgroundColor: [
                   'rgba(202, 153, 67, 0.8)',
                   'rgba(0, 0, 0, 0.8)',
                   'rgba(235, 192, 94, 0.8)',
                   'rgba(73, 0, 0, 0.8)',
                   'rgba(156, 210, 57, 0.8)',
                   'rgba(99, 68, 94, 0.8)',
                   'rgba(189, 100, 24, 0.8)',
                   'rgba(45, 28, 85, 0.8)',
                   'rgba(55, 222, 1, 0.8)',
               ],
               borderColor: [
                   'rgba(202, 153, 67, 0.8)',
                   'rgba(0, 0, 0, 0.8)',
                   'rgba(235, 192, 94, 0.8)',
                   'rgba(73, 0, 0, 0.8)',
                   'rgba(156, 210, 57, 0.8)',
                   'rgba(99, 68, 94, 0.8)',
                   'rgba(189, 100, 24, 0.8)',
                   'rgba(45, 28, 85, 0.8)',
                   'rgba(55, 222, 1, 0.8)',
               ],
               borderWidth: 2
           }]
       },
       options: {
           cutout: 60,
           centerPercentage: 80,
           responsive: true,
           maintainAspectRatio: false,
           tooltips: {
               enabled: true
           },
           interaction: {
               intersect: false
           },
           plugins: {
               legend: {
                   display: true,
                   position: 'bottom',
   
                   labels: {
                       font: {
                           size: 10
                       },
                       boxWidth: 10
                   }
               }
           },
       }
   });

   var serviceCanvas = document.getElementById("piechart");

   var serviceData = {
      labels: [
         "Customers",
         "Vendors",
       
      ],
      datasets: [
         {
               data: [{{ $customers ?? 0 }}, {{ $vendors ?? 0 }}],
               backgroundColor: [
                  "#9b51e0",
                  "#219653",
                  "#f2994a",
                  "#4a6cf7"
               ]
         }],
         options: {
            legend: {
                  position: 'top',
                  display: true
              },
              scale: {
                    display: true,
                    ticks: {
                          beginAtZero: true,
                            }
                     },
              responsive:true,
              maintainAspectRatio: true,
         }
   };

   var pieChart = new Chart(serviceCanvas, {
   type: 'pie',
   data: serviceData
   });

   var ctx = document.getElementById("chart").getContext('2d');
var barChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Customer Report', 'Outlet Report', 'Rating and Reviews', 'Coupon Report', 'Coupon Usage Statistics'],
    datasets: [{
      label: 'Report',
      data: [{{ $resultCountcustomers ?? 0 }}, {{ $resultCountoutlet ?? 0 }}, {{ $resultratingandreviescount ?? 0 }}, {{ $resultratingandreviescount ?? 0 }}, {{ $resultcouponsusagecount ?? 0 }}],
      backgroundColor: "rgba(242, 153, 74, 0.1)",
      borderColor: "#f2994a",
      hoverBackgroundColor: "rgba(242, 153, 74, 0.4)",
      hoverBorderColor: "rgba(242, 153, 74, 1)",
      borderWidth: 2,
      fill: true,
      borderRadius: 2,
      datalabels: {
                    display: false
                }
    }]
  },
  options: {
      scales: {
         y: {
            grid: {
               display: false
            }
         },
         x: {
            grid: {
               display: false
            }
         }
      }
	}
});

 
</script>
@stop